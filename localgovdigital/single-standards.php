<?php
/**
 * The template for displaying standards detail page
 *
 */

get_header(); ?>

<a name="content-start"></a>
    <main>
        <section id="global__content">
            <div class="row">
                <div id="standards__detail" class="small-12 medium-8 columns body_content">
                    <div class="lgdss-title">
                        Local Government Digital Service Standard
                    </div>

                <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                ?>
                    <div class="standard-point">
                        <h1><?php the_field('number');?>. <?php the_title();?></h1>
                        <div class="standard-intro">
                            <?php the_content();?>
                        </div>
                    </div>
                    <div class="standard-guidelines">
                        <h2>Notes for applying this point</h2>
                        <?php the_field('guidance_notes');?>
                    </div>
                    <div class="standard-assessment">
                        <h2>How you will be assessed</h2>
                        <?php the_field('assessment_notes');?>
                    </div>

            <?php


                    /*
					get_template_part( 'template-parts/post/content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'lgd' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'lgd' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . lgd_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'lgd' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'lgd' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . lgd_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
					) );
				*/

				endwhile; // End of the loop. */
			?>

                </div>
                <?php get_sidebar(); ?>
            </div><!-- Foundation .row end -->
        </section>
    </main>
    <!--end standard detail content -->

<?php get_footer();
