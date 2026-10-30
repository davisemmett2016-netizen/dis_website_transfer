<?php
/**
 * Davis Southern Septic — SEO & Schema Markup
 * Handles: meta descriptions, canonical URLs, Open Graph tags,
 * LocalBusiness schema, Service schema, FAQ schema, BreadcrumbList schema
 *
 * Hooked into wp_head via dss_seo_head() in functions.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ================================================================
   MASTER PAGE CONTEXT RESOLVER
   Returns an array with context info for the current page
================================================================ */
function dss_get_page_context() {
    if ( ! function_exists( 'dss_get_counties_cities' ) ) {
        require_once get_stylesheet_directory() . '/template-parts/city-data.php';
    }

    $ctx = [
        'type'        => 'home',      // home | city | county | service | about | contact | service-areas | generic
        'city'        => '',
        'county'      => '',
        'county_key'  => '',
        'service'     => '',          // human-readable service name
        'service_key' => '',          // slug key
        'title'       => '',
        'description' => '',
        'canonical'   => home_url('/'),
        'breadcrumbs' => [],
        'faqs'        => [],
    ];

    /* ---- City page ---- */
    $city_slug = get_query_var( 'dss_city_slug' );
    if ( $city_slug ) {
        foreach ( dss_get_counties_cities() as $ckey => $county ) {
            foreach ( $county['cities'] as $city ) {
                if ( dss_city_slug( $city ) === $city_slug ) {
                    $ctx['type']       = 'city';
                    $ctx['city']       = $city;
                    $ctx['county']     = $county['name'];
                    $ctx['county_key'] = $ckey;
                    $ctx['canonical']  = home_url( '/city/' . $city_slug . '/' );
                    $ctx['title']      = 'Septic Services in ' . $city . ', GA | Davis Southern Septic';
                    $ctx['description'] = 'Davis Southern Septic provides licensed septic pumping, inspections, installations, and grease trap cleaning in ' . $city . ', Georgia. Serving all of ' . $county['name'] . ' — call 470.839.4441.';
                    $ctx['breadcrumbs'] = [
                        [ 'name' => 'Home',          'url' => home_url('/') ],
                        [ 'name' => 'Service Areas', 'url' => home_url('/service-areas/') ],
                        [ 'name' => $county['name'], 'url' => home_url('/county/' . $ckey . '/') ],
                        [ 'name' => $city,           'url' => $ctx['canonical'] ],
                    ];
                    $ctx['faqs'] = [
                        [
                            'q' => 'Do you offer septic pumping in ' . $city . ', GA?',
                            'a' => 'Yes. Davis Southern Septic regularly serves ' . $city . ' and all of ' . $county['name'] . '. Call 470.839.4441 to schedule.',
                        ],
                        [
                            'q' => 'How much does septic pumping cost in ' . $city . '?',
                            'a' => 'Pricing depends on tank size and access. We offer flat-rate, transparent pricing — call us at 470.839.4441 for a quote.',
                        ],
                        [
                            'q' => 'Do you provide real estate septic inspections in ' . $city . '?',
                            'a' => 'Yes. We provide certified septic inspections for buyers, sellers, and realtors in ' . $city . ' with same-week availability and written reports.',
                        ],
                        [
                            'q' => 'Is Davis Southern Septic licensed and insured in Georgia?',
                            'a' => 'Yes. We are fully licensed, insured, and state-certified to perform septic services across Georgia.',
                        ],
                    ];
                    break 2;
                }
            }
        }
        return $ctx;
    }

    /* ---- County page ---- */
    $county_slug = get_query_var( 'dss_county_slug' );
    if ( $county_slug ) {
        $counties = dss_get_counties_cities();
        if ( isset( $counties[ $county_slug ] ) ) {
            $county = $counties[ $county_slug ];
            $ctx['type']       = 'county';
            $ctx['county']     = $county['name'];
            $ctx['county_key'] = $county_slug;
            $ctx['canonical']  = home_url( '/county/' . $county_slug . '/' );
            $ctx['title']      = 'Septic Services in ' . $county['name'] . ', GA | Davis Southern Septic';
            $ctx['description'] = 'Licensed septic pumping, inspections, repairs, installations, and grease trap cleaning throughout ' . $county['name'] . ', Georgia. Davis Southern Septic — call 470.839.4441.';
            $ctx['breadcrumbs'] = [
                [ 'name' => 'Home',          'url' => home_url('/') ],
                [ 'name' => 'Service Areas', 'url' => home_url('/service-areas/') ],
                [ 'name' => $county['name'], 'url' => $ctx['canonical'] ],
            ];
        }
        return $ctx;
    }

    /* ---- Service areas directory ---- */
    if ( get_query_var('dss_page') === 'service-areas' || ( is_page() && get_page_template_slug() === 'page-service-areas.php' ) ) {
        $ctx['type']        = 'service-areas';
        $ctx['canonical']   = home_url('/service-areas/');
        $ctx['title']       = 'Septic Service Areas in Metro Atlanta | Davis Southern Septic';
        $ctx['description'] = 'Davis Southern Septic serves 9+ counties and 100+ cities across Metro Atlanta, Georgia. Find your city and schedule septic pumping, inspections, or grease trap cleaning.';
        $ctx['breadcrumbs'] = [
            [ 'name' => 'Home',          'url' => home_url('/') ],
            [ 'name' => 'Service Areas', 'url' => $ctx['canonical'] ],
        ];
        return $ctx;
    }

    /* ---- Front page (must run before the is_page() guard below) ---- */
    if ( is_front_page() ) {
        $ctx['type']        = 'home';
        $ctx['canonical']   = home_url('/');
        $ctx['title']       = 'Metro Atlanta Septic Pumping, Inspections & Grease Trap Cleaning | Davis Southern Septic';
        $ctx['description'] = 'Davis Southern Septic is Metro Atlanta\'s trusted, licensed septic company. Pumping, inspections, installations, repairs, and grease trap cleaning across 9+ Georgia counties. Call 470.839.4441.';
        $ctx['breadcrumbs'] = [];
        return $ctx;
    }

    /* ---- Legal pages ---- */
    $legal = get_query_var( 'dss_page' );
    if ( $legal === 'privacy-policy' || $legal === 'terms' ) {
        $is_pp = ( $legal === 'privacy-policy' );
        $ctx['type']        = 'generic';
        $ctx['canonical']   = home_url( $is_pp ? '/privacy-policy/' : '/terms/' );
        $ctx['title']       = $is_pp ? 'Privacy Policy | Davis Southern Septic' : 'Terms and Conditions | Davis Southern Septic';
        $ctx['description'] = $is_pp
            ? 'How Davis Southern Septic collects, uses, and protects your information, including SMS text messaging.'
            : 'Terms and conditions for Davis Southern Septic services and SMS text messaging.';
        $ctx['breadcrumbs'] = [
            [ 'name' => 'Home', 'url' => home_url('/') ],
            [ 'name' => $is_pp ? 'Privacy Policy' : 'Terms and Conditions', 'url' => $ctx['canonical'] ],
        ];
        return $ctx;
    }

    /* ---- WordPress pages ---- */
    if ( ! is_page() ) {
        return $ctx; // front page handled below
    }

    $slug = get_post_field( 'post_name', get_queried_object_id() );
    $template = get_page_template_slug();

    $service_map = [
        'pumping-inspections' => [
            'name'        => 'Septic Pumping & Inspections',
            'description' => 'Professional septic tank pumping and full system inspections in Metro Atlanta, GA. Davis Southern Septic — licensed, insured, flat-rate pricing. Call 470.839.4441.',
            'faqs'        => [
                [ 'q' => 'How often should a septic tank be pumped in Georgia?', 'a' => 'Most Georgia households should pump their septic tank every 3–5 years. Larger households or tanks under 1,000 gallons may need service more frequently.' ],
                [ 'q' => 'How much does septic pumping cost in Metro Atlanta?', 'a' => 'Pricing depends on tank size and access conditions. Davis Southern Septic offers flat-rate transparent pricing — call 470.839.4441 for a quote.' ],
                [ 'q' => 'What is included in a septic inspection?', 'a' => 'Our inspection covers tank condition, inlet/outlet baffles, distribution box, drain field assessment, and a written report with findings and recommendations.' ],
            ],
        ],
        'grease-trap-cleaning' => [
            'name'        => 'Grease Trap Cleaning',
            'description' => 'Commercial grease trap pumping and cleaning for restaurants, kitchens, and food service businesses across Metro Atlanta. Compliance docs included. Call 470.839.4441.',
            'faqs'        => [
                [ 'q' => 'How often should a grease trap be cleaned in Georgia?', 'a' => 'Georgia restaurants typically need grease trap cleaning every 1–3 months depending on volume. We provide compliance documentation after each service.' ],
                [ 'q' => 'Do you provide documentation for health department compliance?', 'a' => 'Yes. We provide written service records after every grease trap cleaning to support health department and municipal compliance requirements.' ],
            ],
        ],
        'real-estate-inspections' => [
            'name'        => 'Real Estate Septic Inspections',
            'description' => 'Certified septic inspections for Georgia homebuyers, sellers, and realtors. Written reports, photo documentation, and same-week availability. Call 470.839.4441.',
            'faqs'        => [
                [ 'q' => 'Is a septic inspection required to sell a home in Georgia?', 'a' => 'It is not always legally required, but it is strongly recommended and often requested by buyers. A clean inspection report prevents surprises at closing.' ],
                [ 'q' => 'How long does a real estate septic inspection take?', 'a' => 'Most inspections take 1–2 hours. We provide a written report with photos typically within 24 hours of the inspection.' ],
                [ 'q' => 'Can you do same-week septic inspections for closings?', 'a' => 'Yes. We offer same-week availability for real estate inspections throughout Metro Atlanta and surrounding counties.' ],
            ],
        ],
        'installs-maintenance' => [
            'name'        => 'Septic Installation & Maintenance',
            'description' => 'State-certified septic system installation for new construction and replacements in Metro Atlanta, GA. Permitting, design, and installation. Call 470.839.4441.',
            'faqs'        => [
                [ 'q' => 'Do you handle septic permits in Georgia?', 'a' => 'Yes. We coordinate all permitting with the county health department and manage the full installation process from site evaluation through final inspection.' ],
                [ 'q' => 'How long does a septic system installation take?', 'a' => 'Most residential installations are completed in 1–3 days once permits are approved. Timeline depends on system type and site conditions.' ],
            ],
        ],
        'about' => [
            'name'        => 'About Davis Southern Septic',
            'description' => 'Davis Southern Septic is a family-owned, state-certified septic service company serving Metro Atlanta, Georgia. Licensed, insured, and trusted for over a decade.',
            'faqs'        => [],
        ],
        'contact' => [
            'name'        => 'Contact Davis Southern Septic',
            'description' => 'Contact Davis Southern Septic for septic pumping, inspections, installations, and grease trap cleaning in Metro Atlanta, GA. Call 470.839.4441 or request service online.',
            'faqs'        => [],
        ],
        'reviews' => [
            'name'        => 'Customer Reviews — Davis Southern Septic',
            'description' => 'Read customer reviews for Davis Southern Septic. Trusted by Metro Atlanta homeowners, realtors, and restaurants for reliable septic and grease trap services.',
            'faqs'        => [],
        ],
    ];

    if ( isset( $service_map[ $slug ] ) ) {
        $svc = $service_map[ $slug ];
        $ctx['type']        = ( in_array( $slug, ['about','contact','reviews'] ) ) ? $slug : 'service';
        $ctx['service']     = $svc['name'];
        $ctx['service_key'] = $slug;
        $ctx['canonical']   = home_url( '/' . $slug . '/' );
        $ctx['title']       = $svc['name'] . ' | Davis Southern Septic';
        $ctx['description'] = $svc['description'];
        $ctx['faqs']        = $svc['faqs'];
        $ctx['breadcrumbs'] = [
            [ 'name' => 'Home',       'url' => home_url('/') ],
            [ 'name' => $svc['name'], 'url' => $ctx['canonical'] ],
        ];
        return $ctx;
    }

    /* ---- Front page ---- */
    if ( is_front_page() ) {
        $ctx['type']        = 'home';
        $ctx['canonical']   = home_url('/');
        $ctx['title']       = 'Metro Atlanta Septic Pumping, Inspections & Grease Trap Cleaning | Davis Southern Septic';
        $ctx['description'] = 'Davis Southern Septic — Metro Atlanta\'s trusted, licensed septic company. Pumping, inspections, installations, repairs, and grease trap cleaning across 9+ Georgia counties. Call 470.839.4441.';
        $ctx['breadcrumbs'] = [];
        return $ctx;
    }

    return $ctx;
}


