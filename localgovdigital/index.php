<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
  *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div class="blog-header">
  <div class="container">
    <header class="page-header">
      <?php if ( is_home() && ! is_front_page() ) : ?>
      <h1 class="page-title"><?php single_post_title(); ?></h1>
      <?php else : ?>
      <h2 class="page-title"><?php _e( 'Posts', 'lgd' ); ?></h2>
      <?php endif; ?>
    </header>
  </div>
</div>

<div class="container">
  <div class="row">
    <main class="col-sm-8" role="main">
    <?php
		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
				get_template_part( 'template-parts/post/content', get_post_format() );

			endwhile;

			the_posts_pagination( array(
				'prev_text' => lgd_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'lgd' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'lgd' ) . '</span>' . lgd_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lgd' ) . ' </span>',
			) );

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif;
		?>
    </main>
    <div class="col-sm-3 offset-sm-1">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_footer();
