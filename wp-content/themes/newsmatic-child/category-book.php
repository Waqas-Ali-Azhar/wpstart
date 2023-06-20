<?php

	get_header();


	?>

	<div class="container">
		<section id="slider" >

			<?php echo do_shortcode('[smartslider3 slider="2"]'); ?>
			
		</section>

		<div class="books">
			<div class="left">
				<div class="filter">
					<ul>
						<li>one</li>
						<li>two</li>
						<li>three</li>
						<li>four</li>
						<li>five</li>
					</ul>

					<form>
						<div class="field-group">
							<label>Gayle</label>
							<input type="checkbox" name="">
						</div>
						<div class="field-group">
							<label>Arthur</label>
							<input type="checkbox" name="">
						</div>
						<div class="field-group">
							<label>Shawn</label>
							<input type="checkbox" name="">
						</div>
					</form>
				</div>
			</div>

			<div class="right">
				<div class="books">

					<?php
						$args = array(
							'numberposts' => -1, 
							'category' => 9,
							'post_status' =>'publish'
						);
						$books = get_posts($args);

						foreach($books as $key=>$book){

							$title = $book->post_title;
							$content = $book->post_content;
							$content = substr($content, 0, 100) . '...';
							$size = array(150,150);
							$img = get_the_post_thumbnail_url($book,$size);
							$permalink = get_permalink($book);
							?>
							<a class="book-link" href="<?php echo $permalink; ?>" >
							<div class="book">
								<div class="book-item-body">
									<img src="<?php echo $img; ?>">
									<h2><?php echo $title; ?></h2>
									<p><?php echo $content; ?></p>
									
								</div>
							</div>
							</a>
							<?php
						}

						

					 ?>

				</div>
			</div>
		</div>


	</div>

	<?php

	get_footer();
 ?>