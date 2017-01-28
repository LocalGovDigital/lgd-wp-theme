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
<div class="container">
	<div class="row">
        <div class="col-sm-4">
		    <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
        </div>
        <div class="col-sm-8">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php /* Primary navigation formatting */
                    wp_nav_menu( array(
                    'menu' => 'main_nav',
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                    );?>
                    <?php //wp_nav_menu( array( 'theme_location' => 'main_nav' ) ); ?>
                </div>
            </nav>
        </div>
    </div>
</div>
</header>
<?php if (!is_home() && function_exists('bcn_display')) : ?>
<div class="container">
	<ol class="breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php bcn_display_list(); ?>
	</ol>
</div>
<?php endif; ?>
