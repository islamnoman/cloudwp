<?php

/*
	
@package nomantheme
-- Link Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'noman-format-link' ); ?>>
	
	<header class="entry-header text-center">
		
		<?php 
			$link = noman_grab_url();
			the_title( '<h1 class="entry-title"><a href="' . $link . '" target="_blank">', '<div class="link-icon"><span class="noman-icon noman-link"></span></div></a></h1>'); 
		?>
		
	</header>

</article>