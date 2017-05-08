<?php
/**
 * Template part for displaying a Pipeline project
 */

?>
<div class="row">
	<div class="small-6 large-2 columns">
		<img src="https://placehold.it/140x100">
	</div>
	<div class="small-6 large-6 columns">
		<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		<p><?php echo wp_trim_excerpt( ); ?></p>
		<p>Latest update: </p>
	</div>
	<div class="small-6 large-1 columns">
	</div>
	<div class="small-6 large-3 columns">
		<?php $terms = get_the_terms( $post->ID , 'organisation' ); 
		if ($terms) : ?>
		<ul>
			<?php foreach ( $terms as $term ) {
				echo '<li>' . $term->name . '</li>';
			} ?>
		</ul>
		<?php endif; ?>
	</div>
</div>