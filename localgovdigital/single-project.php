<?php
/**
 * The template for displaying a Pipeline project
 */

get_header(); ?>

<main>
	<header>
		<div class="row">
			<div class="small-12 columns">
				<?php the_title( '<h1>', '</h1>' ); ?>
			</div>
		</div>
	</header>
	<div class="row">
		<div class="medium-8 columns">
			<?php
				the_content();
			?>
		</div>
		<div class="medium-4 columns">
			<h4>Organisations</h4>

			<h4>Owner</h4>
			<ul>
				<?php lgd_list_users( 'owner' ); ?>
			</ul>

			<h4>Members</h4>
			<ul>
				<?php lgd_list_users( 'member' ); ?>
			</ul>
			
			<?php the_tags( 'Tags: ', ', ', '<br>' ); ?> 
		</div>
	</div>
</main>

<?php get_footer();
