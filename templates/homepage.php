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
    <h1><?php echo get_field( 'hero_title' ); ?></h1>
    <p><?php echo get_field( 'hero_introduction' ); ?></p>
</header>

<?php do_action( 'foundationpress_before_content' ); ?>

<div id="first" class="highlights">
    <?php $firstLeftImage = get_field( 'first_left_image' ); ?>
    <section id="real-estate"
             <?php if($firstLeftImage): ?>
             style="background: url(<?php echo $firstLeftImage['url']; ?>)"
             <?php endif; ?>>

        <?php echo get_field( 'first_left_title' ); ?>
        <?php echo get_field( 'first_left_description' ); ?>
        <?php echo get_field( 'first_left_button' ); ?>
    </section>

    <?php $firstRightImage = get_field( 'first_right_image' ); ?>
    <section id="discovery-visit"
             <?php if($firstRightImage): ?>
             style="background: url(<?php echo $firstRightImage['url']; ?>)"
             <?php endif; ?>>

        <?php echo get_field( 'first_right_title' ); ?>
        <?php echo get_field( 'first_right_description' ); ?>
        <?php echo get_field( 'first_right_button' ); ?>
    </section>
</div>

<?php $centerImage = get_field( 'center_image' ); ?>
<div id="center"
     <?php if($centerImage): ?>
     style="background: url(<?php echo $centerImage['url']; ?>)"
     <?php endif; ?>>

    <?php echo get_field( 'center_title' ); ?>
</div>

<div id="second" class="highlights">
    <?php $secondLeftImage = get_field( 'second_left_image' ); ?>
    <section id="golf-course"
             <?php if($secondLeftImage): ?>
             style="background: url(<?php echo $secondLeftImage['url']; ?>)"
             <?php endif; ?>>

        <?php echo get_field( 'second_left_title' ); ?>
        <?php echo get_field( 'second_left_description' ); ?>
        <?php echo get_field( 'second_left_button' ); ?>
    </section>

    <?php $secondRightImage = get_field( 'second_right_image' ); ?>
    <section id="the-club"
             <?php if($secondRightImage): ?>
             style="background: url(<?php echo $secondRightImage['url']; ?>)"
             <?php endif; ?>>

        <?php echo get_field( 'second_right_title' ); ?>
        <?php echo get_field( 'second_right_description' ); ?>
        <?php echo get_field( 'second_right_button' ); ?>
    </section>
</div>

<?php do_action( 'foundationpress_after_content' ); ?>

<!-- Insert Featured Property call here -->

<?php get_footer(); ?>
