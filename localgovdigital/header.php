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
<a class="sr-only sr-only-focusable" href="#content"><?php _e( 'Skip to content', 'localgovdigital' ); ?></a>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
	<div class="container d-flex justify-content-between">
		<?php if ( has_nav_menu( 'top' ) ) : ?>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<?php endif; ?>
		<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
		<?php if ( has_nav_menu( 'top' ) ) : ?>
		<div class="collapse navbar-collapse" id="navbarNav">
			<?php wp_nav_menu( array(
				'theme_location' => 'top',
				'menu_id'        => 'top-menu',
				'menu_class'	 => 'navbar-nav',
			) ); ?>
		</div>
		<?php endif; ?>
	</div>
</nav>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
