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
        <?php echo get_field( 'sub_navigation' ); ?>
    </header>

<?php do_action( 'foundationpress_before_content' ); ?>

<div id="first">
    <section id="description"
        <p><?php echo get_field( 'secondary_text' ); ?></p>
    </section>
</div>

<?php $brandImage = get_field( 'brand_image' ); ?>
<div id="second"
    <?php if($brandImage): ?>
        style="background: url(<?php echo $brandImage['url']; ?>)"
    <?php endif; ?>>

    <h2><?php echo get_field( 'brand_story' ); ?></h2>
</div>

<?php do_action( 'foundationpress_after_content' ); ?>

<!-- Insert Featured Property call here -->
<?php dynamic_sidebar( 'featured-property-widgets' ); ?>

<?php get_footer(); ?>