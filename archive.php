<?php 
// template for displaying author, etc

get_header();

?>

<?php // http://www.example.com/category/custom-category
	if (is_category()) { ?>
	<h1>
		<span class="red">
			<i class="fa fa-tags"></i>
			<?php _e('Categoría:', 'gaming'); ?>
				
		</span>
		<?php single_cat_title(); ?>
	</h1>
	<?php } ?>

	<?php // http://www.example.com/tag/custom-tag
	if (is_tag()) { ?>
	<h1>
		<span class="red">
			<i class="fa fa-tag"></i>
			<?php _e('Etiqueta:', 'gaming'); ?>
		</span> <?php single_tag_title(); ?>
	</h1>
	
	<?php } ?>

	<?php // http://www.example.com/tag/custom-tag
	if (is_author()) { 
	// $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	?>

	<div class="vcard author-info">
		<div class="avatar">
			<?php echo get_avatar( get_the_author_meta('ID'), 100); ?> 
			<h1 class="name">
				<a href="the_author_meta('user_url');" class="name" >
					<?php
						the_author_meta('user_firstname');
						echo " ";
						the_author_meta('user_lastname'); ?>
				</a>
			</h1>
		</div>
		<article>
			<?php the_author_meta('description'); ?>
			
		</article>
	</div>

	<h1>
		<span class="red">
			<i class="fa fa-user"></i>
			<?php _e('Latest', 'gaming'); ?>
		</span> <?php _e('Posts'); ?>
	</h1>

	 <br>
	<?php  ?>
	
	<?php } ?>

	<?php // http://www.example.com/2017/05
	if (is_date()) { ?>
	<h1>
		<span class="red">
			<i class="fa fa-calendar"></i>
			<?php _e('Entradas del ', 'gaming'); ?>
		</span>
		<?php 
		
		$year = get_query_var('year');
		$month = get_query_var('monthnum');
		$day = get_query_var('day');

		if ($year > 0) { echo $year; }
		if ($month > 0) { echo '-' . str_pad($month, 2, 0, STR_PAD_LEFT); }
		if ($day > 0) { echo '-' . str_pad($day, 2, 0, STR_PAD_LEFT); }

	?></h1>
	<?php } ?>

<div>
	<?php
	// start loop 
	while (have_posts()) : the_post();
	?>

	<article <?php post_class('row') ?>>
		<div class="img">
			<?php 
				if (has_post_thumbnail()) {
					the_post_thumbnail('large');
				}
			?>
		</div>


		<section>
			<h2>
				<a href="<?php echo get_permalink(); ?>">
					<?php the_title(); ?>
				</a>

			</h2>

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

			<?php the_excerpt(); ?>
			<a href="<?php echo get_permalink(); ?>" class="btn-default">
				<?php _e('Seguir leyendo', 'gaming') ?>
			</a>
		</section>
	</article>

	<hr>

	<?php 
	// end loop
	endwhile;
	?>
</div>

<?php 

get_footer();
?>