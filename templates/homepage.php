<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<?php $heroImage = get_field( 'hero_image' ); ?>
<header id="hero" role="banner"
        <?php if($heroImage): ?>
        style="background: url(<?php echo $heroImage['url']; ?>)"
        <?php endif; ?>>
    <div class="content-container">
        <h1><?php the_field( 'hero_title' ); ?></h1>
        <p><?php the_field( 'hero_introduction' ); ?></p>
    </div>
</header>

<?php $heroImageMobile = get_field( 'hero_image_mobile' ); ?>
<header id="hero-mobile" role="banner"
    <?php if($heroImageMobile): ?>
        style="background: url(<?php echo $heroImageMobile['url']; ?>)"
    <?php endif; ?>>
    <div class="content-container">
        <h1><?php the_field( 'hero_title' ); ?></h1>
        <p><?php the_field( 'hero_introduction' ); ?></p>
    </div>
</header>

<?php do_action( 'foundationpress_before_content' ); ?>

<div id="first" class="highlights">
    <?php $firstLeftImage = get_field( 'first_left_image' ); ?>
    <section id="real-estate"
             <?php if($firstLeftImage): ?>
             style="background: url(<?php echo $firstLeftImage['url']; ?>)"
             <?php endif; ?>>

            <h2><?php the_field( 'first_left_title' ); ?></h2>
            <p><?php the_field( 'first_left_description' ); ?></p>
            <a href="<?php the_field( 'first_left_button_link' ); ?>" class="button"><?php the_field( 'first_left_button' ); ?></a>
    </section>

    <?php $firstRightImage = get_field( 'first_right_image' ); ?>
    <section id="discovery-visit"
             <?php if($firstRightImage): ?>
             style="background: url(<?php echo $firstRightImage['url']; ?>)"
             <?php endif; ?>>

            <h2><?php the_field( 'first_right_title' ); ?></h2>
            <p><?php the_field( 'first_right_description' ); ?></p>
            <a href="<?php the_field( 'first_right_button_link' ); ?>" class="button"><?php the_field( 'first_right_button' ); ?></a>
    </section>
</div>

<?php $centerImage = get_field( 'center_image' ); ?>
<div id="center"
     <?php if($centerImage): ?>
     style="background: url(<?php echo $centerImage['url']; ?>)"
     <?php endif; ?>>
    <div class="content-container">
        <h1><?php the_field( 'center_title' ); ?></h1>
    </div>
</div>

<div id="second" class="highlights">
    <?php $secondLeftImage = get_field( 'second_left_image' ); ?>
    <section id="golf-course"
             <?php if($secondLeftImage): ?>
             style="background: url(<?php echo $secondLeftImage['url']; ?>)"
             <?php endif; ?>>

            <div class="overlay">
                <h2><?php the_field( 'second_left_title' ); ?></h2>
                <p><?php the_field( 'second_left_description' ); ?></p>
                <a href="<?php the_field( 'second_left_button_link' ); ?>" class="button"><?php the_field( 'second_left_button' ); ?></a>
            </div>
    </section>

    <?php $secondRightImage = get_field( 'second_right_image' ); ?>
    <section id="the-club"
             <?php if($secondRightImage): ?>
             style="background: url(<?php echo $secondRightImage['url']; ?>)"
             <?php endif; ?>>

            <div class="overlay">
                <h2><?php the_field( 'second_right_title' ); ?></h2>
                <p><?php the_field( 'second_right_description' ); ?></p>
                <a href="<?php the_field( 'second_right_button_link' ); ?>" class="button"><?php the_field( 'second_right_button' ); ?></a>
            </div>
    </section>
</div>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php dynamic_sidebar( 'featured-property-widgets' ); ?>

<?php get_footer(); ?>
