<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Artpop
 * @since Artpop 1.0
 */

if ( ! function_exists( 'artpop_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current author, published date, categories and comments.
 */
function artpop_posted_on() {
	artpop_author();
	artpop_time_link();
	artpop_category_link();
	artpop_comments_link();
}
endif;

if ( ! function_exists( 'artpop_author' ) ) :
/**
 * Prints HTML with meta information for the current author.
 */
function artpop_author() {
	$author_id = get_the_author_meta( 'ID' );
	$author_avatar = get_avatar( $author_id, 40 );
	$byline = sprintf(
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( $author_id ) ) . '">' . $author_avatar . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="byline">' . $byline . '</span>';
}
endif;

if ( ! function_exists( 'artpop_time_link' ) ) :
/**
 * Prints HTML with meta information for the published date.
 */
function artpop_time_link() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);

	// Wrap the time string in a link, and preface it with 'Posted on'.
	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s</span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		_x( 'Posted on', 'Used before publish date.', 'artpop' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

if ( ! function_exists( 'artpop_category_link' ) ) :
/**
 * Prints HTML with meta information for categories.
 */
function artpop_category_link() {
	if ( 'post' === get_post_type() ) {
		// Get Categories for posts.
		$categories_list = get_the_category_list( esc_html__( ', ', 'artpop' ) );
		echo '<span class="cat-links">';
		echo '<em class="sep">' . __( 'in', 'artpop' ) . '</em>';
		echo $categories_list;
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'artpop_comments_link' ) ) :
/**
 * Prints HTML with meta information for comments.
 */
function artpop_comments_link() {
	if ( is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link(
			__( 'Leave a comment', 'artpop' ),
			__( '1 Comment', 'artpop' ),
			__( '% Comments', 'artpop' )
		);
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'artpop_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function artpop_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		// Get Tags for posts.
		$tags_list = get_the_tag_list( '', ( ' ' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">%1$s</span>',
			$tags_list
			);
		}
	}
	// Show edit link for logged in user
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'artpop' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Filters the archive title.
 */
function artpop_get_the_archive_title( $title ) {
	$regex = apply_filters(
		'artpop_get_the_archive_title_regex',
		array(
			'pattern'     => '/(\A[^\:]+\:)/',
			'replacement' => '<span>$1</span>',
		)
	);
	if ( empty( $regex ) ) {
		return $title;
	}
	return preg_replace( $regex['pattern'], $regex['replacement'], $title );
}
add_filter( 'get_the_archive_title', 'artpop_get_the_archive_title' );

/**
 * Get unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @staticvar int $id_counter
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function artpop_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}
