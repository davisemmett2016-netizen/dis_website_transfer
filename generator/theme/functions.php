<?php
/**
 * Davis Southern Septic — functions.php v18
 * v18 adds: dedicated page-fayetteville.php template + hardcoded rewrite
 * rule so /city/fayetteville/ loads directly without any WP page lookup.
 */

/* ---- Load SEO module ---- */
require_once get_stylesheet_directory() . '/template-parts/seo.php';
add_action( 'wp_head', 'dss_seo_head', 1 );

/* ---- Enqueue assets ---- */
function dss_enqueue() {
    wp_enqueue_style('dss-fonts','https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@400;500;600&display=swap',[],null);
    wp_enqueue_style('dss-style', get_stylesheet_uri(), ['dss-fonts'], '19.4');
    wp_enqueue_script('dss-js', get_stylesheet_directory_uri().'/assets/main.js', [], '19.4', true);
    wp_localize_script('dss-js', 'DSS', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('dss_form_nonce'),
    ]);
}
add_action('wp_enqueue_scripts', 'dss_enqueue');

/* ---- Theme support ---- */
function dss_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','gallery','caption']);
    add_theme_support('responsive-embeds');
    register_nav_menus(['primary'=>'Primary Navigation','footer'=>'Footer Navigation']);
}
add_action('after_setup_theme', 'dss_setup');

/* ================================================================
   AJAX FORM HANDLER
================================================================ */
function dss_handle_form() {
    if (!isset($_POST['dss_nonce']) || !wp_verify_nonce($_POST['dss_nonce'], 'dss_form_nonce')) {
        wp_send_json_error(['message' => 'Security check failed. Please refresh and try again.']);
        return;
    }
    $first   = sanitize_text_field($_POST['first_name'] ?? '');
    $last    = sanitize_text_field($_POST['last_name']  ?? '');
    $phone   = sanitize_text_field($_POST['phone']      ?? '');
    $email   = sanitize_email($_POST['email']           ?? '');
    $service = sanitize_text_field($_POST['service']    ?? '');
    $address = sanitize_text_field($_POST['address']    ?? '');
    $zip     = sanitize_text_field($_POST['zip']        ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    $step    = sanitize_text_field($_POST['dss_step']   ?? '1');
    $c_name  = sanitize_text_field($_POST['customer_name']    ?? '');
    $c_phone = sanitize_text_field($_POST['customer_phone']   ?? '');
    $c_svc   = sanitize_text_field($_POST['customer_service'] ?? '');

    $to      = 'contact@davissouthernseptic.com';
    $headers = ['Content-Type: text/html; charset=UTF-8'];
    if ($email) $headers[] = 'Reply-To: '.$first.' '.$last.' <'.$email.'>';

    if ($step === '2') {
        $subject = 'Additional Details (Step 2) — Davis Southern Septic';
        $body    = '<h2>Step 2 — Additional Details</h2>';
        $body   .= '<p><strong>From Step 1:</strong> '.$c_name.' | '.$c_phone.' | '.$c_svc.'</p><hr/>';
        if ($email)   $body .= '<p><strong>Email:</strong> '.esc_html($email).'</p>';
        if ($address) $body .= '<p><strong>Address:</strong> '.esc_html($address).'</p>';
        if ($zip)     $body .= '<p><strong>ZIP:</strong> '.esc_html($zip).'</p>';
        if ($message) $body .= '<p><strong>Notes:</strong><br/>'.nl2br(esc_html($message)).'</p>';
    } else {
        $subject = 'New Service Request — '.($first ?: 'Website Visitor').' — Davis Southern Septic';
        $body    = '<h2>New Service Request</h2><table style="border-collapse:collapse;width:100%;">';
        $body   .= '<tr><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;width:140px;">Name</td><td style="padding:8px;border-bottom:1px solid #eee;">'.esc_html(trim($first.' '.$last)).'</td></tr>';
        $body   .= '<tr><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">Phone</td><td style="padding:8px;border-bottom:1px solid #eee;"><a href="tel:'.esc_attr(preg_replace('/\D/','',$phone)).'">'.esc_html($phone).'</a></td></tr>';
        if ($email)   $body .= '<tr><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">Email</td><td style="padding:8px;border-bottom:1px solid #eee;">'.esc_html($email).'</td></tr>';
        if ($service) $body .= '<tr><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">Service</td><td style="padding:8px;border-bottom:1px solid #eee;">'.esc_html($service).'</td></tr>';
        if ($address) $body .= '<tr><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">Address</td><td style="padding:8px;border-bottom:1px solid #eee;">'.esc_html($address).'</td></tr>';
        if ($message) $body .= '<tr><td style="padding:8px;font-weight:bold;vertical-align:top;">Notes</td><td style="padding:8px;">'.nl2br(esc_html($message)).'</td></tr>';
        $body   .= '</table>';
    }
    $body .= '<hr/><p style="color:#888;font-size:12px;">Submitted from davissouthernseptic.com</p>';

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        if ($email && $step === '1') {
            $cb = '<h2>Thank You'.($first ? ', '.esc_html($first) : '').'!</h2>';
            $cb .= '<p>We received your request and will reach out shortly.</p>';
            if ($service) $cb .= '<p><strong>Service:</strong> '.esc_html($service).'</p>';
            $cb .= '<p>For urgent help: <strong><a href="tel:4708394441">470.839.4441</a></strong></p>';
            $cb .= '<hr/><p style="color:#888;font-size:12px;">Davis Southern Septic | 470.839.4441</p>';
            wp_mail($email, 'We received your request — Davis Southern Septic', $cb, ['Content-Type: text/html; charset=UTF-8']);
        }
        wp_send_json_success(['message'=>'Request received!','name'=>$first]);
    } else {
        error_log('DSS wp_mail failed: '.$subject);
        wp_send_json_error(['message'=>'Email delivery failed. Please call 470.839.4441.']);
    }
}
add_action('wp_ajax_dss_submit_form',        'dss_handle_form');
add_action('wp_ajax_nopriv_dss_submit_form', 'dss_handle_form');

