<?php
/**
 * Template Name: Voice Landing
 */

$args = array(
    'post_type'=> 'voice_post',
    'orderby'    => 'date',
    'order'    => 'DESC',
    'posts_per_page' => 15,
    );              

$the_query = new WP_Query( $args );

get_header(); ?>
<!--page specific content -->
<a name="content-start"></a>
<main>
    <section id="global__content">
        <div class="row">
            <div id="global__body_content" class="small-12 columns body_content">
                <div id="home__digital-voice">
                    <div class="small-12 column digital-voice-listings">
                        <h1><?php the_title();?></h1>
                        <div class="small-12 medium-9">
                        <?php if(get_field('intro_text')) : ?>
                            <div class="formatted-intro">
                                <?php the_field('intro_text'); ?>
                            </div>
                        <?php endif;?>
                        </div>
                        <?php
                        if ( $the_query->have_posts() ) :?>
                            <ul>
                            <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                                get_template_part( 'template-parts/page/content', 'voice-post' );
                            endwhile; ?>
                            </ul>
                       <?php else :
                            get_template_part( 'template-parts/post/content', 'none' );
                        endif; ?>
                    </div>
                </div>
            </div><!-- Foundation .row end -->
    </section>
</main>

<?php get_footer();
