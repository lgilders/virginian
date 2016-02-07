<?php
/*
* Custom url parameters for search values used on search results page
*/
?>

<?php
$vars = array("property-types", "neighborhood", "bedrooms", "square-footage", "price");

function custom_add_query_vars_filter( $vars ){
    $vars[] = "listings-group";
    return $vars;
}

add_filter( 'query_vars', 'custom_add_query_vars_filter' );