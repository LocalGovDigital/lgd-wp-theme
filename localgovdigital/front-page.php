<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
<a name="content-start"></a>
<main>
    <?php if (have_posts() ) : while ( have_posts() ): the_post(); ?>
    <section id="home__intro">
        <div class="row">
            <div class="small-12 medium-8 column home-intro">
                <h1><?php the_title();?></h1>
                <?php the_content();?>
            </div>
            <div class="small-12 medium-4 column popular-links">
                <h2>Popular links</h2>
                <?php the_field('popular_links'); ?>
            </div>
        </div>
    </section>
    <?php endwhile; endif;?>
    <section id="home__whats-new">
        <div class="row">
            <div class="small-12 medium-7 column feature-news">
                <div class="mobile-only"><h2>What's new in LocalGov</h2></div>
                <?php
                // query the first 6 posts within 'news' category
                $the_query = new WP_Query( array( 'category_name' => 'news', 'posts_per_page' => '6' ) );
                // loop through all posts
                $i = 1;
                $news_list = '';
                if ( $the_query->have_posts() ) : while ($the_query->have_posts()) : $the_query->the_post();
                    // if the first item, display as feature
                    if ($i == '1') : ?>
                        <?php if(the_post_thumbnail()): ?>
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                            <?php else :?>
                            <a href="<?php the_permalink();?>"><img src="/wp-content/uploads/2018/01/Latest-news-banner3.png"></a>
                        <?php endif;?>
                        <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                        <p><?php $excerpt = get_the_excerpt();
                                echo $excerpt;
                        ?></p>
                        <p><strong><span class="small-date"><?php the_date();?></span></strong></p>

                    <?php else :
                    // else create $news_list variable with all other posts in the loop
                    $news_list = $news_list.'
                        <li>
                            <h3><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3>
                            <span class="small-date">'.get_the_date().'</span>
                        </li>
                    ';
                    endif;
                    $i++;
                endwhile; endif;
                wp_reset_postdata();
                ?>
                <div class="mobile-only"><a href="#" class="button secondary open-news">More news</a></div>
            </div>
                <div class="small-12 medium-5 column news-list">
                    <div class="desktop-only"><h2>What's new in LocalGov</h2></div>
                    <ul class="news-list-items">
                        <?php
                        // display all other posts
                        echo $news_list;
                        ?>
                    </ul>
                </div>
        </div>
    </section>

    <section id="home__product-banners">
        <div class="row lgd-feature-banner">
            <div class="small-12 medium-4 column">
                <div class="feature-banner">
                    <?php
                    $img = get_field('banner_1_image');
                    ?>
                    <div class="feature-banner-image">
                        <?php
                        $img = get_field('banner_1_image');
                        ?>
                        <img srcset="<?php echo $img['sizes']['medium']; ?> 300w,
                                <?php echo $img['sizes']['medium_large']; ?> 768w,
                                <?php echo $img['sizes']['large']; ?> 1024w"
                                src="<?php echo $img['sizes']['medium_large']; ?>"
                                alt="<?php the_field('banner_1_title');?>">

                     </div>
                    <div class="feature-banner-content banner_1">
                        <h2><?php the_field('banner_1_title');?></h2>
                        <?php the_field('banner_1_intro_text');?>
                    </div>
                </div>
            </div>
            <div class="small-12 medium-4 column">
                <div class="feature-banner">
                    <div class="feature-banner-image">
                        <?php
                        $img = get_field('banner_2_image');
                        ?>
                        <img srcset="<?php echo $img['sizes']['medium']; ?> 300w,
                                <?php echo $img['sizes']['medium_large']; ?> 768w,
                                <?php echo $img['sizes']['large']; ?> 1024w"
                             src="<?php echo $img['sizes']['medium']; ?>"
                             alt="<?php the_field('banner_2_title');?>">

                    </div>
                    <div class="feature-banner-content banner_2">
                        <h2><?php the_field('banner_2_title');?></h2>
                        <?php the_field('banner_2_intro_text');?>
                    </div>
                </div>
            </div>
            <div class="small-12 medium-4 column">
                <div class="feature-banner">
                    <div class="feature-banner-image">
                        <?php
                        $img = get_field('banner_3_image');
                        ?>
                        <img srcset="<?php echo $img['sizes']['medium']; ?> 300w,
                                <?php echo $img['sizes']['medium_large']; ?> 768w,
                                <?php echo $img['sizes']['large']; ?> 1024w"
                             src="<?php echo $img['sizes']['medium']; ?>"
                             alt="<?php the_field('banner_3_title');?>">

                    </div>
                    <div class="feature-banner-content banner_3">
                        <h2><?php the_field('banner_3_title');?></h2>
                        <?php the_field('banner_3_intro_text');?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="global__digital-listings">
        <div class="row">
            <div class="small-12 column digital-voice-title">
                <h2>LocalGov Digital Voice</h2>
                <p>Your thoughts, your challenges, your successes and your work</p>
            </div>
            <div class="small-12 column digital-listings">
                <?php
                // query the first 6 voice articles
                $the_query = new WP_Query( array( 'post_type' => 'voice_post', 'posts_per_page' => '6' ) );

                // loop through all posts
                if ( $the_query->have_posts() ) : ?>
                    <ul>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink();?>">
                                <h3><?php the_title();?></h3>
                                <strong><?php echo get_post_meta($post->ID, 'syndication_source', true);?></strong><br/>
                                <span class="small-date"><?php the_date();?></span>
                            </a>
                        </li>
                    <?php
                    endwhile; ?>
                    </ul>
                <?php endif;
                wp_reset_postdata();
                ?>
                <div class="digital-voice-button">
                    <a href="<?php echo site_url();?>/voice" class="button">View all blog posts</a>
                    <a href="<?php echo site_url();?>/voice/submit-your-blog" class="button secondary">Submit your blog</a>
                </div>
            </div>
        </div>
    </section>

    <section id="home__event-banners">
        <div class="row lgd-feature-banner">
            <div class="small-12 medium-4 column">
                <div class="feature-banner">
                    <div class="feature-banner-image">
                        <?php
                        $img = get_field('gdu_banner_1_image');
                        ?>
                        <img srcset="<?php echo $img['sizes']['medium']; ?> 300w,
                                <?php echo $img['sizes']['medium_large']; ?> 768w,
                                <?php echo $img['sizes']['large']; ?> 1024w"
                             src="<?php echo $img['sizes']['medium']; ?>"
                             alt="<?php the_field('gdu_banner_1_title');?>">
                    </div>
                    <div class="feature-banner-content banner_1">
                        <h2><?php the_field('gdu_banner_1_title');?></h2>
                        <?php the_field('gdu_banner_1_intro_text');?>
                        <hr>
                        <?php the_field('gdu_banner_1_event');?>
                    </div>
                </div>
            </div>
            <div class="small-12 medium-4 column">
                <div class="feature-banner">
                    <div class="feature-banner-image">
                        <?php
                        $img = get_field('gdu_banner_2_image');
                        ?>
                        <img srcset="<?php echo $img['sizes']['medium']; ?> 300w,
                                <?php echo $img['sizes']['medium_large']; ?> 768w,
                                <?php echo $img['sizes']['large']; ?> 1024w"
                             src="<?php echo $img['sizes']['medium']; ?>"
                             alt="<?php the_field('gdu_banner_2_title');?>">
                    </div>
                    <div class="feature-banner-content banner_2">
                        <h2><?php the_field('gdu_banner_2_title');?></h2>
                        <?php the_field('gdu_banner_2_intro_text');?>
                        <hr>
                        <?php the_field('gdu_banner_2_event');?>
                    </div>
                </div>
            </div>
            <div class="small-12 medium-4 column">
                <div class="feature-banner">
                    <div class="feature-banner-image">
                        <?php
                        $img = get_field('gdu_banner_3_image');
                        ?>
                        <img srcset="<?php echo $img['sizes']['medium']; ?> 300w,
                                <?php echo $img['sizes']['medium_large']; ?> 768w,
                                <?php echo $img['sizes']['large']; ?> 1024w"
                             src="<?php echo $img['sizes']['medium']; ?>"
                             alt="<?php the_field('gdu_banner_3_title');?>">
                    </div>
                    <div class="feature-banner-content banner_3">
                        <h2><?php the_field('gdu_banner_3_title');?></h2>
                        <?php the_field('gdu_banner_3_intro_text');?>
                        <hr>
                        <?php the_field('gdu_banner_3_event');?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
</main>
<?php get_footer();
