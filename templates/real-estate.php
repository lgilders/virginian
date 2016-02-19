<?php
/*
Template Name: Real Estate
*/
get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>

    <header id="hero" class="content-container">
        <h1><?php the_field( 'hero_title' ); ?></h1>
        <h4><?php the_field( 'hero_subtitle' ); ?></h4>
    </header>

    <div class="content-container">
        <?php if( function_exists('yoast_breadcrumb') ): ?>
            <?php {yoast_breadcrumb( '<p id="breadcrumbs" ', '</p>' );} ?>
        <?php endif; ?>

        <div class="real-estate-search" data-responsive-toggle="search-form">
            <h5>Real Estate Search</h5>
            <button class="c-hamburger c-hamburger--htx c-hamburger-search" type="button" data-toggle="offCanvas">
                <span>toggle menu</span>
            </button>
            <script>
                (function() {

                    "use strict";

                    var toggles = document.querySelectorAll(".c-hamburger-search");

                    for (var i = toggles.length - 1; i >= 0; i--) {
                        var toggle = toggles[i];
                        toggleHandler(toggle);
                    };

                    function toggleHandler(toggle) {
                        toggle.addEventListener( "click", function(e) {
                            e.preventDefault();
                            (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
                        });
                    }

                })();
            </script>

            <div id="search-form">
                <?php if( is_page('available-homes') ) { ?>
                    <?php dynamic_sidebar( 'search-home-widget' ); ?>
                <?php } else { ?>
                    <?php dynamic_sidebar( 'search-lot-widget' ); ?>
                <?php } ?>
            </div>
        </div>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>

        <div class="content-container secondary-nav">
            <?php the_field( 'secondary_nav' ); ?>
        </div>
    </div>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php dynamic_sidebar( 'featured-property-widgets' ); ?>

<?php get_footer(); ?>