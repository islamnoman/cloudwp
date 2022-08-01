<h1>Noman Custom CSS</h1>
<?php settings_errors(); ?>

<form id="save-custom-css-form" method="post" action="options.php" class="noman-general-form">
	<?php settings_fields( 'noman-custom-css-options' ); ?>
	<?php do_settings_sections( 'noman_blog_css' ); ?>
	<?php submit_button(); ?>
</form>