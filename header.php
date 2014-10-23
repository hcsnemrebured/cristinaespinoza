<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>Título | <?php bloginfo ( 'name' ); ?></title>
<meta name="description" content="<?php bloginfo('description'); ?>">
 
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 
<?php
    /*
     *  Add this to support sites with sites with threaded comments enabled.
     */
    if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );
        wp_head(); ?>    
<?php 
    wp_get_archives('type=monthly&format=link');
?>
<script>
    $(document).ready(function(){
    });

    
</script>
</head>
<body <?php body_class($class); ?> onload="setupBlocks();">

 
<div id="wrapper">
    <div id="header" class="clearfix">
        <div id="logo" class="logo">
        	<a href="<?php echo home_url(); ?>" >
        		<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Alt" >
        	</a>
        </div>
    	<?php wp_nav_menu( array( 'container' => 'false', 'menu_class' => 'nav', 'theme_location' => 'primary-menu' ) ); ?>
        <figure id="linea" class="linea"><img src="<?php bloginfo('template_url'); ?>/images/linea.png" ></figure>
    </div>