/* ================================================================
   SCHEMA HELPERS
================================================================ */

function dss_schema_local_business() {
    return [
        '@context'        => 'https://schema.org',
        '@type'           => 'LocalBusiness',
        '@id'             => home_url('/#business'),
        'name'            => 'Davis Southern Septic',
        'alternateName'   => 'DSS',
        'description'     => 'Licensed and state-certified septic pumping, inspections, installations, repairs, and grease trap cleaning serving Metro Atlanta and surrounding Georgia counties.',
        'url'             => home_url('/'),
        'telephone'       => '+14708394441',
        'email'           => 'contact@davissouthernseptic.com',
        'priceRange'      => '$$',
        'currenciesAccepted' => 'USD',
        'paymentAccepted' => 'Cash, Check, Credit Card',
        'image'           => get_stylesheet_directory_uri() . '/assets/logo.png',
        'logo'            => [
            '@type' => 'ImageObject',
            'url'   => get_stylesheet_directory_uri() . '/assets/logo.png',
        ],
        'address' => [
            '@type'           => 'PostalAddress',
            'addressLocality' => 'Fayetteville',
            'addressRegion'   => 'GA',
            'addressCountry'  => 'US',
        ],
        'geo' => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => 33.4473,
            'longitude' => -84.4549,
        ],
        'areaServed' => [
            [ '@type' => 'AdministrativeArea', 'name' => 'Fayette County, Georgia' ],
            [ '@type' => 'AdministrativeArea', 'name' => 'Henry County, Georgia' ],
            [ '@type' => 'AdministrativeArea', 'name' => 'Clayton County, Georgia' ],
            [ '@type' => 'AdministrativeArea', 'name' => 'Coweta County, Georgia' ],
            [ '@type' => 'AdministrativeArea', 'name' => 'Fulton County, Georgia' ],
            [ '@type' => 'AdministrativeArea', 'name' => 'Douglas County, Georgia' ],
            [ '@type' => 'AdministrativeArea', 'name' => 'Gwinnett County, Georgia' ],
            [ '@type' => 'AdministrativeArea', 'name' => 'Forsyth County, Georgia' ],
            [ '@type' => 'AdministrativeArea', 'name' => 'Cherokee County, Georgia' ],
        ],
        'openingHoursSpecification' => [
            [
                '@type'    => 'OpeningHoursSpecification',
                'dayOfWeek' => [ 'Monday','Tuesday','Wednesday','Thursday','Friday' ],
                'opens'    => '08:00',
                'closes'   => '17:00',
            ],
        ],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name'  => 'Septic Services',
            'itemListElement' => [
                [ '@type' => 'Offer', 'itemOffered' => [ '@type' => 'Service', 'name' => 'Septic Tank Pumping' ] ],
                [ '@type' => 'Offer', 'itemOffered' => [ '@type' => 'Service', 'name' => 'Septic System Inspection' ] ],
                [ '@type' => 'Offer', 'itemOffered' => [ '@type' => 'Service', 'name' => 'Real Estate Septic Inspection' ] ],
                [ '@type' => 'Offer', 'itemOffered' => [ '@type' => 'Service', 'name' => 'Septic System Installation' ] ],
                [ '@type' => 'Offer', 'itemOffered' => [ '@type' => 'Service', 'name' => 'Drain Field Repair' ] ],
                [ '@type' => 'Offer', 'itemOffered' => [ '@type' => 'Service', 'name' => 'Grease Trap Cleaning' ] ],
                [ '@type' => 'Offer', 'itemOffered' => [ '@type' => 'Service', 'name' => 'Emergency Septic Service' ] ],
            ],
        ],
        'sameAs' => [
            'https://www.google.com/maps/place/Davis+Southern+Septic/@33.7881144,-85.0124387,9z/data=!3m1!4b1!4m6!3m5!1s0xac1735369927ab83:0xb4a1dcf4027c67a1!8m2!3d33.7887265!4d-84.35304!16s%2Fg%2F11z8syhx7y',
            'https://www.google.com/maps?cid=12996018117374043041',
        ],
    ];
}

