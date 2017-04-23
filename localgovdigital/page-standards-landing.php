<?php
/**
 * Template Name: Service Standard Landing
 */

get_header(); ?>

    <!--page specific content -->
    <a name="content-start"></a>
    <main>
        <section id="global__content">
            <div class="row">
                <div id="standards__overview" class="small-12 medium-8 columns body_content">
                    <!-- page content -->
                    <?php if (have_posts() ) : while ( have_posts() ): the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                    <?php endwhile; endif; wp_reset_query(); ?>
                    <div class="standards-list">
                        <!-- custom post type 'standards' list ordered by standards number -->
                        <?php $standards_query = new WP_Query( array( 'post_type' => 'standards', 'posts_per_page' => '-1', 'meta_key' => 'number', 'orderby'	=> 'meta_value_num', 'order' => 'ASC') );?>
                        <?php if ( have_posts() ) : while ( $standards_query->have_posts() ) : $standards_query->the_post(); ?>
                            <div class="standards-item">
                                <div class="small-1 columns"><span class="standards_number"><?php echo get_field('number');?>.</span></div>
                                <div class="small-11 columns"><h2><?php the_title();?></h2><?php the_content();?><p><a href="<?php the_permalink();?>">Read more about point <?php echo get_field('number');?></a></p></div>
                            </div>
                        <?php endwhile; else : ?>

                            <p>There are no standards </p>

                        <?php endif; wp_reset_query(); ?>

                        <?php //comments_template(); ?>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div><!-- Foundation .row end -->
        </section>
    </main>
    <!--end page specific content -->

<?php get_footer();
