<?php
/**
 * The template for displaying peer group detail page
 *
 */

get_header(); ?>

<a name="content-start"></a>
    <main>
        <section id="global__content">
            <div class="row">
                <div id="peer-group__detail" class="small-12 medium-8 columns body_content">

                <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                ?>

                <h1><?php the_title();?> peer group</h1>
                <?php if(get_field('intro_text')) : ?>
                    <div class="formatted-intro">
                        <?php the_field('intro_text'); ?>
                    </div>
                <?php endif;?>
                <?php the_content();?>

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
