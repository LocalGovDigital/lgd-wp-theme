<?php
/**
 * Template part for displaying a Pipeline project
 */

?>
<div class="row">
	<div>
		<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		<p><?php echo wp_trim_excerpt( ); ?></p>
		<p>Latest update: </p>
	</div>
	<div class="">
		<?php get_post_custom_values('organisation'); ?>
	</div>
</div>