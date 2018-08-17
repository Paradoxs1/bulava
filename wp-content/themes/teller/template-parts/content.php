<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package teller
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('front-page-post'); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				if( has_post_thumbnail() ) {
                    the_post_thumbnail();
                }
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				if( ( is_home() || is_search() || is_archive() ) && has_post_thumbnail() ) {
					echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
                    echo get_the_post_thumbnail(get_the_id(), 'blog-post-image');
					echo '</a>';
				}
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php teller_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if( is_home() || is_archive() || is_search() ) {
			the_excerpt();
		} else {
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'teller' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'teller' ),
				'after'  => '</div>',
			) );
		}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
        <?php if(!is_home()) { ?>
		<?php teller_entry_footer();
                             } ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
