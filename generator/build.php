<?php
/**
 * Davis Southern Septic: static site generator.
 *
 * Renders the real theme templates in ./theme into plain HTML in ../site
 *
 * Usage (from the project root):
 *   php generator/build.php
 *   SITE_URL=https://davissouthernseptic.com FORM_ENDPOINT=/api/submit php generator/build.php
 */
error_reporting( E_ALL );
require __DIR__ . '/wp-stubs.php';

$OUT = dirname( __DIR__ ) . '/site';
$warnings = [];
set_error_handler( function( $no, $str, $file, $line ) use ( &$warnings ) {
    $warnings[] = ( $GLOBALS['ROUTE']['uri'] ?? '?' ) . ' :: ' . $str . ' (' . basename( $file ) . ':' . $line . ')';
    return true;
} );

/* ---- load the theme's own functions (registers filters + enqueue) ---- */
require THEME_DIR . '/functions.php';
require_once THEME_DIR . '/template-parts/city-data.php';
do_action( 'after_setup_theme' );

/* ---- route table ---- */
$routes = [];
$routes[] = [ 'uri' => '/', 'kind' => 'front', 'template' => 'front-page.php', 'slug' => '' ];

foreach ( [ 'about', 'contact', 'reviews', 'installs-maintenance', 'grease-trap-cleaning', 'real-estate-inspections', 'pumping-inspections' ] as $slug ) {
    $routes[] = [ 'uri' => "/$slug/", 'kind' => 'page', 'template' => "page-$slug.php", 'slug' => $slug ];
}
$routes[] = [ 'uri' => '/service-areas/',  'kind' => 'custom', 'template' => 'page-service-areas.php',   'slug' => 'service-areas',  'qv' => [ 'dss_page' => 'service-areas' ] ];
$routes[] = [ 'uri' => '/privacy-policy/', 'kind' => 'custom', 'template' => 'page-privacy-policy.php', 'slug' => 'privacy-policy', 'qv' => [ 'dss_page' => 'privacy-policy' ] ];
$routes[] = [ 'uri' => '/terms/',          'kind' => 'custom', 'template' => 'page-terms.php',          'slug' => 'terms',          'qv' => [ 'dss_page' => 'terms' ] ];
$routes[] = [ 'uri' => '/city/fayetteville/', 'kind' => 'custom', 'template' => 'page-fayetteville.php', 'slug' => 'fayetteville', 'qv' => [ 'dss_fayetteville' => '1', 'dss_city_slug' => 'fayetteville' ] ];

$seen = [ 'fayetteville' => true ];
foreach ( dss_get_counties_cities() as $key => $county ) {
    $routes[] = [ 'uri' => "/county/$key/", 'kind' => 'custom', 'template' => 'page-county.php', 'slug' => $key, 'qv' => [ 'dss_county_slug' => $key ] ];
    foreach ( $county['cities'] as $city ) {
        $cs = dss_city_slug( $city );
        if ( isset( $seen[$cs] ) ) continue;
        $seen[$cs] = true;
        $routes[] = [ 'uri' => "/city/$cs/", 'kind' => 'custom', 'template' => 'page-city.php', 'slug' => $cs, 'qv' => [ 'dss_city_slug' => $cs ] ];
    }
}

/* ---- rendering ---- */
function render_route( $r ) {
    $GLOBALS['ROUTE'] = $r;
    $GLOBALS['QV']    = $r['qv'] ?? [];
    $GLOBALS['ENQ']   = [ 'style' => [], 'script' => [], 'local' => [] ];
    $_SERVER['REQUEST_URI'] = $r['uri'];
    do_action( 'wp_enqueue_scripts' );
    ob_start();
    include THEME_DIR . '/' . $r['template'];
    return ob_get_clean();
}

