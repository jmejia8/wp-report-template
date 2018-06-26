<?php 
// template for displaying author, etc

get_header();

?>

<center>
	<h1><span class="red">Professional</span> Search</h1>
</center>


<?php
	get_search_form();

	$s=get_search_query();
	$args = array(
	                's' =>$s
	            );
	
	// The Query
	$the_query = new WP_Query( $args );
	
	if ( $the_query->have_posts() ) {
	        _e("<h2><span class='red'>Search Results for: </span> ".get_query_var('s')."</h2>");

?>
<div class="archive">
<?php
	        while ( $the_query->have_posts() ) {
	           $the_query->the_post();
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
	        }

?>
</div>
<?php
	}else{
?>

<h2>Nothing Found</h2>

<div>
	<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
</div>

<?php
}

get_footer();
?>