<?php
require_once('wp-walker.php');
// add featured image support
add_theme_support( 'post-thumbnails' );
/*
**function to add custom styles
**
**wp_enqueue_style()
*/

function wp_style(){
    wp_enqueue_style('bootstrap-style',get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('awesome',get_template_directory_uri().'/css/font-awesome.min.css');
    wp_enqueue_style('main',get_template_directory_uri().'/css/main.css');
}

/*
**function to add custom scripts
**
**wp_enqueue_style()
*/
function wp_script(){
     wp_deregister_script('jquery'); // remove current jquery to handle to footer
   // wp_enqueue_script('jquery',get_template_directory_uri().'/js/jquery-1.11.3.min',array(),false,true);
    wp_register_script( 'jquery', includes_url().'/js/jquery/jquery.js', array(),'', true );
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/js/bootstrap.min.js',array(),false,true); //insert bootstarp
    wp_enqueue_script('nicescroll-js',get_template_directory_uri().'/js/jquery.nicescroll.min.js',array(),false,true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(),false,true);

    //to heal ie less than 9
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(),false,true);
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' ); 
    wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js', array(),false,true);
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

    
}

/*
**function to run styles and scripts
**
**wp_enqueue_style()
*/
add_action('wp_enqueue_scripts', 'wp_style');
add_action('wp_enqueue_scripts', 'wp_script');

/*
**function to init the navbar
**
*/

function nav_menu(){
    register_nav_menus( array(
        'navbar-menu' => 'Navgation Bar',
        'footer_menu' => 'My Custom Footer Menu'
    ) );
}

add_action('init', 'nav_menu');

/*
**function to get the navbar
**
*/
function get_nav_menu(){
    wp_nav_menu( array(
        'theme_location' => 'navbar-menu',
        'menu_class' =>'navbar-nav mr-auto',
        'walker' =>new wp_bootstrap4_navwalker(),
        'container'=> false,
        'depth' =>2
    ));
}
/*
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );*/