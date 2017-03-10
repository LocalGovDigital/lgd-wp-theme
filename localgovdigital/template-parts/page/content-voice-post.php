<?php
/**
 * Template part for displaying LGD Voice post content
 */

?>
<div class="column">
	<div class="card">
		<div class="card-section">
			<div class="meta">
				<?php echo lgd_time_link(); ?> - 
				<a href="<?php echo get_post_custom_values( 'syndication_source_uri')[0]; ?>"><?php echo get_post_custom_values( 'syndication_source' )[0]; ?></a>
			</div>
			<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			<p><?php echo wp_trim_excerpt( ); ?></p>
		</div>
	</div>
</div>