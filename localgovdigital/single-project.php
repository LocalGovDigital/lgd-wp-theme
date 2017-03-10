<?php
/**
 * The template for displaying a Pipeline project
 */

get_header(); ?>

<div class="container">
  <div class="row">
    <main class="col-sm-8" role="main">

			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'lgd' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'lgd' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">&lt;</span>%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'lgd' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'lgd' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">&gt;</span></span>',
					) );

				endwhile; // End of the loop.
			?>

    </main>
    <div class="col-sm-3 offset-sm-1">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_footer();
