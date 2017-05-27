<?php
/**
 * The template for displaying a Pipeline project
 */

get_header(); ?>

<!--page specific content -->
<a name="content-start"></a>
<main>
    <section id="global__content">
        <div class="row">
            <div id="global__body_content" class="small-12 medium-8 columns body_content">
                <?php if (have_posts() ) : while ( have_posts() ): the_post(); ?>
                    <h1><?php the_title(); ?>..</h1>
                    <h2>Overview</h2>
                    <?php the_content(); ?>
                <?php endwhile; endif;?>
                <?php //comments_template(); ?>
            </div>
            <?php get_sidebar('pipeline-project-widgets'); ?>
        </div><!-- Foundation .row end -->
    </section>
</main>
<!--end page specific content -->
<?php get_footer(); 