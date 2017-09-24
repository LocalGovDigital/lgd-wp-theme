<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 */

get_header(); ?>

    <!--page specific content -->
    <a name="content-start"></a>
    <main>
        <section id="global__content">
            <div class="row">
                <div id="global__digital-listings" class="small-12 medium-8 columns body_content">
                        <h1><?php the_title(); ?></h1>
<?php echo get_the_archive_description(); ?>
<ul class="digital-listings-items news">
                    <?php if (have_posts() ) : while ( have_posts() ): the_post(); ?>
                        <li>
                                            <a href="<?php the_permalink(); ?>">
                                                <h2><?php the_title(); ?></h2>
                                                <p><?php the_excerpt(); ?></p>
                                                <span class="small-date"><strong><?php the_date(); ?></strong></span>
                                            </a>
                                        </li>
                    <?php endwhile; endif;?>
</ul>
                    <?php //comments_template(); ?>
                </div>
                <?php get_sidebar(); ?>
            </div><!-- Foundation .row end -->
        </section>
    </main>
    <!--end page specific content -->
<?php get_footer(); ?>