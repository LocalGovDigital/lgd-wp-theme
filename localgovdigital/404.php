<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
                <div id="global__body_content" class="small-12 medium-8 columns body_content">
                        <h1>Sorry, the page you were looking for could not be found</h1>
                        <p>Error code: 404</p>
                    <h2>Here are some useful links that might help:</h2>
                        <ul>
                            <li><a href="https://localgov.digital/">Home</a></li>
                            <li><a href="https://localgov.digital/about">About us</a></li>
                            <li><a href="https://localgov.digital/service-standard">The Local Governement Digital Service Standard</a></li>
                            <li><a href="https://localgov.digital/peer-groups">Peer groups and events</a></li>
                            <li><a href="https://localgov.digital/category/news">Latest News</a></li>
                            <li><a href="https://localgov.digital/voice">What our members are talking about</a></li>
                            <li><a href="https://localgov.digital/about/contact">Contacts</a></li>
                        </ul>
                    </ul>
                    <?php //get_search_form(); ?>
                    <?php //comments_template(); ?>
                </div>
                <?php get_sidebar(); ?>
            </div><!-- Foundation .row end -->
        </section>
    </main>

<?php get_footer();
