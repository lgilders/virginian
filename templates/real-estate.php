<?php
/*
Template Name: Real Estate
*/
get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>

    <header id="hero" class="content-container">
        <h1>Available Homes</h1>
        <h4>Start searching for your dream home today</h4>
    </header>

    <div class="content-container">
        <?php if( function_exists('yoast_breadcrumb') ): ?>
            <?php {yoast_breadcrumb( '<p id="breadcrumbs" ', '</p>' );} ?>
        <?php endif; ?>

        <?php if( is_page('available-homes') ) { ?>
            <?php dynamic_sidebar( 'search-home-widget' ); ?>
        <?php } else { ?>
            <?php dynamic_sidebar( 'search-lot-widget' ); ?>
        <?php } ?>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </div>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php dynamic_sidebar( 'featured-property-widgets' ); ?>

<?php get_footer(); ?>