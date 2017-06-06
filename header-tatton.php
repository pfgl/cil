<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
        <link rel="icon" href="http://www.tattoninvestments.com/tim-assets/themes/tim/assets/icons/favicon.ico">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

        <link rel="stylesheet" id="tatton-stylesheet-css" href="http://www.cambridgeinvestments.co.uk/wp-content/themes/cil/library/css/tatton.min.css" type="text/css" media="all">

	</head>

	<body <?php body_class(); ?>>

            <nav class="navbar navbar-default navbar-nested navbar--primary navbar--fixed" id="top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#primary-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar__phone-mobile" href="tel:020 7190 2959"><i class="fa fa-phone"></i></a>
                <a class="navbar-brand navbar--primary__brand" href="http://www.cambridgeinvestments.co.uk/tatton"><img src="/wp-content/themes/cil/library/images/logo.svg" alt="Tatton Investment Management" class="js-svg"></a>
            </div>

            <div class="collapse navbar-collapse" id="primary-nav">
                <?php if(is_user_logged_in()): ?>
                    <a class='btn btn-default navbar-right navbar__logout' href="<?php echo wp_logout_url(get_the_permalink()); ?>">Logout</a>
                <?php endif; ?>

                <ul class="navbar-nav navbar-right social social--navbar text-center hidden-xs">
                    <li><a href="https://twitter.com/TattonIM" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCXQR46fTHXupZgL_RhTf5aA" title="youtube"><i class="fa fa-youtube"></i></a></li>
                </ul>

                <p class="navbar-right navbar__phone hidden-xs"><a href="tel: <?php the_field('contact_phone', 'option'); ?>"><span>t//</span><?php the_field('contact_phone', 'option'); ?></a></p>

                <?php wp_nav_menu(array(
                    'container' => false,                           // remove nav container
                    'container_class' => '',                    // class of container (should you choose to use it)
                    'menu' => __( 'Tatton Menu', 'bonestheme' ),  // nav name
                    'menu_class' => 'navbar navbar-nav navbar-right navbar--menu',               // adding custom nav class
                    'theme_location' => 'tatton-nav',                 // where it's located in the theme
                    'before' => '',                                 // before the menu
                    'after' => '',                                  // after the menu
                    'link_before' => '',                            // before each link
                    'link_after' => '',                             // after each link
                    'depth' => 0,                                   // limit the depth of the nav
                    'fallback_cb' => ''                             // fallback function (if there is one)
                )); ?>

            </div>
        </div>
    </nav>
