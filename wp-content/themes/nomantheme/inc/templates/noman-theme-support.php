<h1>Noman Theme Support</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="noman-general-form">
	<?php settings_fields( 'noman-theme-support' ); ?>
	<?php do_settings_sections( 'noman_blog_theme' ); ?>
	<?php submit_button(); ?>
</form>