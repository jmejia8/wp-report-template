<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Lora" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>">

	<link rel="shortcut icon" href="<?php echo get_site_url(); ?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo get_site_url(); ?>/favicon.ico" type="image/x-icon">

	<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/slider.js"></script>

	<?php
		wp_head();
	?>

</head>
<body <?php body_class(); ?> >

<header class="main">
	<div class="menu-container">
		<div class="logo">
			<a href="<?php echo get_site_url(); ?>">
				<img src="<?php bloginfo('template_url');?>/img/logo.png" alt="Candaana Gaming">
				
			</a>

			<div id="btn-menu">
				<a href="#" title="Menu" onclick="displayMenu()">
					<i class="fa fa-bars"></i>
				</a>
			</div>
		</div>
		
		<?php
			wp_nav_menu(
				array(
				'theme_location' => 'top',
				'container' => 'nav',
				'container_class' => 'menu',
				)
			);
		?>

		<div class="clear"></div>
	</div>
</header>
<div class="container">