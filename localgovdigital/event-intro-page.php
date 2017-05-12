<?php
/**
 * Template Name: Event Intro Page
 */

get_header(); ?>

    <!--page specific content -->
    <a name="content-start"></a>
    <main>
        <section id="event__header-image">
            <div class="row">
                <div class="small-12 columns">
                    <?php
                    // creates featured image src for event image sizes to add to responsive img tag
                    if ( has_post_thumbnail() ) {
                        $thumb_id = get_post_thumbnail_id();
                        $large_event_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'event-header', true);
                        $large_event_thumb_url = $large_event_thumb_url_array[0];
                        $small_event_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'small-event-header', true);
                        $small_event_thumb_url = $small_event_thumb_url_array[0];
                        //$large_event_image = the_post_thumbnail('event-header');
                        //$medium_event_image = the_post_thumbnail('event-header');
                    }
                    ?>
                    <img src="<?php echo $small_event_thumb_url;?>" srcset="<?php echo $small_event_thumb_url;?> 768w, <?php echo $large_event_thumb_url;?> 1024w" />
                </div>
            </div>
        </section>
        <section id="global__content">
            <div class="row">
                <div id="global__body_content" class="small-12 medium-8 columns body_content">
                    <?php if (have_posts() ) : while ( have_posts() ): the_post(); ?>

                        <h1><?php the_title(); ?></h1>
                        <div class="formatted-intro">
                            <?php the_field('intro_text'); ?>
                        </div>
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