/* ================================================================
   URL REWRITES — v17
   Three-layer approach so /city/{slug}/ and /county/{slug}/ ALWAYS
   win, even when a WordPress page with the same slug exists
   (e.g. a "fayetteville" page in the WP pages list).

   Layer 1 — add_rewrite_rule:  registers the URL pattern.
   Layer 2 — request filter:    runs before WP page lookup; if the
             path starts with city/ or county/ we force our query
             vars and clear pagename so WP never resolves a page.
   Layer 3 — template_include:  loads the right PHP template file.
================================================================ */
function dss_rewrite_rules() {
    /* Fayetteville gets its own dedicated rule — maps directly to page-fayetteville.php */
    add_rewrite_rule( '^city/fayetteville/?$', 'index.php?dss_fayetteville=1', 'top' );
    add_rewrite_rule( '^service-areas/?$',  'index.php?dss_page=service-areas',    'top' );
    add_rewrite_rule( '^city/([^/]+)/?$',   'index.php?dss_city_slug=$matches[1]', 'top' );
    add_rewrite_rule( '^county/([^/]+)/?$', 'index.php?dss_county_slug=$matches[1]', 'top' );
}
add_action( 'init', 'dss_rewrite_rules' );

function dss_query_vars( $vars ) {
    $vars[] = 'dss_page';
    $vars[] = 'dss_city_slug';
    $vars[] = 'dss_county_slug';
    $vars[] = 'dss_fayetteville';
    return $vars;
}
add_filter( 'query_vars', 'dss_query_vars' );

/**
 * Layer 2: intercept the parsed request BEFORE WordPress resolves
 * any existing page. If the URL path starts with city/ or county/
 * we inject our custom var and strip pagename/name so WP doesn't
 * accidentally serve a published page with the same slug.
 */
function dss_force_request( $query_vars ) {
    $path = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );

    if ( preg_match( '#^city/([^/]+)/?$#', $path, $m ) ) {
        $query_vars = array( 'dss_city_slug' => sanitize_title( $m[1] ) );
        return $query_vars;
    }
    if ( preg_match( '#^county/([^/]+)/?$#', $path, $m ) ) {
        $query_vars = array( 'dss_county_slug' => sanitize_title( $m[1] ) );
        return $query_vars;
    }
    if ( preg_match( '#^service-areas/?$#', $path ) ) {
        $query_vars = array( 'dss_page' => 'service-areas' );
        return $query_vars;
    }

    return $query_vars;
}
add_filter( 'request', 'dss_force_request' );

function dss_template_include( $template ) {
    /* Fayetteville — dedicated template, no query var ambiguity */
    if ( get_query_var('dss_fayetteville') ) {
        $t = locate_template( 'page-fayetteville.php' );
        if ( $t ) return $t;
    }
    if ( get_query_var('dss_page') === 'service-areas' ) {
        $t = locate_template( 'page-service-areas.php' );
        if ( $t ) return $t;
    }
    if ( is_page() && get_page_template_slug() === 'page-service-areas.php' ) {
        $t = locate_template( 'page-service-areas.php' );
        if ( $t ) return $t;
    }
    /* Also catch fayetteville if assigned as WP page template */
    if ( is_page() && get_page_template_slug() === 'page-fayetteville.php' ) {
        $t = locate_template( 'page-fayetteville.php' );
        if ( $t ) return $t;
    }
    if ( get_query_var('dss_city_slug') ) {
        $t = locate_template( 'page-city.php' );
        if ( $t ) return $t;
    }
    if ( get_query_var('dss_county_slug') ) {
        $t = locate_template( 'page-county.php' );
        if ( $t ) return $t;
    }
    return $template;
}
add_filter( 'template_include', 'dss_template_include' );

/* ----------------------------------------------------------------
   AUTO-FLUSH REWRITE RULES
---------------------------------------------------------------- */
function dss_flush_rewrites() {
    dss_rewrite_rules();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'dss_flush_rewrites' );

