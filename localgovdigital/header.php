<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NGCNQ4Q');</script>
<!-- End Google Tag Manager -->
<!-- Hotjar Tracking Code for https://localgov.digital/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:567056,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NGCNQ4Q"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<a href="#content-start" class="screen-reader-text">skip to main content</a>

<header id="header__<?php if ( is_front_page() ) { echo 'front-page'; } else {  echo 'page'; } ?>">
    <div id="global__brand-nav">
        <div class="top-links">
            <section>
                <?php wp_nav_menu( array( 'theme_location' => 'top_links' ) ); ?>
            </section>
        </div>
        <div class="brand">
            <a href="/"><img src="/wp-content/uploads/2017/01/lgd_logo-1-e1485652490381.png" alt="LocalGov Digital"></a>
            <ul class="toggle-area" aria-hidden="true">
                <li id="mobile-menu">
                    <i class="fa fa-nav"></i>
                </li>
            </ul>
        </div>
        <div class="main-nav">
            <nav class="navbar" data-topbar role="navigation">
                <section>
                    <?php wp_nav_menu( array( 'theme_location' => 'main_nav' ) ); ?>
                </section>
            </nav>
        </div>
    </div>
    <div id="global__brand-lines">
        <ul>
            <li class="brand-lines brand-red"></li>
            <li class="brand-lines brand-green"></li>
            <li class="brand-lines brand-blue"></div>
        </ul>

    </div>
</header>
<?php if(!is_front_page()) :?>
<div id="global__breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
    <div class="row">
        <div class="small-12 column">
            <?php if(function_exists('bcn_display')) :?>
            <ul aria-label="breadcrumb" role="navigation">
                <?php bcn_display($return = false, $linked = true, $reverse = false, $force = false); ?>
            </ul>
            <?php endif;?>
        </div>
    </div>
</div>
<?php endif;?>


<?php /*if (!is_home() && function_exists('bcn_display')) : ?>
<div id="global__breadcrumb" class="container">
	<ol class="breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php bcn_display_list(); ?>
	</ol>
</div>
<?php endif; */ ?>
