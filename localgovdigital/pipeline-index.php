<?php
/**
 * Template Name: Pipeline Landing
 */

$args = array(
    'post_type'=> 'project',
    'orderby'    => 'date',
    'order'    => 'DESC',
    'posts_per_page' => 15,
    );              

$the_query = new WP_Query( $args );

get_header(); ?>

    <!--page specific content -->
    <a name="content-start"></a>
    <main>
        <section id="global__content">
            <div class="row">
                <div id="global__body_content" class="small-12 columns body_content">
                	<h1><?php the_title(); ?></h1>
                	<?php the_content(); ?>
                	<div>
	                    <?php if ($the_query->have_posts() ) : while ( $the_query->have_posts() ): $the_query->the_post(); 
	                    	get_template_part( 'template-parts/post/content', 'project' ); ?>
	                    <?php endwhile; endif;?>
	                    <?php wp_reset_query(); ?>
                    </div>
                </div>
                <?php //get_sidebar(); ?>
            </div><!-- Foundation .row end -->
        </section>
    </main>
    <!--end page specific content -->

<?php get_footer();