function dss_schema_service( $name, $description, $url, $city = '', $county = '' ) {
    $area = $city ? $city . ', Georgia' : 'Metro Atlanta, Georgia';
    return [
        '@context'    => 'https://schema.org',
        '@type'       => 'Service',
        'name'        => $name . ( $city ? ' in ' . $city . ', GA' : ' in Metro Atlanta, GA' ),
        'description' => $description,
        'url'         => $url,
        'provider'    => [
            '@type'     => 'LocalBusiness',
            '@id'       => home_url('/#business'),
            'name'      => 'Davis Southern Septic',
            'telephone' => '+14708394441',
        ],
        'areaServed' => [
            '@type' => 'AdministrativeArea',
            'name'  => $area,
        ],
        'serviceType' => $name,
    ];
}

function dss_schema_faq( $faqs ) {
    if ( empty( $faqs ) ) return null;
    $items = [];
    foreach ( $faqs as $faq ) {
        $items[] = [
            '@type'          => 'Question',
            'name'           => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $faq['a'],
            ],
        ];
    }
    return [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $items,
    ];
}

function dss_schema_breadcrumb( $crumbs ) {
    if ( empty( $crumbs ) ) return null;
    $items = [];
    foreach ( $crumbs as $i => $crumb ) {
        $items[] = [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $crumb['name'],
            'item'     => $crumb['url'],
        ];
    }
    return [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => $items,
    ];
}


