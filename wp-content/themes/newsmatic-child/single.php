<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Newsmatic
 */

get_header();

global $post;



if (!has_category('Book')):
?>
<div id="theme-content">
	<?php
		/**
		 * hook - newsmatic_before_main_content
		 * 
		 */
		do_action( 'newsmatic_before_main_content' );
	?>
	<main id="primary" class="site-main">
		<div class="newsmatic-container">
			<div class="row">
				<div class="secondary-left-sidebar">
					<?php
						get_sidebar('left');
					?>
				</div>
				<div class="primary-content">
					<?php
						/**
						 * hook - newsmatic_before_inner_content
						 * 
						 */
						do_action( 'newsmatic_before_inner_content' );
					?>
					<div class="post-inner-wrapper">
						<?php
							while ( have_posts() ) : the_post();
								// get template parts
								get_template_part( 'template-parts/content', 'single' );
							endwhile; // End of the loop.
						?>
					</div>
					<?php
						
						 if($post->post_type == 'match'):
							
						 ?>
						<div class="match-information">
							<div class="datetime">
								<?php
									echo get_post_meta($post->ID,'date',true);
								 ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="secondary-sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #theme-content -->
<?php

else:
	?>

<div class="newbooklayout" style="background: url('<?php echo get_the_post_thumbnail_url($post,'full'); ?>')">
	<div class="content-wrapper">
	 <div class="content">
	 	<h1><? echo $post->post_title; ?></h1>
		<p><?php echo $post->post_content; ?></p>
	 </div>
	</div>
</div>



<?php
	
endif;

get_footer();