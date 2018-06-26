<?php 
	get_header();

	while (have_posts()) :	the_post();
?>
	<article <?php post_class(); ?> >
		
		<section class="single-content">
			<div class="img">
				<?php if (has_post_thumbnail()) {
					the_post_thumbnail();
				} ?>
			</div>
			
			<?php
				the_title( "<h1>", "</h1>" );
			?>

			<div class="post-info">
				<a href="<?php echo get_day_link( get_the_time('Y') , get_the_time('m') , get_the_time('d') ); ?>">
					<i class="fa fa-calendar"></i>
					<?php echo get_the_date(); ?>
				</a>

				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>">
					<i class="fa fa-user"></i>
					<?php the_author(); ?>
				</a>
			</div>
			
			<?php the_content(); ?>

			 <?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
		</section>
		
		<aside class="single-aside">
			<?php if ( is_active_sidebar( 'sidebar-posts' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-posts' ); ?>
			<?php endif; ?>  
		</aside>
	</article>

<?php
	endwhile;	

	get_footer();
?>