function dss_maybe_flush() {
    if ( get_transient('dss_flush_v18') ) return;
    dss_rewrite_rules();
    flush_rewrite_rules();
    set_transient( 'dss_flush_v18', true, WEEK_IN_SECONDS );
}
add_action( 'wp_loaded', 'dss_maybe_flush' );

/* ---- Dynamic page titles ---- */
function dss_document_title($title) {
    if (!function_exists('dss_get_counties_cities')) {
        require_once get_stylesheet_directory() . '/template-parts/city-data.php';
    }
    if (get_query_var('dss_page') === 'service-areas') {
        return 'Cities & Counties We Serve | Davis Southern Septic';
    }
    $city_slug = get_query_var('dss_city_slug');
    if ($city_slug) {
        foreach (dss_get_counties_cities() as $county) {
            foreach ($county['cities'] as $city) {
                if (dss_city_slug($city) === $city_slug) {
                    return 'Septic Services in '.$city.', GA | Davis Southern Septic';
                }
            }
        }
    }
    $county_slug = get_query_var('dss_county_slug');
    if ($county_slug) {
        $counties = dss_get_counties_cities();
        if (isset($counties[$county_slug])) {
            return 'Septic Services in '.$counties[$county_slug]['name'].', GA | Davis Southern Septic';
        }
    }
    return $title;
}
add_filter('pre_get_document_title', 'dss_document_title');

/* ================================================================
   FAYETTEVILLE — title override
================================================================ */
add_filter( 'pre_get_document_title', function( $title ) {
    $uri = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    if ( $uri === 'city/fayetteville' || $uri === 'city/fayetteville/' ) {
        return 'Septic Services in Fayetteville, GA | Davis Southern Septic';
    }
    if ( get_query_var('dss_fayetteville') ) {
        return 'Septic Services in Fayetteville, GA | Davis Southern Septic';
    }
    return $title;
}, 5 );

/* ================================================================
   FAYETTEVILLE — parse_request hard intercept (earliest possible hook)
================================================================ */
add_action( 'parse_request', function( $wp ) {
    $uri = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    if ( $uri === 'city/fayetteville' || $uri === 'city/fayetteville/' ) {
        $wp->query_vars                     = [];
        $wp->query_vars['dss_fayetteville'] = '1';
    }
}, 1 );

/* ================================================================
   FRONT PAGE TEMPLATE ENFORCEMENT
   Forces front-page.php to load regardless of WP Reading settings.
   Fixes blank homepage when "Static page" is set in Settings > Reading.
================================================================ */
add_filter( 'template_include', function( $template ) {
    /* Only the true homepage URL. Never hijack custom routes
       (service-areas, city/, county/, privacy-policy, terms). */
    $path = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    if ( $path === '' && is_front_page()
         && ! get_query_var('dss_page') && ! get_query_var('dss_city_slug')
         && ! get_query_var('dss_county_slug') && ! get_query_var('dss_fayetteville') ) {
        $fp = get_stylesheet_directory() . '/front-page.php';
        if ( file_exists( $fp ) ) return $fp;
    }
    return $template;
}, 99 );


/* ================================================================
   LEGAL PAGES — /privacy-policy and /terms
   Real URLs that work with or without a WordPress page of the
   same name. Required for Twilio / A2P SMS registration.
================================================================ */
add_action( 'init', function() {
    add_rewrite_rule( '^privacy-policy/?$',       'index.php?dss_page=privacy-policy', 'top' );
    add_rewrite_rule( '^terms/?$',                'index.php?dss_page=terms',          'top' );
    add_rewrite_rule( '^terms-and-conditions/?$', 'index.php?dss_page=terms',          'top' );
} );

add_filter( 'request', function( $qv ) {
    $path = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    if ( $path === 'privacy-policy' ) return array( 'dss_page' => 'privacy-policy' );
    if ( $path === 'terms' || $path === 'terms-and-conditions' ) return array( 'dss_page' => 'terms' );
    return $qv;
}, 20 );

add_filter( 'template_include', function( $template ) {
    $pg = get_query_var( 'dss_page' );
    if ( $pg === 'privacy-policy' ) { $t = locate_template( 'page-privacy-policy.php' ); if ( $t ) return $t; }
    if ( $pg === 'terms' )          { $t = locate_template( 'page-terms.php' );          if ( $t ) return $t; }
    return $template;
}, 100 );

add_filter( 'pre_get_document_title', function( $title ) {
    $pg = get_query_var( 'dss_page' );
    if ( $pg === 'privacy-policy' ) return 'Privacy Policy | Davis Southern Septic';
    if ( $pg === 'terms' )          return 'Terms and Conditions | Davis Southern Septic';
    return $title;
}, 20 );

/* Force a one-time rewrite flush so the new URLs register */
add_action( 'wp_loaded', function() {
    if ( get_transient( 'dss_flush_v19_4' ) ) return;
    flush_rewrite_rules();
    set_transient( 'dss_flush_v19_4', true, WEEK_IN_SECONDS );
} );
