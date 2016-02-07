<?php
/*
Template Name: Secondary
*/
get_header(); ?>

<?php $heroImage = get_field( 'hero_image' ); ?>
    <header id="hero" role="banner"
        <?php if($heroImage): ?>
            style="background: #706259 url(<?php echo $heroImage['url']; ?>) no-repeat center"
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
            style="background: #706259 url(<?php echo $heroImageMobile['url']; ?>)"
        <?php endif; ?>>
        <div class="content-container">
            <h1><?php the_field( 'hero_title' ); ?></h1>
            <p><?php the_field( 'hero_introduction' ); ?></p>
            <?php the_field( 'sub_navigation' ); ?>
        </div>
    </header>

<?php do_action( 'foundationpress_before_content' ); ?>

    <div id="breadcrumbs" class="content-container">
        <?php if( function_exists('yoast_breadcrumb') ): ?>
            <?php {yoast_breadcrumb( '<p ', '</p>' );} ?>
        <?php endif; ?>
    </div>

    <div id="first">
        <section id="title">
            <h1><?php the_field( 'first_section_title' ); ?></h1>
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
                <p><?php the_field( 'first_section_description' ); ?></p>
            </section>
        <?php endif; ?>
    </div>

    <?php $centerImage = get_field( 'center_image' ); ?>
    <?php if($centerImage): ?>
        <div id="center"
            <?php if($centerImage): ?>
                style="background: #706259 url(<?php echo $centerImage['url']; ?>)"
            <?php endif; ?>>

            <div class="content-container">
                <h1><?php the_field( 'center_title' ); ?></h1>
            </div>
        </div>
    <?php endif; ?>

    <?php $secondImage = get_field('second_section_image'); ?>
    <?php $secondVideo = get_field( 'second_section_video' ); ?>
    <?php if($secondImage || $secondVideo): ?>
        <div id="second">
            <section id="title">
                <h1><?php the_field( 'second_section_title' ); ?></h1>
            </section>

            <section id="media">
                <?php if($secondVideo) { ?>
                    <?php echo $secondVideo; ?>
                <?php } else { ?>
                    <img src="<?php echo $secondImage['url']; ?>" alt="icon" />
                <?php } ?>
            </section>

            <section id="description">
                <p><?php the_field( 'second_section_description' ); ?></p>
            </section>
        </div>
    <?php endif; ?>

    <?php $thirdImage = get_field('third_section_image'); ?>
    <?php $thirdVideo = get_field( 'third_section_video' ); ?>
    <?php if($thirdImage || $thirdVideo): ?>
        <div id="third">
            <section id="title">
                <h1><?php the_field( 'third_section_title' ); ?></h1>
            </section>

            <section id="media">
                <?php if($thirdVideo) { ?>
                    <?php echo $thirdVideo; ?>
                <?php } else { ?>
                    <img src="<?php echo $thirdImage['url']; ?>" alt="icon" />
                <?php } ?>
            </section>

            <section id="description">
                <p><?php the_field( 'third_section_description' ); ?></p>
            </section>
        </div>
    <?php endif; ?>

    <?php $fourthImage = get_field('fourth_section_image'); ?>
    <?php $fourthVideo = get_field( 'fourth_section_video' ); ?>
    <?php if($fourthImage || $fourthVideo): ?>
        <div id="fourth">
            <section id="title">
                <h1><?php the_field( 'fourth_section_title' ); ?></h1>
            </section>

            <section id="media">
                <?php if($fourthVideo) { ?>
                    <?php echo $fourthVideo; ?>
                <?php } else { ?>
                    <img src="<?php echo $fourthImage['url']; ?>" alt="icon" />
                <?php } ?>
            </section>

            <section id="description">
                <p><?php the_field( 'fourth_section_description' ); ?></p>
            </section>
        </div>
    <?php endif; ?>

    <?php $fifthImage = get_field('fifth_section_image'); ?>
    <?php $fifthVideo = get_field( 'fifth_section_video' ); ?>
    <?php if($fifthImage || $fifthVideo): ?>
        <div id="fifth">
            <section id="title">
                <h1><?php the_field( 'fifth_section_title' ); ?></h1>
            </section>

            <section id="media">
                <?php if($fifthVideo) { ?>
                    <?php echo $fifthVideo; ?>
                <?php } else { ?>
                    <img src="<?php echo $fifthImage['url']; ?>" alt="icon" />
                <?php } ?>
            </section>

            <section id="description">
                <p><?php the_field( 'fifth_section_description' ); ?></p>
            </section>
        </div>
    <?php endif; ?>

    <?php /* Hole by Hole Repeater */ ?>
    <?php if( have_rows('hole_by_hole') ): ?>

        <div id="desktop-carousel" class="content-container">
            <?php /* Builds a carousel object for the front 9/back 9 tabs */ ?>
            <div id="sync3" class="owl-carousel owl-theme">
                <div class="item"><p>Front <span>9</span></p></div>
                <div class="item"><p>Back <span>9</span></p></div>
            </div>

            <?php /* Builds a carousel object for each hole's number */ ?>
            <?php $count = count( get_field('hole_by_hole') ); ?>
            <?php $holeNumber = 1; ?>
            <?php $preface = "0"; ?>
            <div id="sync2" class="owl-carousel owl-theme">
                <?php while( $count != 0 ): ?>
                    <div class="item">
                        <p>
                            <?php if( $holeNumber < 10 ):
                                echo $preface;
                            endif;
                            echo $holeNumber; ?>
                        </p>
                    </div>
                    <?php $count = $count - 1; ?>
                    <?php $holeNumber = $holeNumber + 1; ?>
                <?php endwhile; ?>
            </div>

            <?php /* Builds a carousel object for each hole */ ?>
            <div id="sync1" class="owl-carousel owl-theme">
                <?php while( have_rows('hole_by_hole') ): the_row();
                    $image = get_sub_field('image');
                    $video = get_sub_field('video'); ?>

                    <?php if($video) { ?>
                    <div class="item-video">
                        <a class="owl-video" href="<?php echo $video; ?>"></a>
                    <?php } else { ?>
                    <div class="item">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                    <?php } ?>

                        <div class="hole-information">
                            <div class="hole-title">
                                <?php $number = get_sub_field( 'number' ); ?>
                                <h5><span><?php if($number < 10) echo $preface ?><?php echo $number; ?>.&nbsp;</span><?php the_sub_field( 'title' ); ?></h5>
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
                    </div>
                <?php endwhile; ?>
            </div>

    <?php endif; /* Ends Hole by Hole Repeater */?>
        </div>

    <?php /* Membership Repeater */ ?>
    <?php if( have_rows('membership') ): ?>

    <?php $index = 0; ?>
    <?php $fieldDescriptionList = array(); ?>
    <?php $golfFullList = array(); ?>
    <?php $golfJuniorList = array(); ?>
    <?php $socialFullList = array(); ?>
    <?php $socialJuniorList = array(); ?>

    <?php while( have_rows('membership') ): the_row();
        $fieldDescriptionList[$index] = get_sub_field('field_description');
        $golfFullList[$index] = get_sub_field('golf_full');
        $golfJuniorList[$index] = get_sub_field('golf_junior');
        $socialFullList[$index] = get_sub_field('social_full');
        $socialJuniorList[$index] = get_sub_field('social_junior');
        $index += 1; ?>
    <?php endwhile; ?>

    <div class="content-container">
        <div class="membership-container">
            <ul class="field-description">
                <?php foreach ($fieldDescriptionList as $fieldDescription) : ?>
                    <li><?php echo $fieldDescription; ?></li>
                <?php endforeach; ?>
            </ul>

            <ul class="golf-full">
                <?php foreach ($golfFullList as $golfFull) : ?>
                    <li><?php echo $golfFull; ?></li>
                <?php endforeach; ?>
            </ul>

            <ul class="golf-junior">
                <?php foreach ($golfJuniorList as $golfJunior) : ?>
                    <li><?php echo $golfJunior; ?></li>
                <?php endforeach; ?>
            </ul>

            <ul class="social-full">
                <?php foreach ($socialFullList as $socialFull) : ?>
                    <li><?php echo $socialFull; ?></li>
                <?php endforeach; ?>
            </ul>

            <ul class="social-junior">
                <?php foreach ($socialJuniorList as $socialJunior) : ?>
                    <li><?php echo $socialJunior; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="membership-details">
            <?php the_field( 'terms_1' ); ?>
            <?php the_field( 'terms_2' ); ?>
            <?php the_field( 'membership_notes' ); ?>
        </div>
    </div>

    <?php endif; ?>
    <?php /* Ends Membership Repeater */ ?>

    <div class="content-container secondary-nav">
        <?php the_field( 'secondary_nav' ); ?>
    </div>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php dynamic_sidebar( 'featured-property-widgets' ); ?>

<?php get_footer(); ?>