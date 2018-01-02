<?php
/**
 * Template Name: Voice Landing
 */

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
$args = array(
    'post_type'=> 'voice_post',
    'orderby'    => 'date',
    'order'    => 'DESC',
    'posts_per_page' => 30,
    'nopaging'  => false,
    'paged'     => $paged,
    );

$the_query = new WP_Query( $args );

get_header(); ?>
<!--page specific content -->
<a name="content-start"></a>
<main>
    <section id="global__content">
        <div class="row">
            <div id="global__body_content" class="small-12 columns body_content">
                <div id="global__digital-listings">
                    <div class="small-12 column digital-listings">
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
                            <?php
                            $authors_array = array();
                            while ( $the_query->have_posts() ) : $the_query->the_post();
                                $this_feed_id = get_post_custom_values( 'syndication_feed_id' )[0];
                                $authors_array[] = $this_feed_id;
                                //print_r($authors_array);
                                $number_of_matching_ids = array_keys($authors_array, $this_feed_id);
                                $number_of_posts = count($number_of_matching_ids);
                                if($number_of_posts <= 3) {
                                    get_template_part( 'template-parts/page/content', 'voice-post' );
                                }
                            endwhile; ?>
                            </ul>
                            <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
                            <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
                       <?php else :
                            get_template_part( 'template-parts/post/content', 'none' );
                        endif; ?>
                    </div>
                </div>
            </div><!-- Foundation .row end -->
    </section>
</main>

<?php get_footer();
