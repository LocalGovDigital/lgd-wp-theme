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
                    endwhile; // End of the loop. */ ?>

                    <div id="global__digital-listings">
                        <div class="small-12 column digital-listings">
                           <?php
                           $this_page_taxs = get_the_terms($post->ID, 'peer_group');
                           //print_r($this_page_tax);
                           $this_tax = array();
                           foreach( $this_page_taxs as $this_page_tax ) {
                               $this_tax[] = $this_page_tax->slug; // this grabs the hyphenated slug
                           }
                           //print_r($this_tax);
                           $args = array(
                                'post_type' => 'post',
                                'category_name' => 'news, localgov-digital-voice, peer-group-update',
                                'tax_query' => array(
                                array(
                                    'taxonomy' => 'peer_group',
                                    'field'    => 'slug',
                                    'terms'    => $this_tax
                                    ),
                                ),
                           );

                            $peer_group_news = new WP_Query( $args );
                            //print_r($peer_group_news);
                            $peer_latest_listings = '';
                            if($peer_group_news != '') :?>

                                <?php while ( $peer_group_news->have_posts() ) : $peer_group_news->the_post(); ?>

                                    <?php
                                    $peer_latest_listings .= '<li><a href="'.get_the_permalink().'">
                                    <h2>'.get_the_title().'</h2>
                                    <p>'.get_the_excerpt().'</p>
                                    <span class="small-date"><strong>'.get_the_date().'</strong></span>
                                    </a>
                                    </li>';
                                    ?>

                                <?php endwhile; ?>

                                <?php endif;
                                wp_reset_query(); ?>
                                <?php if($peer_latest_listings != ''){?>
                                    <hr class="thick_rule">
                                    <h2>The latest from the <?php the_title();?> peer group</h2>
                                    <ul class="digital-listings-items news">
                                    <?php echo $peer_latest_listings;?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div><!-- Foundation .row end -->
        </section>
    </main>
    <!--end standard detail content -->

<?php get_footer();
