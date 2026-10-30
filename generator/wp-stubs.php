<?php
/**
 * Minimal stand-ins for the WordPress functions the DSS theme calls,
 * so the real theme templates can be rendered to plain static HTML.
 */
define( 'ABSPATH', __DIR__ . '/' );
define( 'THEME_DIR', __DIR__ . '/theme' );
define( 'SITE_URL', rtrim( getenv('SITE_URL') ?: 'https://davissouthernseptic.com', '/' ) );
define( 'FORM_ENDPOINT', getenv('FORM_ENDPOINT') ?: '/api/submit' );
define( 'HOME_TITLE', 'Davis Southern Septic – Georgia septic and grease trap company offering pumping, inspections, cleaning, repairs, and installations for residential and commercial clients.' );

$GLOBALS['__hooks'] = [];
$GLOBALS['QV']      = [];
$GLOBALS['ROUTE']   = [];
$GLOBALS['ENQ']     = [ 'style' => [], 'script' => [], 'local' => [] ];

/* ---- hooks ---- */
function add_action( $h, $cb, $p = 10, $n = 1 ) { $GLOBALS['__hooks'][$h][$p][] = $cb; return true; }
function add_filter( $h, $cb, $p = 10, $n = 1 ) { return add_action( $h, $cb, $p, $n ); }
function do_action( $h, ...$args ) {
    if ( empty( $GLOBALS['__hooks'][$h] ) ) return;
    $by = $GLOBALS['__hooks'][$h]; ksort( $by );
    foreach ( $by as $cbs ) foreach ( $cbs as $cb ) call_user_func_array( $cb, $args );
}
function apply_filters( $h, $v, ...$args ) {
    if ( empty( $GLOBALS['__hooks'][$h] ) ) return $v;
    $by = $GLOBALS['__hooks'][$h]; ksort( $by );
    foreach ( $by as $cbs ) foreach ( $cbs as $cb ) $v = call_user_func_array( $cb, array_merge( [ $v ], $args ) );
    return $v;
}

/* ---- urls / escaping ---- */
function home_url( $p = '' )    { return SITE_URL . ( $p === '' ? '' : '/' . ltrim( $p, '/' ) ); }
function esc_html( $s )         { return htmlspecialchars( (string) $s, ENT_QUOTES, 'UTF-8', false ); }
function esc_attr( $s )         { return esc_html( $s ); }
function esc_url( $s )          { return esc_html( $s ); }
function sanitize_text_field( $s )     { return trim( strip_tags( (string) $s ) ); }
function sanitize_textarea_field( $s ) { return trim( strip_tags( (string) $s ) ); }
function sanitize_email( $s )   { return trim( (string) $s ); }
function sanitize_title( $s )   { return trim( strtolower( preg_replace( '/[^a-z0-9]+/i', '-', (string) $s ) ), '-' ); }
function wp_json_encode( $d, $f = 0 ) { return json_encode( $d, $f ); }

/* ---- theme paths ---- */
function get_stylesheet_directory()     { return THEME_DIR; }
function get_stylesheet_directory_uri() { return SITE_URL; }
function get_stylesheet_uri()           { return SITE_URL . '/style.css'; }
function admin_url( $p = '' )           { return FORM_ENDPOINT; }
function wp_create_nonce( $a = '' )     { return 'static'; }
function locate_template( $n )          { $f = THEME_DIR . '/' . $n; return file_exists( $f ) ? $f : ''; }
function get_template_part( $slug )     { include THEME_DIR . '/' . $slug . '.php'; }
function get_header()                   { include THEME_DIR . '/header.php'; }
function get_footer()                   { include THEME_DIR . '/footer.php'; }

