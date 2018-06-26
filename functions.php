<?php 

// global functions 

add_theme_support( 'post-thumbnails' );


add_image_size( 'gaming-featured-image', 1280, 720, true );
add_image_size( 'gaming-thumbnail-image', 100, 100, true );

register_nav_menus(
	array(
		'top'    => __('Top Menu', 'gaming'),
		'footer' => __('Footer Menu', 'gaming'),
		'console' => __('Console Menu', 'gaming'),
	)
);




// custom post type
/*
 * Define custom post type
 * Register post types: https://codex.wordpress.org/Function_Reference/register_post_type
 * Icons: https://developer.wordpress.org/resource/dashicons/
 */
function gaming_post_type() {
 	register_post_type( 'gaming_slider',
 		array(
	      'labels' => array(
	        'name' => __( 'Carousel' ),
	        'singular_name' => __( 'Item' ),
	        'add_new' => __( 'Nuevo item' ),
	        'add_new_item' => __( 'Añadir nuevo item' ),
	        'edit_item' => __( 'Editar item' ),
	        'featured_image' => __( 'Imagen del slide' )
	      ),
	      'public' => true,
	      'exclude_from_search' => true,
	      'has_archive' => false,
	      'show_in_nav_menus' => false,
	      'menu_icon' => 'dashicons-slides',
	      //'rewrite' => array('slug' => 'carousel'),
	      'supports' => array('title', 'editor', 'thumbnail')

    	)
  	);
 }

 add_action( 'init', 'gaming_post_type' );
 

 // Register sidebars
add_action( 'widgets_init', 'gamingWidgetsInit' );

function gamingWidgetsInit() {
    register_sidebar( array(
        'name' => __( 'Posts sidebar', 'gaming' ),
        'id' => 'sidebar-posts',
        'description' => __( 'Widgets in this area will be shown on all posts.', 'gaming' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}

function move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'move_comment_field' );

function gaming_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
			?>
		    <li class="comment">
		        <p><?php _e( 'Pingback:', 'gaming' ); ?> <?php comment_author_link(); ?>
		        	<?php edit_comment_link( __( '(Edit)', 'gaming' ), ' ' ); ?></p>
		    	<?php
		    break;

		default : ?>
			<li <?php comment_class('comment'); ?> id="li-comment-<?php comment_ID(); ?>">
				<article id="comment-<?php comment_ID(); ?>">
					<div class="comment-meta">
		                <div class="comment-author vcard">

		                	<?php $args = [
		                        "class" => "avatar avatar-60 photo"
		                    ];
		                    echo get_avatar( $comment, 60 ); ?>
	                    	<div class="comment-content">


			                    <?php
			                    printf( __( '<b class="fn">%s</b>', 'gaming' ),
		                    	sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) );
		                    	?>
		                    	<?php comment_text(); ?>

		                    	<div class="comment-metadata">
	                    			<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			                            <time pubdate datetime="<?php comment_time( 'c' ); ?>">
			                                <?php
			                                /* translators: 1: date, 2: time */
			                                printf(
			                                	__( '%1$s at %2$s', 'gaming' ),
			                                	get_comment_date(),
			                                	get_comment_time() );
			                                ?>
			                            </time>
			                        </a>
			                        <?php edit_comment_link( __( '(Edit)', 'gaming' ), ' ' ); ?>
		                    	</div>
	                    	</div>

	                    	<div class="reply">
                    			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth ) ) ); ?>
	                    	</div>

	                    	<?php if ( $comment->comment_approved == '0' ) : ?>
	                    		<em><?php _e( 'Your comment is awaiting moderation.', 'gaming' ); ?></em>
	                    	<?php endif; ?>

		                </div>
		            </div>
				</article>
			</li>
			<?php
			break;
	endswitch;
}

/* Change Excerpt length */
function gaming_excerpt_length( $length ) {
	return 30;
}

add_filter( 'excerpt_length', 'gaming_excerpt_length', 999 );