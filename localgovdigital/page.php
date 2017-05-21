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
                <div id="global__body_content" class="small-12 medium-8 columns body_content">
                    <?php if (have_posts() ) : while ( have_posts() ): the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <?php if(the_field('intro_text')) : ?>
                        <div class="formatted-intro">
                            <?php the_field('intro_text'); ?>
                        </div>
                        <?php endif;?>
                        <?php the_content(); ?>
                    <?php endwhile; endif;?>
                    <?php //comments_template(); ?>
                </div>
                <?php get_sidebar(); ?>
            </div><!-- Foundation .row end -->
        </section>
    </main>
    <!--end page specific content -->
<?php get_footer(); ?>



<?php /* Old twenty seventeen template for reference
<div class="container">
  <div class="row">
    <main class="col-sm-12" role="main">
	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/page/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>
    </main>
  </div>
</div>

<?php get_footer();*/?>
