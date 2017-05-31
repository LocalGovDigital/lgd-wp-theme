<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">

	<?php if ( have_posts() ) : ?>
		<header class="page-header">gdsgfdfewrwer
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php
		if ( is_sticky() && is_home() ) :
            echo lgd_get_svg( array( 'icon' => 'thumb-tack' ) );
        endif;
	?>
                <header class="entry-header">
                    <?php
                    if ( 'post' === get_post_type() ) :
                        echo '<div class="entry-meta">';
                        if ( is_single() ) :
                            lgd_posted_on();
                        else :
                            echo lgd_time_link();
                            // hidden for now - lgd_edit_link();
                        endif;
                        echo '</div><!-- .entry-meta -->';
                    endif;

                    if ( is_single() ) {
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    } else {
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    }
                    ?>
                </header><!-- .entry-header -->

                <?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'lgd-featured-image' ); ?>
                        </a>
                    </div><!-- .post-thumbnail -->
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    /* translators: %s: Name of current post */
                    the_content( sprintf(
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lgd' ),
                        get_the_title()
                    ) );

                    wp_link_pages( array(
                        'before'      => '<div class="page-links">' . __( 'Pages:', 'lgd' ),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ) );
                    ?>
                </div><!-- .entry-content -->

                <?php if ( is_single() ) : ?>
                    <?php lgd_entry_footer(); ?>
                <?php endif; ?>

                </article><!-- #post-## -->


                         <?php endwhile;

			the_posts_pagination( array(
				'prev_text' => lgd_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'lgd' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'lgd' ) . '</span>' . lgd_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lgd' ) . ' </span>',
			) );

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
