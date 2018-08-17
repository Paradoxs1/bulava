<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package teller
 */

if ( ! function_exists( 'teller_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function teller_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html( '%s', 'post date', 'teller' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'teller' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
    $cats='' ;
    foreach((get_the_category()) as $category) {
        $cats=$cats.$category->cat_name . ' &bull; ';
    }
    $cats = substr($cats,0,-8);


	echo '<span class="posted-on">' . $posted_on . '</span> / <span class="category"> '. $cats .'</span> / <span class="byline"> ' . $byline . '</span> / '; // WPCS: XSS OK.
    echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Оставити коментарій', 'teller' ), esc_html__( '1 Коментарій', 'teller' ), esc_html__( '% Коментарії', 'teller' ) );
		echo '</span>';
}
endif;

if ( ! function_exists( 'teller_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function teller_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'teller' ) );
		if ( $categories_list && teller_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'teller' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'teller' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'teller' ) . '</span> ', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"> ';
		comments_popup_link( esc_html__( ' Leave a comment', 'teller' ), esc_html__( ' 1 Comment', 'teller' ), esc_html__( '% Comments', 'teller' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'teller' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function teller_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'teller_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'teller_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so teller_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so teller_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in teller_categorized_blog.
 */
function teller_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'teller_categories' );
}
add_action( 'edit_category', 'teller_category_transient_flusher' );
add_action( 'save_post',     'teller_category_transient_flusher' );

/**
* Read more text
*/
 add_filter( 'excerpt_more', 'teller_excerpt_more' );
function teller_excerpt_more( $more ) {
    return sprintf( ' <a class="read-more" href="%1$s">Читати далі</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'teller' )
    );
}

/**
* excerpt length
*/
add_filter( 'excerpt_length', 'teller_custom_excerpt_length', 999 );
function teller_custom_excerpt_length( $length ) {
    return  40;
}

/**
* customize archive title
*/
add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_category() ) {

        $title = single_cat_title( '', false );

    }

    return $title;

});
