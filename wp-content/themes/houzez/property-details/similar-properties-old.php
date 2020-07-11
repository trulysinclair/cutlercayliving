<?php
$show_similer = houzez_option( 'houzez_similer_properties' );
$similer_type = houzez_option( 'houzez_similer_properties_type' );
$listing_view = houzez_option( 'houzez_similer_properties_view' );
$similer_count = houzez_option( 'houzez_similer_properties_count' );

$similer_type = houzez_option('testing', array( 'property_type', 'property_city' ));

print_r($similer_type);

$wrap_class = $item_layout = $view_class = $cols_in_row = '';
if($listing_view == 'list-view-v1') {
    $wrap_class = 'listing-v1';
    $item_layout = 'v1';
    $view_class = 'list-view';

} elseif($listing_view == 'grid-view-v1') {
    $wrap_class = 'listing-v1';
    $item_layout = 'v1';
    $view_class = 'grid-view';

} elseif($listing_view == 'list-view-v2') {
    $wrap_class = 'listing-v2';
    $item_layout = 'v2';
    $view_class = 'list-view';

} elseif($listing_view == 'grid-view-v2') {
    $wrap_class = 'listing-v2';
    $item_layout = 'v2';
    $view_class = 'grid-view';

} elseif($listing_view == 'grid-view-v3') {
    $wrap_class = 'listing-v3';
    $item_layout = 'v3';
    $view_class = 'grid-view';
    $have_switcher = false;

} elseif($listing_view == 'grid-view-v4') {
    $wrap_class = 'listing-v4';
    $item_layout = 'v4';
    $view_class = 'grid-view';
    $have_switcher = false;

} elseif($listing_view == 'list-view-v5') {
    $wrap_class = 'listing-v5';
    $item_layout = 'v5';
    $view_class = 'list-view';

} elseif($listing_view == 'grid-view-v5') {
    $wrap_class = 'listing-v5';
    $item_layout = 'v5';
    $view_class = 'grid-view';

} elseif($listing_view == 'grid-view-v6') {
    $wrap_class = 'listing-v6';
    $item_layout = 'v6';
    $view_class = 'grid-view';
    $have_switcher = false;

} else {
    $wrap_class = 'listing-v1';
    $item_layout = 'v1';
    $view_class = 'grid-view';
}

if( $show_similer ) {

	$term_ids = Array ();
	$city_ids = Array ();
	$terms = get_the_terms(get_the_ID(), $similer_type, 'string');

	$prop_city = '';
	if( taxonomy_exists('property_city') ) {
		$prop_city = get_the_terms( get_the_ID(), 'property_city', 'string' );
	}

	if ( !empty( $terms ) ) :

		$term_ids = wp_list_pluck($terms, 'term_id');

	endif;

	if ( !empty( $prop_city ) ) :

		$city_ids = wp_list_pluck( $prop_city, 'term_id' );

	endif;

	$tax_query = Array ();

	$tax_query[] = array(
		'taxonomy' => $similer_type,
		'field' => 'id',
		'terms' => $term_ids,
		'operator' => 'IN' //Or 'AND' or 'NOT IN'
	);


	$tax_count = count( $tax_query );

	if ($tax_count > 1) :

        $tax_query['relation'] = 'AND';

    endif;

	$second_query = array(
		'post_type' => 'property',
		'tax_query' => $tax_query,
		'posts_per_page' => $similer_count,
		'orderby' => 'rand',
		'post__not_in' => array(get_the_ID()),
		'post_status' => 'publish'
	);

	$wp_query = new WP_Query($second_query);

	if ($wp_query->have_posts()) : ?>
		<div id="similar-listings-wrap" class="similar-property-wrap <?php echo esc_attr($wrap_class); ?>">
			<div class="block-title-wrap">
				<h2><?php echo houzez_option('sps_similar_listings', 'Similar Listings'); ?></h2>
			</div><!-- block-title-wrap -->
			<div class="listing-view <?php echo esc_attr($view_class); ?> card-deck">
				<?php
				while ($wp_query->have_posts()) : $wp_query->the_post();

					get_template_part('template-parts/listing/item', $item_layout);

				endwhile;
				?> 
			</div><!-- listing-view -->
		</div><!-- similar-property-wrap -->
	<?php
	endif;
	wp_reset_query();
}?>