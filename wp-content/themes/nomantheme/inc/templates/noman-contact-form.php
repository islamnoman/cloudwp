<h1>Noman Contact Form</h1>
<?php settings_errors(); ?>

<p>Use this <strong>shortcode</strong> to activate the Contact Form inside a Page or a Post</p>
<p><code>[contact_form]</code></p>

<form method="post" action="options.php" class="noman-general-form">
	<?php settings_fields( 'noman-contact-options' ); ?>
	<?php do_settings_sections( 'noman_blog_theme_contact' ); ?>
	<?php submit_button(); ?>
</form>