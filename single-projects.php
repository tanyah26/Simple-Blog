<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); // This fxn gets the header.php file and renders it
?>

<div role="main">
	<?php if ( have_posts() ) :
	// Do we have any posts in the databse that match our query?
	?>
		<?php while ( have_posts() ) : the_post();
		// If we have a post to show, start a loop that will display it
		?>
			<article class="fs-row">
				<h1><?php the_title(); // Display the title of the post ?></h1>
				<div>
					<?php the_time('m.d.Y'); // Display the time it was published ?>
					<?php // the author(); Uncomment this and it will display the post author ?>
				</div>
				<div class="fs-cell fs-md-8 fs-lg-8">
					<?php
	                    // draw the thumbnail if there is one
                        if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'featured_image' );
	                    }
	                ?>
	            </div>
	            <div class="fs-cell fs-md-2 fs-lg-4">
					<?php the_content();
					// This call the main content of the post, the stuff in the main text box while composing.
					// This will wrap everything in p tags
					?>

						<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
				</div>

				</div>
				<div>
					<div><?php echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div>
					<div><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?></div>
				</div>
			</article>
		<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>
		<?php
			// If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
			if ( comments_open() || '0' != get_comments_number() )
				comments_template( '', true );
		?>
	<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
		<article>
			<h1>Nothing has been posted like that yet</h1>
		</article>
	<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>
</div>
<?php get_sidebar(); // This fxn gets the sidebar.php file and renders it ?>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