function finalize( $html, $noindex = false ) {
    $base = preg_quote( SITE_URL, '#' );
    // keep the canonical link absolute
    $keep = [];
    $html = preg_replace_callback( '#<link rel="canonical" href="[^"]*" />#', function( $m ) use ( &$keep ) {
        $keep[] = $m[0]; return '@@CANON' . ( count( $keep ) - 1 ) . '@@';
    }, $html );
    // internal links and assets become root-relative
    $html = preg_replace_callback( '#(href|src|action)="' . $base . '(/[^"]*)?"#', function( $m ) {
        return $m[1] . '="' . ( $m[2] ?? '/' ) . '"';
    }, $html );
    $html = preg_replace( '#url\(\s*([\'"]?)' . $base . '/#', 'url($1/', $html );
    // add trailing slash to internal page links so Cloudflare does not redirect
    $html = preg_replace_callback( '#href="(/(?!/)[^"\#?]*)([\#?][^"]*)?"#', function( $m ) {
        $p = $m[1];
        if ( $p !== '/' && substr( $p, -1 ) !== '/' && strpos( basename( $p ), '.' ) === false ) $p .= '/';
        return 'href="' . $p . ( $m[2] ?? '' ) . '"';
    }, $html );
    foreach ( $keep as $i => $c ) $html = str_replace( '@@CANON' . $i . '@@', $c, $html );
    if ( $noindex ) $html = str_replace( '</head>', '<meta name="robots" content="noindex, follow" />' . "\n</head>", $html );
    return $html;
}

function write_file( $path, $data ) {
    if ( ! is_dir( dirname( $path ) ) ) mkdir( dirname( $path ), 0777, true );
    file_put_contents( $path, $data );
}
function rrmdir( $d ) {
    if ( ! is_dir( $d ) ) return;
    foreach ( scandir( $d ) as $f ) { if ( $f === '.' || $f === '..' ) continue; is_dir( "$d/$f" ) ? rrmdir( "$d/$f" ) : unlink( "$d/$f" ); }
    rmdir( $d );
}
function rcopy( $src, $dst ) {
    if ( ! is_dir( $dst ) ) mkdir( $dst, 0777, true );
    foreach ( scandir( $src ) as $f ) { if ( $f === '.' || $f === '..' ) continue; is_dir( "$src/$f" ) ? rcopy( "$src/$f", "$dst/$f" ) : copy( "$src/$f", "$dst/$f" ); }
}

rrmdir( $OUT );
mkdir( $OUT, 0777, true );

$count = 0; $urls = [];
foreach ( $routes as $r ) {
    $html = finalize( render_route( $r ) );
    $path = $r['uri'] === '/' ? $OUT . '/index.html' : $OUT . rtrim( $r['uri'], '/' ) . '/index.html';
    write_file( $path, $html );
    $urls[] = $r['uri']; $count++;
}

/* ---- 404 page ---- */
$GLOBALS['ROUTE'] = [ 'uri' => '/404', 'kind' => 'custom', 'slug' => '404' ];
$GLOBALS['QV'] = []; $GLOBALS['ENQ'] = [ 'style' => [], 'script' => [], 'local' => [] ];
$_SERVER['REQUEST_URI'] = '/404';
do_action( 'wp_enqueue_scripts' );
ob_start();
get_header(); ?>
<div class="page-hero"><div class="hero-dots"></div><div class="dss-wrap"><div class="page-hero-content">
  <h1>Page Not Found</h1>
  <p>We could not find that page. Try the links below, or call us any time at 470.839.4441.</p>
  <div class="page-hero-actions">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Back to Home</a>
    <a href="tel:4708394441" class="btn btn-outline-white">Call 470.839.4441</a>
  </div></div></div></div>
<?php get_footer();
write_file( $OUT . '/404.html', finalize( ob_get_clean(), true ) );

/* ---- static assets ---- */
copy( THEME_DIR . '/style.css', $OUT . '/style.css' );
rcopy( THEME_DIR . '/assets', $OUT . '/assets' );

/* ---- sitemap, robots, headers ---- */
$sm = '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ( $urls as $u ) {
    $pri = $u === '/' ? '1.0' : ( preg_match( '#^/(city|county)/#', $u ) ? '0.6' : '0.8' );
    $sm .= '  <url><loc>' . SITE_URL . $u . '</loc><priority>' . $pri . "</priority></url>\n";
}
$sm .= "</urlset>\n";
write_file( $OUT . '/sitemap.xml', $sm );
write_file( $OUT . '/robots.txt', "User-agent: *\nAllow: /\n\nSitemap: " . SITE_URL . "/sitemap.xml\n" );
write_file( $OUT . '/_headers', "/*\n  X-Content-Type-Options: nosniff\n  Referrer-Policy: strict-origin-when-cross-origin\n  X-Frame-Options: SAMEORIGIN\n\n/assets/*\n  Cache-Control: public, max-age=31536000, immutable\n\n/style.css\n  Cache-Control: public, max-age=3600\n" );

echo "Built $count pages + 404 into $OUT\n";
echo "Warnings: " . count( $warnings ) . "\n";
foreach ( array_slice( array_unique( $warnings ), 0, 15 ) as $w ) echo "  - $w\n";
