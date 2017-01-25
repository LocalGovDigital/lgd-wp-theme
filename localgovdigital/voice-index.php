<?php
/**
 * Template Name: Voice posts
 */

$args = array(
    'post_type'=> 'voice_post',
    'orderby'    => 'date',
    'order'    => 'DESC',
    'post_limits' => 20
    );              

$the_query = new WP_Query( $args );

get_header(); ?>

<div class="album text-muted">
  	<div class="container">
   		<div class="row">
			<?php // Show the selected frontpage content.
			if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) : $the_query->the_post();
					get_template_part( 'template-parts/page/content', 'voice-post' );
				endwhile;
			else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
				get_template_part( 'template-parts/post/content', 'none' );
			endif; ?>
	
			<?php
			// Get each of our panels and show the post data.
			if ( 0 !== lgd_panel_count() || is_customize_preview() ) : // If we have pages to show.
	
				/**
				 * Filter number of front page sections in Twenty Seventeen.
				 *
				 * @since Twenty Seventeen 1.0
				 *
				 * @param $num_sections integer
				 */
				$num_sections = apply_filters( 'twentyseventeen_front_page_sections', 4 );
				global $twentyseventeencounter;
	
				// Create a setting and control for each of the sections available in the theme.
				for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
					$twentyseventeencounter = $i;
					lgd_front_page_section( null, $i );
				}
	
			endif; // The if ( 0 !== lgd_panel_count() ) ends here. ?>
		</div>
	</div>
</div>

<?php get_footer();
