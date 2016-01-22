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

<?php if( function_exists('yoast_breadcrumb') ): ?>
    <?php {yoast_breadcrumb( '<p id="breadcrumbs" ', '</p>' );} ?>
<?php endif; ?>

    <div id="first">
        <section id="title">
            <h1><?php echo get_field( 'first_section_title' ); ?></h1>
        </section>

        <?php $firstImage = get_field( 'first_section_image' ); ?>
        <?php $firstVideo = get_field( 'first_section_video' ); ?>
        <?php if($firstImage || $firstVideo): ?>
            <section id="media">
                <?php if($firstVideo) { ?>
                    <?php echo $firstVideo; ?>
                <?php } else { ?>
                    <img src="<?php echo $firstImage['url']; ?>" alt="icon" />
                <?php } ?>
            </section>

            <section id="description">
                <p><?php echo get_field( 'first_section_description' ); ?></p>
            </section>
        <?php endif; ?>
    </div>

    <?php $centerImage = get_field( 'center_image' ); ?>
    <?php if($centerImage): ?>
        <div id="center"
            <?php if($centerImage): ?>
                style="background: url(<?php echo $centerImage['url']; ?>)"
            <?php endif; ?>>

            <h2><?php echo get_field( 'center_title' ); ?></h2>
        </div>
    <?php endif; ?>

    <?php $secondImage = get_field('second_section_image'); ?>
    <?php if($secondImage): ?>
        <div id="second">
            <section id="title">
                <h1><?php echo get_field( 'second_section_title' ); ?></h1>
            </section>

            <?php $secondVideo = get_field( 'second_section_video' ); ?>
            <section id="media">
                <?php if($secondVideo) { ?>
                    <?php echo $secondVideo; ?>
                <?php } else { ?>
                    <img src="<?php echo $secondImage['url']; ?>" alt="icon" />
                <?php } ?>
            </section>

            <section id="description">
                <p><?php echo get_field( 'second_section_description' ); ?></p>
            </section>
        </div>
    <?php endif; ?>

    <?php /* Hole by Hole Repeater */ ?>
    <?php if( have_rows('hole_by_hole') ): ?>
        <div class="owl-carousel">
            <?php while( have_rows('hole_by_hole') ): the_row();
                $image = get_sub_field('image'); ?>

                <div class="item">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

                    <div class="hole-title">
                        <h5><span><?php the_sub_field( 'number' );?>.&nbsp;</span><?php the_sub_field( 'title' ); ?></h5>
                    </div>

                    <p class="description"><?php the_sub_field('description'); ?></p>

                    <div class="hole-details">
                        <ul>
                            <li>Par&nbsp;<span><?php the_sub_field( 'par' ); ?></span></li>
                            <li><span><?php the_sub_field( 'yards' ); ?></span>&nbsp;Yards</li>
                            <li>Handicap&nbsp;<span><?php the_sub_field( 'handicap' ); ?></span></li>
                        </ul>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

    <?php echo get_field( 'secondary_nav' ); ?>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php dynamic_sidebar( 'featured-property-widgets' ); ?>

<?php get_footer(); ?>