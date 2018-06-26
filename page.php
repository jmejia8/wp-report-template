<?php 
	get_header();

	while (have_posts()) :	the_post();
?>
	<article <?php post_class(); ?> >
		<?php
			the_title( "<h1>", "</h1>" );
		?>
		<h1></h1>

		<section class="entry-content">
			<?php the_content(); ?>
		</section>
	</article>
<?php
	endwhile;	

	get_footer();
?>