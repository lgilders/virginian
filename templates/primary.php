<?php
/*
Template Name: Primary
*/
get_header(); ?>

<?php $heroImage = get_field( 'hero_image' ); ?>
    <header id="hero" role="banner"
        <?php if($heroImage): ?>
            style="background: url(<?php echo $heroImage['url']; ?>)"
        <?php endif; ?>>
        <h1><?php echo get_field( 'hero_title' ); ?></h1>
        <p><?php echo get_field( 'hero_introduction' ); ?></p>
    </header>

<?php do_action( 'foundationpress_before_content' ); ?>



<?php do_action( 'foundationpress_after_content' ); ?>

<!-- Insert Featured Property call here -->
<?php dynamic_sidebar( 'featured-property-widgets' ); ?>

<?php get_footer(); ?>