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

<div class="container">
	<div class="row">
		<main class="col-sm-8" role="main">
    <?php 
    the_content();
			
    $i = 1;
    if ( $the_query->have_posts() ) :
    
      while ( $the_query->have_posts() ) : 
      
        $the_query->the_post(); ?>
      <div>
        <?php the_title( sprintf( '<h3><span>%s.</span> ', $i ), '</h3>' ); ?>
        <p><?php the_excerpt(); ?></p>
        <p><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">Find out more about point <?php echo $i; ?></a></p>
      </div>
    <?php
        $i++;
      endwhile;
    else :
      get_template_part( 'template-parts/post/content', 'none' );
    endif; ?>
		</main>
		<div class="col-sm-3 offset-sm-1">
      <?php get_sidebar(); ?>
		</div>
	</div>
</div>


