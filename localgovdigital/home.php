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

    <a name="content-start"></a>
    <main>
        <section id="global__content">
            <div class="row">
                <div id="news__list-page" class="small-12 columns body_content">
                    <div id="global__digital-listings">
                        <div class="small-12 column digital-listings">
                            <h1>Latest news updates</h1>
                            <?php
                            // loop through all posts
                            $i = 1;
                            $news_list = '';
                            if ( have_posts() ) : while (have_posts()) : the_post();
                                // if the first item, display as feature
                                if ($i == '1') : ?>
                                    <article class="first-item">
                                        <div class="first-item-left">
                                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                                        </div>
                                        <div class="first-item-right">
                                            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                            <div class="formatted-intro">
                                                <?php the_excerpt();?>
                                            </div>
                                            <span class="small-date"><strong><?php the_date();?></strong></span>
                                        </div>
                                    </article>
                                    <hr>
                                <?php else :
                                    // else create $news_list variable with all other posts in the loop
                                    $news_list = $news_list.'
                                        <li>
                                            <a href="'.get_the_permalink().'">
                                                <h2>'.get_the_title().'</h2>
                                                <p>'.get_the_excerpt().'</p>
                                                <span class="small-date"><strong>'.get_the_date().'</strong></span>
                                            </a>
                                        </li>';
                                endif;
                                $i++;
                            endwhile; endif;
                            ?>
                            <ul class="digital-listings-items news">
                                <?php
                                // display all other posts
                                echo $news_list;
                                ?>
                            </ul>
                        </div>
                </div><!-- Foundation .row end -->
            </div>
        </section>
    </main>

<?php get_footer();