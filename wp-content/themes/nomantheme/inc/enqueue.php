<?php

/*
	
@package nomantheme
	
	========================
		ADMIN ENQUEUE FUNCTIONS
	========================
*/

function noman_load_admin_scripts( $hook ){
	//echo $hook;
	
	//register css admin section
	wp_register_style( 'raleway-admin', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
	wp_register_style( 'noman_admin', get_template_directory_uri() . '/css/noman.admin.css', array(), '1.0.0', 'all' );
	
	//register js admin section
	wp_register_script( 'noman-admin-script', get_template_directory_uri() . '/js/noman.admin.js', array('jquery'), '1.0.0', true );
	
	$pages_array = array(
		'toplevel_page_noman_blog',
		'noman_page_noman_blog_theme',
		'noman_page_noman_blog_theme_contact',
		'noman_page_noman_blog_css'
	);
	
	//PHP 7
	
	if( in_array( $hook, $pages_array ) ){
		
		wp_enqueue_style( 'raleway-admin' );
		wp_enqueue_style( 'noman_admin' );
	
	} 
	
	if( 'toplevel_page_noman_blog' == $hook ){
		
		wp_enqueue_media();
		
		wp_enqueue_script( 'noman-admin-script' );
		
	}
	
	if ( 'noman_page_noman_blog_css' == $hook ){
		
		wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/noman.ace.css', array(), '1.0.0', 'all' );
		
		wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true );
		wp_enqueue_script( 'noman-custom-css-script', get_template_directory_uri() . '/js/noman.custom_css.js', array('jquery'), '1.0.0', true );
	
	}
	
}
add_action( 'admin_enqueue_scripts', 'noman_load_admin_scripts' );

/*
	
	========================
		FRONT-END ENQUEUE FUNCTIONS
	========================
*/

function noman_load_scripts(){
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
	wp_enqueue_style( 'noman', get_template_directory_uri() . '/css/noman.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery' , get_template_directory_uri() . '/js/jquery.js', false, '1.11.3', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
	wp_enqueue_script( 'noman', get_template_directory_uri() . '/js/noman.js', array('jquery'), '1.0.0', true );
	
}
add_action( 'wp_enqueue_scripts', 'noman_load_scripts' );















