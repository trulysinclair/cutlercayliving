<?php
$prop_bath  = houzez_get_listing_data('property_bathrooms');
$prop_bath_label = ($prop_bath > 1 ) ? houzez_option('glc_baths', 'Baths') : houzez_option('glc_bath', 'Bath');

$output = '';
if( $prop_bath != '' ) {
	$output .= '<li class="h-baths">';
		if(houzez_option('icons_type') == 'font-awesome') {
			$output .= '<i class="'.houzez_option('fa_bath').' mr-1"></i>';

		} elseif (houzez_option('icons_type') == 'custom') {
			$cus_icon = houzez_option('bath');
			if(!empty($cus_icon['url'])) {
				$output .= '<img class="img-fluid mr-1" src="'.esc_url($cus_icon['url']).'" width="16" height="16" alt="'.esc_attr($cus_icon['title']).'">';
			}
		} else {
			$output .= '<i class="houzez-icon icon-bathroom-shower-1 mr-1"></i>';
		}
		$output .= '<span class="item-amenities-text">'.esc_attr($prop_bath_label).':</span> <span class="hz-figure">'.esc_attr($prop_bath).'</span>';
	$output .= '</li>';

	$output .= '<script defer>' .
	'if (!window.propertyValues) {' .
		'console.log("Creating propertyValues");'.
		'window.propertyValues = new Map();' .
		'window.propertyValues.set("'.get_the_ID().'-bath", '.esc_attr($prop_bath).');' .
		'} else {' .
			'window.propertyValues.set("'.get_the_ID().'-bath", '.esc_attr($prop_bath).');' .
			'console.log(propertyValues.entries());'.
			'}'.
			'</script>';
	$output .= '<!-- TheGrimSilence: Set Global Property Values -->';
}
echo $output;
