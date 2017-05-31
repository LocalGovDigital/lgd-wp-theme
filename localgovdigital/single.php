<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header(); ?>

<!--page specific content -->
<a name="content-start"></a>
<main>
    <section id="global__content">
        <div class="row">
            <div id="global__body_content" class="small-12 medium-8 columns body_content">
                <?php if (have_posts() ) : while ( have_posts() ): the_post(); ?>
                    <h1><?php the_title(); ?>.</h1>
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

<?php /*
<div class="container">
  <div class="row">
    <main class="col-sm-8" role="main">

			<?php
				/* Start the Loop
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'lgd' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'lgd' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . lgd_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'lgd' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'lgd' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . lgd_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
					) );

				endwhile; // End of the loop.
			?>

    </main>
    <div class="col-sm-3 offset-sm-1">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
 */ ?>