/* ---- query / context ---- */
function get_query_var( $k, $d = '' )   { return $GLOBALS['QV'][$k] ?? $d; }
function is_front_page()                { return ( $GLOBALS['ROUTE']['kind'] ?? '' ) === 'front'; }
function is_home()                      { return false; }
function is_page( $x = null )           { return ( $GLOBALS['ROUTE']['kind'] ?? '' ) === 'page'; }
function get_page_template_slug()       { return $GLOBALS['ROUTE']['template_slug'] ?? ''; }
function get_queried_object_id()        { return 1; }
function get_post_field( $f, $id = 0 )  { return $GLOBALS['ROUTE']['slug'] ?? ''; }
function get_permalink()                { return SITE_URL . '/' . ( $GLOBALS['ROUTE']['slug'] ?? '' ) . '/'; }
function get_bloginfo( $k = '' )        { return $k === 'name' ? 'Davis Southern Septic' : 'UTF-8'; }
function bloginfo( $k = '' )            { echo get_bloginfo( $k ); }
function language_attributes()          { echo 'lang="en-US"'; }
function body_class()                   { echo 'class="dss-static"'; }
function wp_body_open()                 {}
function have_posts()                   { return false; }
function the_post()                     {}
function the_title()                    {}
function the_content()                  {}

/* ---- setup noise ---- */
function add_theme_support() {}
function register_nav_menus() {}
function add_rewrite_rule() {}
function flush_rewrite_rules() {}
function get_transient( $k )            { return false; }
function set_transient( $k, $v, $t = 0 ) { return true; }
function wp_verify_nonce()              { return true; }
function wp_send_json_success( $d = [] ) {}
function wp_send_json_error( $d = [] )   {}
function wp_mail()                      { return false; }

/* ---- enqueue / head / footer ---- */
function wp_enqueue_style( $h, $src, $deps = [], $ver = false ) { $GLOBALS['ENQ']['style'][$h] = [ $src, $ver ]; }
function wp_enqueue_script( $h, $src, $deps = [], $ver = false, $foot = false ) { $GLOBALS['ENQ']['script'][$h] = [ $src, $ver ]; }
function wp_localize_script( $h, $obj, $data ) { $GLOBALS['ENQ']['local'][$h] = [ $obj, $data ]; }

function dss_static_title() {
    $t = apply_filters( 'pre_get_document_title', '' );
    if ( $t ) return $t;
    $slug = $GLOBALS['ROUTE']['slug'] ?? '';
    $map = [
        'about'   => 'About Davis Southern Septic | Family-Owned Septic Company in Metro Atlanta',
        'contact' => 'Contact Davis Southern Septic | Septic Service in Metro Atlanta, GA',
        'reviews' => 'Customer Reviews | Davis Southern Septic',
    ];
    if ( isset( $map[$slug] ) ) return $map[$slug];
    if ( function_exists( 'dss_get_page_context' ) ) {
        $c = dss_get_page_context();
        if ( ! empty( $c['title'] ) ) return $c['title'];
    }
    return HOME_TITLE;
}
function wp_head() {
    echo '<title>' . esc_html( dss_static_title() ) . "</title>\n";
    do_action( 'wp_head' );
    foreach ( $GLOBALS['ENQ']['style'] as $h => $s ) {
        $u = $s[0] . ( $s[1] ? ( strpos( $s[0], '?' ) === false ? '?' : '&' ) . 'ver=' . $s[1] : '' );
        echo '<link rel="stylesheet" id="' . $h . '-css" href="' . esc_url( $u ) . '" />' . "\n";
    }
}
function wp_footer() {
    foreach ( $GLOBALS['ENQ']['local'] as $h => $l ) {
        echo '<script>var ' . $l[0] . ' = ' . json_encode( $l[1], JSON_UNESCAPED_SLASHES ) . ";</script>\n";
    }
    foreach ( $GLOBALS['ENQ']['script'] as $h => $s ) {
        $u = $s[0] . ( $s[1] ? '?ver=' . $s[1] : '' );
        echo '<script src="' . esc_url( $u ) . '" id="' . $h . '-js"></script>' . "\n";
    }
    do_action( 'wp_footer' );
}
