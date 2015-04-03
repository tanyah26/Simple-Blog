<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine
 * doesn't know which template to use (e.g. 404 error)
 */

	get_header(); // This fxn gets the header.php file and renders it
?>
<div>
	<?php if ( have_posts() ) :
	// Do we have any posts in the databse that match our query?
	// In the case of the home page, this will call for the most recent posts
	?>
	<div class="fs-row">
		<?php 
			// $i = 0; //Saying that if it's the first article (0), then we will do...

			while ( have_posts() ) : the_post();
			// If we have some posts to show, start a loop that will display each one the same way
		?>
			<article class="fs-cell fs-xs-full fs-sm-half fs-md-2 fs-lg-4 fs-xl-4 listing_article">  <!-- used to be code here that said if we're on the home page and it's the first article, then will reference the class "listing_article_first" -->
				
				<div>
					<?php
                        // draw the thumbnail if there is one
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'featured_thumb' );
                        }
                    ?>
					<h1 class="listing_article_title <?php if (is_home() && $i === 0) echo 'listing_article_title_first' ?>">
						<a href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>">
							<?php the_title(); // Show the title of the posts as a link ?>
						</a>
					</h1>
				</div>

				<!--  <div class="fs-cell fs-lg-4">
					<?php the_time('m/d/Y'); // Display the time published ?> |
					<?php /* if( comments_open() ) : // If we have comments open on this post, display a link and count of them ?>
						<span>
							<?php comments_popup_link( __( 'Comment', 'break' ), __( '1 Comment', 'break' ), __( '% Comments', 'break' ) );
							// Display the comment count with the applicable pluralization
							?>
						</span>
					<?php endif; */ ?>
					<div>
						<?php echo get_the_category_list(); // Display the categories this post belongs to, as links ?>
					</div>
					<div>
						<?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?>
					</div>
				</div> -->

				<!--  <div class="fs-cell fs-lg-8">
					
					<?php the_content( 'Continue...' );
					// This call the main content of the post, the stuff in the main text box while composing.
					// This will wrap everything in p tags and show a link as 'Continue...' where/if the
					// author inserted a <!-- more --> link in the post body
					?>

					<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
				</div> --> 
					
			</article>
		<?php 

			// $i++; //closing the $i = 0;  tag

			endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>
	</div>

	<nav>
		<?php previous_posts_link( 'newer' ); // Display a link to  newer posts, if there are any, with the text 'newer' ?>
		<?php next_posts_link( 'older' ); // Display a link to  older posts, if there are any, with the text 'older' ?>
	</nav>
	<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
		<article>
			<h1>Nothing has been posted like that yet</h1>
		</article>
	<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
</div>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>