/* ================================================================
   MAIN HEAD OUTPUT FUNCTION
   Called from wp_head hook in functions.php
================================================================ */
function dss_seo_head() {
    $ctx   = dss_get_page_context();
    $title = $ctx['title'];
    $desc  = $ctx['description'];
    $canon = $ctx['canonical'];
    $image = get_stylesheet_directory_uri() . '/assets/logo.png';

    /* ---- Meta description ---- */
    echo "\n<!-- DSS SEO -->\n";
    if ( $desc ) {
        echo '<meta name="description" content="' . esc_attr( $desc ) . '" />' . "\n";
    }

    /* ---- Canonical ---- */
    echo '<link rel="canonical" href="' . esc_url( $canon ) . '" />' . "\n";

    /* ---- Open Graph ---- */
    echo '<meta property="og:type"        content="website" />' . "\n";
    echo '<meta property="og:site_name"   content="Davis Southern Septic" />' . "\n";
    echo '<meta property="og:url"         content="' . esc_url( $canon ) . '" />' . "\n";
    if ( $title ) {
        echo '<meta property="og:title"      content="' . esc_attr( $title ) . '" />' . "\n";
    }
    if ( $desc ) {
        echo '<meta property="og:description" content="' . esc_attr( $desc ) . '" />' . "\n";
    }
    echo '<meta property="og:image"       content="' . esc_url( $image ) . '" />' . "\n";
    echo '<meta property="og:locale"      content="en_US" />' . "\n";

    /* ---- Twitter Card ---- */
    echo '<meta name="twitter:card"        content="summary" />' . "\n";
    echo '<meta name="twitter:title"       content="' . esc_attr( $title ?: get_bloginfo('name') ) . '" />' . "\n";
    if ( $desc ) {
        echo '<meta name="twitter:description" content="' . esc_attr( $desc ) . '" />' . "\n";
    }
    echo '<meta name="twitter:image"       content="' . esc_url( $image ) . '" />' . "\n";

    /* ---- Schema blocks ---- */
    $schemas = [];

    /* LocalBusiness — on every page */
    $schemas[] = dss_schema_local_business();

    /* Breadcrumbs */
    if ( ! empty( $ctx['breadcrumbs'] ) ) {
        $schemas[] = dss_schema_breadcrumb( $ctx['breadcrumbs'] );
    }

    /* FAQ */
    if ( ! empty( $ctx['faqs'] ) ) {
        $schemas[] = dss_schema_faq( $ctx['faqs'] );
    }

    /* Service schema — city pages and service pages */
    if ( $ctx['type'] === 'city' ) {
        $services = [
            [ 'Septic Tank Pumping',          'Professional septic tank pumping and inspection.' ],
            [ 'Real Estate Septic Inspection', 'Certified septic inspections for home sales.' ],
            [ 'Grease Trap Cleaning',          'Commercial grease trap pumping and cleaning.' ],
            [ 'Septic System Installation',    'State-certified new septic system installation.' ],
        ];
        foreach ( $services as $svc ) {
            $schemas[] = dss_schema_service(
                $svc[0],
                $svc[1],
                $ctx['canonical'],
                $ctx['city'],
                $ctx['county']
            );
        }
    } elseif ( $ctx['type'] === 'service' ) {
        $schemas[] = dss_schema_service(
            $ctx['service'],
            $ctx['description'],
            $ctx['canonical']
        );
    }

    /* Output all schemas */
    foreach ( $schemas as $schema ) {
        if ( $schema ) {
            echo '<script type="application/ld+json">' . "\n";
            echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
            echo "\n" . '</script>' . "\n";
        }
    }

    echo "<!-- /DSS SEO -->\n\n";
}
