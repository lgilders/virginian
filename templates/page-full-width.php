<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<div id="page-full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>

    <header id="hero" class="content-container">
        <h1><?php the_field( 'hero_title' ); ?></h1>
        <h4><?php the_field( 'hero_subtitle' ); ?></h4>
    </header>


    <div class="content-container">
        <?php the_content(); ?>
    </div>
</div>

<?php dynamic_sidebar( 'featured-property-widgets' ); ?>

<?php get_footer(); ?>
