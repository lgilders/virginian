<?php
/*
Template Name: Primary
*/
get_header(); ?>

<?php $heroImage = get_field( 'hero_image' ); ?>
    <header id="hero" role="banner"
        <?php if($heroImage): ?>
            style="background: #706259 url(<?php echo $heroImage['url']; ?>)"
        <?php endif; ?>>
        <div class="content-container">
            <h1><?php the_field( 'hero_title' ); ?></h1>
            <p><?php the_field( 'hero_introduction' ); ?></p>
            <?php the_field( 'sub_navigation' ); ?>
        </div>
    </header>

<?php $heroImageMobile = get_field( 'hero_image_mobile' ); ?>
    <header id="hero-mobile" role="banner"
        <?php if($heroImageMobile): ?>
            style="background: #706259 url(<?php echo $heroImage['url']; ?>)"
        <?php endif; ?>>
        <div class="content-container">
            <h1><?php the_field( 'hero_title' ); ?></h1>
            <p><?php the_field( 'hero_introduction' ); ?></p>
            <?php the_field( 'sub_navigation' ); ?>
        </div>
    </header>

<?php do_action( 'foundationpress_before_content' ); ?>

<div id="first" class="content-container">
    <?php $iconImage = get_field( 'secondary_icon' ); ?>
    <section id="description">
        <?php if($iconImage): ?>
            <img src="<?php echo $iconImage['url']; ?>" alt="icon" />
        <?php endif; ?>

        <?php $title = get_field( 'secondary_title'); ?>
        <?php if($title): ?>
            <h1><?php echo $title; ?></h1>
        <?php endif; ?>

        <p><?php the_field( 'secondary_text' ); ?></p>
    </section>
</div>

<?php $form = get_field( 'form' ); ?>
<?php if($form): ?>
<div id="visit-us">
    <div id="form" class="content-container">
        <?php echo $form; ?>
    </div>
    <div id="information" class="content-container">
        <div id="location">
            <p><?php the_field('location'); ?></p>
        </div>
        <div id="hours">
            <p><?php the_field('hours'); ?></p>
        </div>
    </div>
</div>
<?php endif; ?>

<?php $brandImage = get_field( 'brand_image' ); ?>
<?php $brandStory = get_field( 'brand_story' ); ?>
<?php if($brandStory): ?>
    <div id="second"
        <?php if($brandImage): ?>
            style="background: #706259 url(<?php echo $brandImage['url']; ?>)"
        <?php endif; ?>>

        <h1><?php the_field( 'brand_story' ); ?></h1>
    </div>
<?php endif; ?>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php dynamic_sidebar( 'featured-property-widgets' ); ?>

<?php get_footer(); ?>