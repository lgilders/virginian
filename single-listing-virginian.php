<?php
/**
Single Listing Template: Virginian
Description: Single Real Estate Listing
*/

add_action('wp_enqueue_scripts', 'enqueue_single_listing_scripts');
function enqueue_single_listing_scripts() {
	wp_enqueue_style( 'wp-listings-single' );
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_script( 'jquery-validate', array('jquery'), true, true );
	wp_enqueue_script( 'fitvids', array('jquery'), true, true );
	wp_enqueue_script( 'wp-listings-single', array('jquery, jquery-ui-tabs', 'jquery-validate'), true, true );
}

/** Set DNS Prefetch to improve performance on single listings templates */
add_filter('wp_head','wp_listings_dnsprefetch', 0);
function wp_listings_dnsprefetch() {
    echo "\n<link rel='dns-prefetch' href='//maxcdn.bootstrapcdn.com' />\n"; // Loads FontAwesome
    echo "<link rel='dns-prefetch' href='//cdnjs.cloudflare.com' />\n"; // Loads FitVids
}

function single_listing_post_content() {

	global $post;

	?>

	<div itemscope itemtype="http://schema.org/SingleFamilyResidence" class="entry-content wplistings-single-listing">

		<div class="listing-image-wrap">
			<?php echo '<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">'. get_the_post_thumbnail( $post->ID, 'listings-full', array('class' => 'single-listing-image', 'itemprop'=>'contentUrl') ) . '</div>';
			if ( '' != wp_listings_get_status() ) {
				printf( '<span class="listing-status %s">%s</span>', strtolower(str_replace(' ', '-', wp_listings_get_status())), wp_listings_get_status() );
			}
			if ( '' != get_post_meta( $post->ID, '_listing_open_house', true ) ) {
				printf( '<span class="listing-open-house">Open House: %s</span>', get_post_meta( $post->ID, '_listing_open_house', true ) );
			} ?>
		</div><!-- .listing-image-wrap -->

		<div id="listing-tabs" class="listing-data">

			<ul>
				<li><a href="#listing-description">Description</a></li>

				<li><a href="#listing-details">Details</a></li>


				<?php if (get_post_meta( $post->ID, '_listing_gallery', true) != '') { ?>
					<li><a href="#listing-gallery">Photos</a></li>
				<?php } ?>

				<?php if (get_post_meta( $post->ID, '_listing_video', true) != '') { ?>
					<li><a href="#listing-video">Video</a></li>
				<?php } ?>

				<?php if (get_post_meta( $post->ID, '_listing_school_neighborhood', true) != '') { ?>
				<li><a href="#listing-school-neighborhood">Schools &amp; Neighborhood</a></li>
				<?php } ?>
			</ul>

			<div id="listing-description" itemprop="description">
				<?php the_content( __( 'View more <span class="meta-nav">&rarr;</span>', 'wp_listings' ) );

				echo (get_post_meta($post->ID, '_listing_featured_on', true)) ? '<p class="wp_listings_featured_on">' . get_post_meta($post->ID, '_listing_featured_on', true) . '</p>' : '';

				echo (get_post_meta($post->ID, '_listing_disclaimer', true)) ? '<p class="wp_listings_disclaimer">' . get_post_meta($post->ID, '_listing_disclaimer', true) . '</p>' : '';
				echo (get_post_meta($post->ID, '_listing_courtesy', true)) ? '<p class="wp_listings_courtesy">' . get_post_meta($post->ID, '_listing_courtesy', true) . '</p>' : '';

				?>
			</div><!-- #listing-description -->

			<div id="listing-details">
				<?php
					$details_instance = new WP_Listings();

					$pattern = '<tr class="wp_listings%s"><td class="label">%s</td><td>%s</td></tr>';

					echo '<table class="listing-details">';

                    echo '<tbody class="left">';
                    if ( get_post_meta($post->ID, '_listing_hide_price', true) == 1 ) {
                    	echo (get_post_meta($post->ID, '_listing_price_alt', true)) ? '<tr class="wp_listings_listing_price"><td class="label">' . __('Price:', 'wp_listings') . '</td><td>'.get_post_meta( $post->ID, '_listing_price_alt', true) .'</td></tr>' : '';
                	} else {
                    	echo (get_post_meta($post->ID, '_listing_price', true)) ? '<tr class="wp_listings_listing_price"><td class="label">' . __('Price:', 'wp_listings') . '</td><td>'.get_post_meta( $post->ID, '_listing_price', true) .'</td></tr>' : '';
                	}
                    echo '<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
                    echo (get_post_meta($post->ID, '_listing_address', true)) ? '<tr class="wp_listings_listing_address"><td class="label">' . __('Address:', 'wp_listings') . '</td><td itemprop="streetAddress">'.get_post_meta( $post->ID, '_listing_address', true) .'</td></tr>' : '';
                    echo (get_post_meta($post->ID, '_listing_city', true)) ? '<tr class="wp_listings_listing_city"><td class="label">' . __('City:', 'wp_listings') . '</td><td itemprop="addressLocality">'.get_post_meta( $post->ID, '_listing_city', true) .'</td></tr>' : '';
                    echo (get_post_meta($post->ID, '_listing_state', true)) ? '<tr class="wp_listings_listing_state"><td class="label">' . __('State:', 'wp_listings') . '</td><td itemprop="addressRegion">'.get_post_meta( $post->ID, '_listing_state', true) .'</td></tr>' : '';
                    echo (get_post_meta($post->ID, '_listing_zip', true)) ? '<tr class="wp_listings_listing_zip"><td class="label">' . __('Zip Code:', 'wp_listings') . '</td><td itemprop="postalCode">'.get_post_meta( $post->ID, '_listing_zip', true) .'</td></tr>' : '';
                    echo '</div>';
                    echo (get_post_meta($post->ID, '_listing_mls', true)) ? '<tr class="wp_listings_listing_mls"><td class="label">MLS:</td><td>'.get_post_meta( $post->ID, '_listing_mls', true) .'</td></tr>' : '';
                    echo '</tbody>';

					echo '<tbody class="right">';
					foreach ( (array) $details_instance->property_details['col2'] as $label => $key ) {
						$detail_value = esc_html( get_post_meta($post->ID, $key, true) );
						if (! empty( $detail_value ) ) :
							printf( $pattern, $key, esc_html( $label ), $detail_value );
						endif;
					}
					echo '</tbody>';

					echo '</table>';

					echo '<table class="listing-details extended">';
					echo '<tbody class="left">';
					foreach ( (array) $details_instance->extended_property_details['col1'] as $label => $key ) {
						$detail_value = esc_html( get_post_meta($post->ID, $key, true) );
						if (! empty( $detail_value ) ) :
							printf( $pattern, $key, esc_html( $label ), $detail_value );
						endif;
					}
					echo '</tbody>';
					echo '<tbody class="right">';
					foreach ( (array) $details_instance->extended_property_details['col2'] as $label => $key ) {
						$detail_value = esc_html( get_post_meta($post->ID, $key, true) );
						if (! empty( $detail_value ) ) :
							printf( $pattern, $key, esc_html( $label ), $detail_value );
						endif;
					}
					echo '</tbody>';
					echo '</table>';

				if(get_the_term_list( get_the_ID(), 'features', '<li>', '</li><li>', '</li>' ) != null) {
					echo '<h5>' . __('Tagged Features:', 'wp_listings') . '</h5><ul class="tagged-features">';
					echo get_the_term_list( get_the_ID(), 'features', '<li>', '</li><li>', '</li>' );
					echo '</ul><!-- .tagged-features -->';

				} ?>

			</div><!-- #listing-details -->

			<?php if (get_post_meta( $post->ID, '_listing_gallery', true) != '') { ?>
			<div id="listing-gallery">
				<?php echo do_shortcode(get_post_meta( $post->ID, '_listing_gallery', true)); ?>
			</div><!-- #listing-gallery -->
			<?php } ?>

			<?php if (get_post_meta( $post->ID, '_listing_video', true) != '') { ?>
			<div id="listing-video">
				<div class="iframe-wrap">
				<?php echo get_post_meta( $post->ID, '_listing_video', true); ?>
				</div>
			</div><!-- #listing-video -->
			<?php } ?>

		</div><!-- #listing-tabs.listing-data -->

        <?php
        $listing_meta = sprintf( '<ul class="listing-meta">');

        if ( get_post_meta($post->ID, '_listing_hide_price', true) == 1 ) {
            $listing_meta .= (get_post_meta($post->ID, '_listing_price_alt', true)) ? sprintf( '<li class="listing-price">%s</li>', get_post_meta( $post->ID, '_listing_price_alt', true ) ) : '';
        } else {
            $listing_meta .= sprintf( '<li class="listing-price">%s</li>', get_post_meta( $post->ID, '_listing_price', true ) );
        }

        if ( '' != wp_listings_get_property_types() ) {
            $listing_meta .= sprintf( '<li class="listing-property-type"><span class="label">Property Type: </span>%s</li>', get_the_term_list( get_the_ID(), 'property-types', '', ', ', '' ) );
        }

        if ( '' != wp_listings_get_locations() ) {
            $listing_meta .= sprintf( '<li class="listing-location"><span class="label">Location: </span>%s</li>', get_the_term_list( get_the_ID(), 'locations', '', ', ', '' ) );
        }

        if ( '' != get_post_meta( $post->ID, '_listing_bedrooms', true ) ) {
            $listing_meta .= sprintf( '<li class="listing-bedrooms"><span class="label">Beds: </span>%s</li>', get_post_meta( $post->ID, '_listing_bedrooms', true ) );
        }

        if ( '' != get_post_meta( $post->ID, '_listing_bathrooms', true ) ) {
            $listing_meta .= sprintf( '<li class="listing-bathrooms"><span class="label">Baths: </span>%s</li>', get_post_meta( $post->ID, '_listing_bathrooms', true ) );
        }

        if ( '' != get_post_meta( $post->ID, '_listing_sqft', true ) ) {
            $listing_meta .= sprintf( '<li class="listing-sqft"><span class="label">Sq Ft: </span>%s</li>', get_post_meta( $post->ID, '_listing_sqft', true ) );
        }

        if ( '' != get_post_meta( $post->ID, '_listing_lot_sqft', true ) ) {
            $listing_meta .= sprintf( '<li class="listing-lot-sqft"><span class="label">Lot Sq Ft: </span>%s</li>', get_post_meta( $post->ID, '_listing_lot_sqft', true ) );
        }

        $listing_meta .= sprintf( '</ul>');

        echo $listing_meta;

        ?>

		<?php
			if (get_post_meta( $post->ID, '_listing_map', true) != '') {
				echo '<div id="listing-map"><h4>Location Map</h4>';
				echo do_shortcode(get_post_meta( $post->ID, '_listing_map', true) );
				echo '</div><!-- .listing-map -->';
			}
			elseif(get_post_meta( $post->ID, '_listing_latitude', true) && get_post_meta( $post->ID, '_listing_longitude', true) && get_post_meta( $post->ID, '_listing_automap', true) == 'y') {

				$map_info_content = sprintf('<p style="font-size: 14px; margin-bottom: 0;">%s<br />%s %s, %s</p>', get_post_meta( $post->ID, '_listing_address', true), get_post_meta( $post->ID, '_listing_city', true), get_post_meta( $post->ID, '_listing_state', true), get_post_meta( $post->ID, '_listing_zip', true));

				echo '<script src="https://maps.googleapis.com/maps/api/js"></script>
				<script>
					function initialize() {
						var mapCanvas = document.getElementById(\'map-canvas\');
						var myLatLng = new google.maps.LatLng(' . get_post_meta( $post->ID, '_listing_latitude', true) . ', ' . get_post_meta( $post->ID, '_listing_longitude', true) . ')
						var mapOptions = {
							center: myLatLng,
							zoom: 14,
							mapTypeId: google.maps.MapTypeId.ROADMAP
					    }

					    var marker = new google.maps.Marker({
						    position: myLatLng,
						    icon: \'//s3.amazonaws.com/ae-plugins/wp-listings/images/active.png\'
						});
						
						var infoContent = \' ' . $map_info_content . ' \';

						var infowindow = new google.maps.InfoWindow({
							content: infoContent
						});

					    var map = new google.maps.Map(mapCanvas, mapOptions);

					    marker.setMap(map);

					    infowindow.open(map, marker);
					}
					google.maps.event.addDomListener(window, \'load\', initialize);
				</script>
				';
				echo '<div id="listing-map"><h3>Location Map</h3><div id="map-canvas" style="width: 100%; height: 350px;"></div></div><!-- .listing-map -->';
			}
		?>

        <div id="listing-contact" <?php if(!function_exists('aeprofiles_connected_agents_markup')): ?> >
            <h4>Listing Inquiry</h4>

            <?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="true" tabindex="20" html_id="realestate_form"]'); ?>
            <script type="text/javascript">
                var __ss_noform = __ss_noform || [];
                __ss_noform.push(['baseURI', 'https://app-N24YKLWU.marketingautomation.services/webforms/receivePostback/MzQxMze2NAYA/']);
                __ss_noform.push(['form', 'gform_4', '7fe11301-348c-483b-98af-35c333964afc']); //real estate
            </script>
            <script type="text/javascript" src="https://koi-N24YKLWU.marketingautomation.services/client/noform.js?ver=1.24"></script>
        </div><!-- .listing-contact -->
        <?php endif; ?>


        <?php
        if (function_exists('_p2p_init') && function_exists('agent_profiles_init') ) {
            echo'<div id="listing-agent">
				<div class="connected-agents">';
            aeprofiles_connected_agents_markup();
            echo '</div></div><!-- .listing-agent -->';
        }
        ?>

	</div><!-- .entry-content -->

<?php
}

if (function_exists('equity')) {

	remove_action( 'equity_entry_header', 'equity_post_info', 12 );
	remove_action( 'equity_entry_footer', 'equity_post_meta' );

	remove_action( 'equity_entry_content', 'equity_do_post_content' );
	add_action( 'equity_entry_content', 'single_listing_post_content' );

	equity();

} elseif (function_exists('genesis_init')) {

	remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 ); // HTML5
	remove_action( 'genesis_before_post_content', 'genesis_post_info' ); // XHTML
	remove_action( 'genesis_entry_footer', 'genesis_post_meta' ); // HTML5
	remove_action( 'genesis_after_post_content', 'genesis_post_meta' ); // XHTML
	remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 ); // HTML5
	remove_action( 'genesis_after_post', 'genesis_do_author_box_single' ); // XHTML

	remove_action( 'genesis_entry_content', 'genesis_do_post_content' ); // HTML5
	remove_action( 'genesis_post_content', 'genesis_do_post_content' ); // XHTML
	add_action( 'genesis_entry_content', 'single_listing_post_content' ); // HTML5
	add_action( 'genesis_post_content', 'single_listing_post_content' ); // XHTML

	genesis();

} else {

get_header(); ?>

    <div id="primary" class="content-area container inner">

        <div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>
					</header><!-- .entry-header -->

				<?php single_listing_post_content(); ?>

				</article><!-- #post-ID -->

			<?php
				// Previous/next post navigation.
				wp_listings_post_nav();

				endwhile;
			?>

		</div><!-- #content -->

	</div><!-- #primary -->

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

<?php
get_footer();

}