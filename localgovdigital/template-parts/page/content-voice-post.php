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

<article id="post-<?php the_ID(); ?>" style="width:33.33333%; padding: 0 15px; float: left; min-height: 350px;">
	<div class="meta">
<?php echo lgd_time_link(); ?> - 
<a href="<?php echo get_post_custom_values( 'syndication_source_uri')[0]; ?>"><?php echo get_post_custom_values( 'syndication_source' )[0]; ?></a>
	</div>
	<header>
		<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	</header>
	<div>
		<?php echo wp_trim_excerpt( ); ?> 
	</div>
</article>