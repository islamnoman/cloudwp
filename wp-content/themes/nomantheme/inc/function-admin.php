<?php

/*
	
@package nomantheme
	
	========================
		ADMIN PAGE
	========================
*/

function noman_add_admin_page() {
	
	//Generate Sunset Admin Page
	add_menu_page( 'Noman Theme Options', 'Noman', 'manage_options', 'noman_blog', 'noman_theme_create_page', get_template_directory_uri() . '/img/noman-icon.png', 110 );
	
	//Generate Sunset Admin Sub Pages
	add_submenu_page( 'noman_blog', 'Noman Sidebar Options', 'Sidebar', 'manage_options', 'noman_blog', 'noman_theme_create_page' );
	add_submenu_page( 'noman_blog', 'Noman Theme Options', 'Theme Options', 'manage_options', 'noman_blog_theme', 'noman_theme_support_page' );
	add_submenu_page( 'noman_blog', 'Noman Contact Form', 'Contact Form', 'manage_options', 'noman_blog_theme_contact', 'noman_contact_form_page' );
	add_submenu_page( 'noman_blog', 'Noman CSS Options', 'Custom CSS', 'manage_options', 'noman_blog_css', 'noman_theme_settings_page');
	
}
add_action( 'admin_menu', 'noman_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'noman_custom_settings' );

function noman_custom_settings() {
	//Sidebar Options
	register_setting( 'noman-settings-group', 'profile_picture' );
	register_setting( 'noman-settings-group', 'first_name' );
	register_setting( 'noman-settings-group', 'last_name' );
	register_setting( 'noman-settings-group', 'user_description' );
	register_setting( 'noman-settings-group', 'twitter_handler', 'noman_sanitize_twitter_handler' );
	register_setting( 'noman-settings-group', 'facebook_handler' );
	register_setting( 'noman-settings-group', 'gplus_handler' );
	
	add_settings_section( 'noman-sidebar-options', 'Sidebar Option', 'noman_sidebar_options', 'noman_blog');
	
	add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'noman_sidebar_profile', 'noman_blog', 'noman-sidebar-options');
	add_settings_field( 'sidebar-name', 'Full Name', 'noman_sidebar_name', 'noman_blog', 'noman-sidebar-options');
	add_settings_field( 'sidebar-description', 'Description', 'noman_sidebar_description', 'noman_blog', 'noman-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter handler', 'noman_sidebar_twitter', 'noman_blog', 'noman-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'noman_sidebar_facebook', 'noman_blog', 'noman-sidebar-options');
	add_settings_field( 'sidebar-gplus', 'Google+ handler', 'noman_sidebar_gplus', 'noman_blog', 'noman-sidebar-options');
	
	//Theme Support Options
	register_setting( 'noman-theme-support', 'post_formats' );
	register_setting( 'noman-theme-support', 'custom_header' );
	register_setting( 'noman-theme-support', 'custom_background' );
	
	add_settings_section( 'noman-theme-options', 'Theme Options', 'noman_theme_options', 'noman_blog_theme' );
	
	add_settings_field( 'post-formats', 'Post Formats', 'noman_post_formats', 'noman_blog_theme', 'noman-theme-options' );
	add_settings_field( 'custom-header', 'Custom Header', 'noman_custom_header', 'noman_blog_theme', 'noman-theme-options' );
	add_settings_field( 'custom-background', 'Custom Background', 'noman_custom_background', 'noman_blog_theme', 'noman-theme-options' );
	
	//Contact Form Options
	register_setting( 'noman-contact-options', 'activate_contact' );
	
	add_settings_section( 'noman-contact-section', 'Contact Form', 'noman_contact_section', 'noman_blog_theme_contact');
	
	add_settings_field( 'activate-form', 'Activate Contact Form', 'noman_activate_contact', 'noman_blog_theme_contact', 'noman-contact-section' );
	
	//Custom CSS Options
	register_setting( 'noman-custom-css-options', 'noman_css', 'noman_sanitize_custom_css' );
	
	add_settings_section( 'noman-custom-css-section', 'Custom CSS', 'noman_custom_css_section_callback', 'noman_blog_css' );
	
	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'noman_custom_css_callback', 'noman_blog_css', 'noman-custom-css-section' );
	
}

function noman_custom_css_section_callback() {
	echo 'Customize noman Theme with your own CSS';
}

function noman_custom_css_callback() {
	$css = get_option( 'noman_css' );
	$css = ( empty($css) ? '/* Noman Theme Custom CSS */' : $css );
	echo '<div id="customCss">'.$css.'</div><textarea id="noman_css" name="noman_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}

function noman_theme_options() {
	echo 'Activate and Deactivate specific Theme Support Options';
}

function noman_contact_section() {
	echo 'Activate and Deactivate the Built-in Contact Form';
}

function noman_activate_contact() {
	$options = get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
}

function noman_post_formats() {
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

function noman_custom_header() {
	$options = get_option( 'custom_header' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}

function noman_custom_background() {
	$options = get_option( 'custom_background' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}

// Sidebar Options Functions
function noman_sidebar_options() {
	echo 'Customize your Sidebar Information';
}

function noman_sidebar_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<button type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><span class="noman-icon-button dashicons-before dashicons-format-image"></span> Upload Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<button type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><span class="noman-icon-button dashicons-before dashicons-format-image"></span> Replace Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <button type="button" class="button button-secondary" value="Remove" id="remove-picture"><span class="noman-icon-button dashicons-before dashicons-no"></span> Remove</button>';
	}
	
}
function noman_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}
function noman_sidebar_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
}
function noman_sidebar_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}
function noman_sidebar_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}
function noman_sidebar_gplus() {
	$gplus = esc_attr( get_option( 'gplus_handler' ) );
	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+ handler" />';
}

//Sanitization settings
function noman_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

function noman_sanitize_custom_css( $input ){
	$output = esc_textarea( $input );
	return $output;
}

//Template submenu functions
function noman_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/noman-admin.php' );
}

function noman_theme_support_page() {
	require_once( get_template_directory() . '/inc/templates/noman-theme-support.php' );
}

function noman_contact_form_page() {
	require_once( get_template_directory() . '/inc/templates/noman-contact-form.php' );
}

function noman_theme_settings_page() {
	require_once( get_template_directory() . '/inc/templates/noman-custom-css.php' );
}


















