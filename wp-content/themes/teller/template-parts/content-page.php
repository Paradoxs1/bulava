<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package teller
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if( is_home() ) {
				echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
				echo get_the_post_thumbnail(get_the_id(), 'blog-post-image');
				echo '</a>';
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
			<div class="entry-meta">
				<?php teller_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
		} else {
			the_title( '<h1 class="entry-title">', '</h1>' );
	        if( has_post_thumbnail() ) {
	                    the_post_thumbnail();
	        }
		} ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if( is_home() ) {
			the_excerpt();
		} else {
			the_content();
		}
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'teller' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


</article><!-- #post-## -->
