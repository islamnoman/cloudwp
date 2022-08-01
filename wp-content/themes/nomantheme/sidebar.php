<?php /*
	
@package nomantheme

*/

if ( ! is_active_sidebar( 'noman-sidebar' ) ) {
	return;
}

?>

<aside id="secondary" class="widget-area" role="complementary">
  
  <div class="visible-xs">
    <?php
      wp_nav_menu( array(
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'nav navbar-nav navbar-collapse',
        'walker' => new Noman_Walker_Nav_Primary()
      ) );  
    ?>
  </div>
	
	<?php dynamic_sidebar( 'noman-sidebar' ); ?>
	
</aside>