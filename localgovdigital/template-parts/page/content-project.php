<?php
/**
 * Template part for displaying a Pipeline project
 */

?>
<div class="column">
	<div class="card">
		<div class="card-section">
			div class="meta">
				<?php echo lgd_time_link(); ?>
			</div>
			<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			<p><?php echo wp_trim_excerpt( ); ?></p>
		</div>
	</div>
</div>