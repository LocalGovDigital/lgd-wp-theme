<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="card">
	<div class="meta">
		<?php echo lgd_time_link(); ?> - 
		<a href="<?php echo get_post_custom_values( 'syndication_source_uri')[0]; ?>"><?php echo get_post_custom_values( 'syndication_source' )[0]; ?></a>
	</div>
	<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	<p class="card-text"><?php echo wp_trim_excerpt( ); ?></p>
</div>
