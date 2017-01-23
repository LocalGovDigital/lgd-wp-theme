<?php
/**
 * Template Name: Standard Landing
 */

$args = array(
    'meta_key' => 'landing_page_body',
    'meta_value' => '1',
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
    );  

$the_query = new WP_Query( $args );

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main" style="width: 80%; margin: 0 auto;">
		<?php 
    $i = 1;
		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div>
          <?php echo $i; the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
					<p><?php the_excerpt(); ?></p>
					<p><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">Find out more about point <?php echo $i; ?></a></p>
        </div>
     <?php
        $i++;
			endwhile;
		else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
			get_template_part( 'template-parts/post/content', 'none' );
		endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
