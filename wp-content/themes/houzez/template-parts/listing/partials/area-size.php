<?php
$propID = get_the_ID();
$prop_size = houzez_get_listing_data('property_size');
$listing_area_size = houzez_get_listing_area_size( $propID );
$listing_size_unit = houzez_get_listing_size_unit( $propID );

$output = '';
if( !empty( $listing_area_size ) ) {
	$output .= '<li class="h-area">';
		if(houzez_option('icons_type') == 'font-awesome') {
			$output .= '<i class="'.houzez_option('fa_area-size').' mr-1"></i>';

		} elseif (houzez_option('icons_type') == 'custom') {
			$cus_icon = houzez_option('area-size');
			if(!empty($cus_icon['url'])) {
				$output .= '<img class="img-fluid mr-1" src="'.esc_url($cus_icon['url']).'" width="16" height="16" alt="'.esc_attr($cus_icon['title']).'">';
			}
		} else {
			$output .= '<i class="houzez-icon icon-ruler-triangle mr-1"></i>';
		}
		
		$output .= '<span class="hz-figure">'.esc_attr($listing_area_size).'</span> <span class="area_postfix">'.esc_attr($listing_size_unit).'</span>';
	$output .= '</li>';

	$output .= '<script defer>' .
	'if (!window.propertyValues) {' .
		'console.log("Creating propertyValues");'.
		'window.propertyValues = new Map();' .
		'window.propertyValues.set("'.get_the_ID().'-area", '.esc_attr($listing_area_size).');' .
		'} else {' .
			'window.propertyValues.set("'.get_the_ID().'-area", '.esc_attr($listing_area_size).');' .
			'console.log(propertyValues.entries());'.
			'}'.
			'</script>';
	$output .= '<!-- TheGrimSilence: Set Global Property Values -->';
}
echo $output;
