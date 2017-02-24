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
</head>
<body <?php body_class(); ?>>

<a href="#content-start" class="screen-reader-text">skip to main content</a>

<header id="header__<?php if ( is_front_page() ) { echo 'front-page'; } else {  echo 'page'; } ?>">
    <div id="global__top-links">
        <section>
            <?php wp_nav_menu( array( 'theme_location' => 'top_links' ) ); ?>
        </section>
    </div>
    <div id="global__brand-nav" class="container-fluid">
        <div class="row">
            <div class="col-sm-4 brand">
                <?php if(is_home()) : ?>
                    <h1><img src="/wp-content/uploads/2017/01/lgd_logo-1-e1485652490381.png" alt="LocalGov Digital"></h1>
                <?php else : ?>
                    <img src="/wp-content/uploads/2017/01/lgd_logo-1-e1485652490381.png" alt="LocalGov Digital">
                <?php endif; ?>
            </div>
            <div class="col-sm-8 main-nav">
                <nav class="navbar" data-topbar role="navigation">
                    <ul class="toggle-area" aria-hidden="true">
                        <li id="mobile-menu">
                            <i class="fa fa-nav"></i>
                        </li>
                    </ul>
                    <section>
                        <?php wp_nav_menu( array( 'theme_location' => 'main_nav' ) ); ?>
                    </section>
                </nav>
            </div>
        </div>
    </div>
</header>
<?php /*if (!is_home() && function_exists('bcn_display')) : ?>
<div id="global__breadcrumb" class="container">
	<ol class="breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php bcn_display_list(); ?>
	</ol>
</div>
<?php endif; */ ?>
