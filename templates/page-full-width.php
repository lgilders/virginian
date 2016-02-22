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

    <?php do_action( 'foundationpress_before_content' ); ?>

    <div id="breadcrumbs" class="content-container">
        <?php if( function_exists('yoast_breadcrumb') ): ?>
            <?php {yoast_breadcrumb( '<p ', '</p>' );} ?>
        <?php endif; ?>
    </div>

    <?php $content = the_content(); ?>
    <?php if($content): ?>
        <div class="content-container">
            <?php echo $content; ?>
        </div>
    <?php endif; ?>

    <?php $photo_gallery = get_field( 'photo_gallery' ); ?>
    <?php if($photo_gallery): ?>
        <div class="content-container">
            <?php

            $image_ids = get_field('photo_gallery', false, false);

            $shortcode = '[gallery ids="' . implode(',', $image_ids) . '" columns="4" size="medium"]';

            echo do_shortcode( $shortcode );

            ?>
        </div>
    <?php endif; ?>

</div>

<?php do_action( 'foundationpress_after_content' ); ?>

<div id="featured-property" class="large-12">
    <?php dynamic_sidebar( 'featured-property-widgets' ); ?>
</div>

<?php get_footer(); ?>
