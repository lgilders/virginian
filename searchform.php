<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

do_action( 'foundationpress_before_searchform' ); ?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div id="label"><label for="search-terms" id="search-label" class="fa fa-search"></label></div>
	<?php do_action( 'foundationpress_searchform_top' ); ?>
	<div id="input"><input type="text" name="search-terms" id="search-terms" placeholder="<?php esc_attr_e( 'Search', 'foundationpress' ); ?>"></div>
</form>
<?php do_action( 'foundationpress_after_searchform' ); ?>
