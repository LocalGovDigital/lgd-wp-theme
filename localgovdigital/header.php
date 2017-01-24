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
		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>
		<?php if ( has_nav_menu( 'top' ) ) : ?>
		<div class="collapse navbar-collapse" id="navbarNav">
			<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
		</div>
		<?php endif; ?>
	</div>
</nav>
	
<div id="page" class="site">
	<?php
	// If a regular post or page, and not the front page, show the featured image.
	if ( has_post_thumbnail() && ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) ) :
		echo '<div class="single-featured-image-header">';
		the_post_thumbnail( 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
