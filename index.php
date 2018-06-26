<?php 
	get_header();
?>

	<?php 
	$args = array(
          'post_type' => 'gaming_slider',
          'posts_per_page' => 3
          );
        $loop = new WP_Query( $args );

        if ($loop->have_posts()) : 
    ?>
	<div class="slideshow-container">
		
		<?php 
		$l = $loop->post_count;

		for ($i=0; $loop->have_posts(); $i++) {
			$loop->the_post();
		?>
			<div class="mySlides fade">
				<div class="numbertext"></div>
				<div class="image">
					<?php echo get_the_post_thumbnail($loop->ID, 'gaming-featured-image');?>
				</div>
				
				<div class="text">
					<br>
					<?php the_title( "<h2>", "</h2>" ); ?>
					<br>
					<?php the_content(); ?>
				</div>
			</div>
		<?php 
		}
		?>

		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>

	</div>
		<br>

	<div style="text-align:center">
		<?php
		for ($i=0; $i < $l; $i++) { 
			echo "<span class=\"dot\" onclick=\"currentSlide($i)\"></span>";
		}
		?>
	</div>

	<?php
        endif;
    ?>


	<div class="content">
		<h1><span class="red">Lo más</span> Nuevo</h1>


		<div class="news-container">
			<div class="item-list">
				<?php
					// start loop 
					while (have_posts()) : the_post();
				?>
					<a href="<?php echo get_permalink(); ?>" class="news-item">
						<?php 
							if (has_post_thumbnail()) {
								the_post_thumbnail('gaming-thumbnail-image');
							}
						?>
						<div>
							<h4>
								<?php the_title(); ?>
							</h4>

							<?php the_excerpt(); ?>

							<span class="date">
								<i class="fa fa-calendar"></i>
								<?php echo get_the_date(); ?>
							</span>
						</div>
					</a>
				<?php 
				// end loop
				endwhile;
				?>

			</div>
			<?php 
			$args = array(
					'post_type' => 'post',
					'posts_per_page' => 1
			);
			$loop = new WP_Query( $args );

			if ($loop->have_posts()) : $loop->the_post();
		    ?>
				<div class="summary">
					<div class="banner">
					<div class="new-tag">
						<?php _e('New' , 'gaming'); ?>
					</div>
						<?php echo get_the_post_thumbnail($loop->ID, 'gaming-featured-image');?>
					</div>
					<div class="txt">
						<?php the_title( "<h3>", "</h3>" ); ?>
						
						<?php the_excerpt(); ?>

						<a href="<?php echo get_permalink(); ?>" class="btn-default"><?php _e('Read more'); ?></a>
					</div>
				</div>
			<?php endif; ?>
			<div class="clear"></div>
		</div>
	</div>
<?php 
	get_footer();
?>
