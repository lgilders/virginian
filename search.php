<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
get_header(); ?>

    <div class="row">
        <div class="small-12 large-12 columns" role="main">

            <?php do_action( 'foundationpress_before_content' ); ?>

            <h1>Search Results</h1>
            <h2><?php _e( 'You searched for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"</h2>

            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
                <?php endwhile; ?>

            <?php else : ?>
                <?php get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif;?>

            <?php do_action( 'foundationpress_before_pagination' ); ?>

            <?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>

                <nav id="post-nav">
                    <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
                    <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
                </nav>
            <?php } ?>

            <?php do_action( 'foundationpress_after_content' ); ?>

        </div>
    </div>

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
            <?php dynamic_sidebar( 'search-property-widget' ); ?>
        </div>
    </div>

    <div id="featured-property" class="large-12">
        <?php dynamic_sidebar( 'featured-property-widgets' ); ?>
    </div>

<?php get_footer();