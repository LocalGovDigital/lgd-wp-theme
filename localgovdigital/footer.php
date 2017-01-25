<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<footer role="contentinfo" class="bg-faded">
	<div class="container">
		<?php
		get_template_part( 'template-parts/footer/footer', 'widgets' );

		if ( has_nav_menu( 'social' ) ) : ?>
			<nav role="navigation" aria-label="<?php _e( 'Footer Social Links Menu', 'lgd' ); ?>">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'social',
						'menu_class'     => 'list-inline',
						'depth'          => 1,
						'link_before'    => '<span class="sr-only sr-only-focusable">',
						'link_after'     => '</span>' . lgd_get_svg( array( 'icon' => 'chain' ) ),
					) );
				?>
			</nav>
		<?php endif;

		get_template_part( 'template-parts/footer/site', 'info' );
		?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
