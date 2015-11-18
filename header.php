<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php wp_title(" - ", true, "right"); ?><?php bloginfo('name'); ?></title>
	<meta name="author" content="Insert a name">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="True">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0">
	<?php if (is_home()): ?>
	<meta name="description" content="The SNU Quill is the English-language students’ magazine at Seoul National University. Access all issues online!">
	<?php endif; ?>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
	<?php wp_head(); ?>
</head>

<body class="wrap <?php echo substr(basename( get_page_template() ), 0, -4); ?>">

	<header class="header">
		<nav>
			<?php
				// Top navigation
				wp_nav_menu( array( 'menu_class'=>'nav nav-meta', 'sort_column' => 'menu_order', 'theme_location' => 'header-menu' ) );
			?> 	
		</nav>
		<h1>
			<a href="<?php echo home_url(); ?>" class="logo">
				<span>The SNU Quill</span>
				Seoul Nat'l University English-Language Journal
			</a>
		</h1>
	</header>

	<section class="subheader">
		<p class="issue-info">
			Read the complete issue online or grab your own copy at multiple locations on campus!
		</p>
		<strong>
			<?php if (is_home()): ?>Latest issues
			<?php elseif (is_archive()): ?>Archive
			<?php else: ?>Read issue
			<?php endif; ?>
		</strong>
	</section>

