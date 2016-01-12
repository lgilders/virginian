<?php
// Inserts the site logo into the header navigation menu for MOBILE
// Remember to optimize this image for mobile viewing
?>

<div id="logo-mobile" class="home">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/virginian/fpo-logo.png" alt="The Virginian logo" title="The Virginian logo" />
    </a>
</div>