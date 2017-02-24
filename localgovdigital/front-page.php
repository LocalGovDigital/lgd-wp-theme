<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
<?php if (have_posts() ) : while ( have_posts() ): the_post(); ?>
<section id="home__intro">
    <div class="container">
        <div class="col-sm-8">
            <?php the_content();?>
        </div>
        <div class="col-sm-4">
            <h2>Popular links</h2>
            <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
            </ul>
        </div>
    </div>
</section>

<section id="home__whats-new">
    <div class="container">
        <div class="col-sm-6">
            <img src="http://placehold.it/450x200">
            <h3><a href="#">Article title goes here</a></h3>
            <p>Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate</p>
            <span class="small-date">12 February 2017</span>
        </div>
        <div class="col-sm-6">
            <h2>What's new in Local Gov</h2>
            <ul>
                <li>
                    <h3><a href="#">Article list title</a></h3>
                    <span class="small-date">12 February 2017</span>
                </li>
                <li>
                    <h3><a href="#">Article list title</a></h3>
                    <span class="small-date">12 February 2017</span>
                </li>
                <li>
                    <h3><a href="#">Article list title</a></h3>
                    <span class="small-date">12 February 2017</span>
                </li>
                <li>
                    <h3><a href="#">Article list title</a></h3>
                    <span class="small-date">12 February 2017</span>
                </li>
                <li>
                    <h3><a href="#">Article list title</a></h3>
                    <span class="small-date">12 February 2017</span>
                </li>
            </ul>
        </div>
    </div>
</section>

<section id="home__service-banners">
    <div class="container">
        <div class="col-sm-4">
            <div class="service-banner">
                <div class="service-banner-image">
                    <img src="http://placehold.it/450x200">
                </div>
                <div class="service-banner-content">
                    <h2>Digital service standard</h2>
                    <ul>
                        <li><a href="#">View the standard</a></li>
                        <li><a href="#">Guidance notes</a></li>
                        <li><a href="#">Case studies</a></li>
                        <li><a href="#">Background</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="service-banner">
                <div class="service-banner-image">
                    <img src="http://placehold.it/450x200">
                </div>
                <div class="service-banner-content">
                    <h2>Regional peer groups</h2>
                    <ul>
                        <li><a href="#">Current peer groups</a></li>
                        <li><a href="#">Next events</a></li>
                        <li><a href="#">Set up a group</a></li>
                        <li><a href="#">Sponsor and event</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="service-banner">
                <div class="service-banner-image">
                    <img src="http://placehold.it/450x200">
                </div>
                <div class="service-banner-content">
                    <h2>LocalGovMakers</h2>
                    <ul>
                        <li><a href="#">View the standard</a></li>
                        <li><a href="#">Guidance notes</a></li>
                        <li><a href="#">Case studies</a></li>
                        <li><a href="#">Background</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="home__digital-voice">
    <div class="container">
        <div class="col-sm-12 digital-voice-title">
            <h2>LocalGov Digital Voice</h2>
            <p>Your thoughts, your challenges, your successes and your work</p>
        </div>
        <div class="col-sm-12 digital-voice-listings">
            <ul>
                <li>
                    <h3><a href="#">Voice article title text</a></h3>
                    <p>Author name</p>
                    <span class="small-date">12 February 2017</span>
                </li>
                <li>
                    <h3><a href="#">Voice article title text</a></h3>
                    <p>Author name</p>
                    <span class="small-date">12 February 2017</span>
                </li>
                <li>
                    <h3><a href="#">Voice article title text</a></h3>
                    <p>Author name</p>
                    <span class="small-date">12 February 2017</span>
                </li>
                <li>
                    <h3><a href="#">Voice article title text</a></h3>
                    <p>Author name</p>
                    <span class="small-date">12 February 2017</span>
                </li>
                <li>
                    <h3><a href="#">Voice article title text</a></h3>
                    <p>Author name</p>
                    <span class="small-date">12 February 2017</span>
                </li>
                <li>
                    <h3><a href="#">Voice article title text</a></h3>
                    <p>Author name</p>
                    <span class="small-date">12 February 2017</span>
                </li>
            </ul>
            <div class="digital-voice-button">
                <a href="#" class="button">view all blog posts</a>
                <a href="#" class="secondary">Submit your blog</a>
            </div>
        </div>
    </div>
</section>

<section id="home__event-banners">
    <div class="container">
        <div class="col-sm-4">
            <div class="event-banner">
                <div class="event-banner-image">
                    <img src="http://placehold.it/450x200">
                </div>
                <div class="event-banner-content">
                    <h2>LocalGovCamp</h2>
                    <p>Some intro text to go here</p>
                    <hr>
                    <p><strong>Next event: 17 January 2017</strong></p>
                    <a href="#">View timetable and notes</a>
                    <a href="#" class="button">Sign up for event</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="service-banner">
                <div class="service-banner-image">
                    <img src="http://placehold.it/450x200">
                </div>
                <div class="event-banner-content">
                    <h2>LocalGovCamp</h2>
                    <p>Some intro text to go here</p>
                    <hr>
                    <p><strong>Next event: 17 January 2017</strong></p>
                    <a href="#">View timetable and notes</a>
                    <a href="#" class="button">Sign up for event</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="service-banner">
                <div class="service-banner-image">
                    <img src="http://placehold.it/450x200">
                </div>
                <div class="event-banner-content">
                    <h2>LocalGovCamp</h2>
                    <p>Some intro text to go here</p>
                    <hr>
                    <p><strong>Next event: 17 January 2017</strong></p>
                    <a href="#">View timetable and notes</a>
                    <a href="#" class="button">Sign up for event</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; endif;?>

<?php get_footer();
