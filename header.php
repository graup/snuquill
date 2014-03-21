<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php wp_title(" - ", true, "right"); ?><?php bloginfo('name'); ?></title>
	<meta name="author" content="Insert a name">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="True">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0">
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

	<section class="main">
		<header>
			<a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="The SNU Quill - The Seoul National University English-Language Journal"></a>
		</header>
