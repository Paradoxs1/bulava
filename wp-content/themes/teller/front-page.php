<?php
/**
 * The template for displaying front page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package teller
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
		<?php if ( $wp_query->max_num_pages > 1 && is_home() ) : ?>
			<nav class="load_more">
			  <?php next_posts_link( 'Load More Posts ' ); ?>
			</nav>
	  	<?php endif; ?>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
