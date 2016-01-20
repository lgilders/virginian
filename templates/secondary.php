<?php
/*
Template Name: Secondary
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
        <section id="title">
            <?php echo get_field( 'first_section_title' ); ?>
        </section>

        <?php $firstImage = get_field( 'first_section_image' ); ?>
        <?php $firstVideo = get_field( 'first_section_video' ); ?>
        <section id="media">
            <?php if($firstVideo) { ?>
                <div class="embed-container">
                    <?php echo $firstVideo; ?>
                </div>
            <?php } else { ?>
                <img src="<?php echo $firstImage['url']; ?>" alt="icon" />
            <?php } ?>
        </section>

        <section id="description">
            <?php echo get_field( 'first_section_description' ); ?>
        </section>
    </div>

<?php $centerImage = get_field( 'center_image' ); ?>
    <div id="center"
        <?php if($centerImage): ?>
            style="background: url(<?php echo $centerImage['url']; ?>)"
        <?php endif; ?>>

        <h2><?php echo get_field( 'center_title' ); ?></h2>
    </div>

    <div id="second">
        <section id="title">
            <?php echo get_field( 'second_section_title' ); ?>
        </section>

        <?php $secondImage = get_field( 'second_section_image' ); ?>
        <?php $secondVideo = get_field( 'second_section_video' ); ?>
        <section id="media">
            <?php if($firstVideo) { ?>
                <div class="embed-container">
                    <?php echo $secondVideo; ?>
                </div>
            <?php } else { ?>
                <img src="<?php echo $secondImage['url']; ?>" alt="icon" />
            <?php } ?>
        </section>

        <section id="description">
            <?php echo get_field( 'second_section_description' ); ?>
        </section>
    </div>

<?php do_action( 'foundationpress_after_content' ); ?>

    <!-- Insert Featured Property call here -->
<?php dynamic_sidebar( 'featured-property-widgets' ); ?>

<?php get_footer(); ?>