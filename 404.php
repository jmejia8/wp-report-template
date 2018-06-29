<?php
get_header(); ?>

<article <?php post_class(); ?> >

	<section class="single-content">
		<div class="error-container">
			<h1><?php _e( 'Página no encontrada', 'report' ); ?></h1>
			<div class="error-no-found">404</div>
			<p>
				<?php
					_e( 'El contiendo no está disponible.', 'report' ); 
				?>
			</p>
		</div>
		<hr>

	<h1><span class="red">Últimos</span> Reportes</h1>


<?php 
$args = array(
		'post_type' => 'post',
		'posts_per_page' => 5
);
$loop = new WP_Query( $args );


	        while ( $loop->have_posts() ) {
	           $loop->the_post();
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
<?php } ?>
		</section>
	<aside class="single-aside">
		<?php if ( is_active_sidebar( 'sidebar-posts' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-posts' ); ?>
		<?php endif; ?>  
	</aside>
</article>

<?php
get_footer(); ?>