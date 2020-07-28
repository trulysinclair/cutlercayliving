<?php
$prop_bed  = houzez_get_listing_data('property_bedrooms');
$prop_bed_label = ($prop_bed > 1) ? houzez_option('glc_beds', 'Beds') : houzez_option('glc_bed', 'Bed');

$output = '';
if ($prop_bed != '') {
	$output .= '<li id="testy" class="h-beds">';

	if (houzez_option('icons_type') == 'font-awesome') {
		$output .= '<i class="' . houzez_option('fa_bed') . ' mr-1"></i>';
	} elseif (houzez_option('icons_type') == 'custom') {
		$cus_icon = houzez_option('bed');
		if (!empty($cus_icon['url'])) {
			$output .= '<img class="img-fluid mr-1" src="' . esc_url($cus_icon['url']) . '" width="16" height="16" alt="' . esc_attr($cus_icon['title']) . '">';
		}
	} else {
		$output .= '<i class="houzez-icon icon-hotel-double-bed-1 mr-1"></i>';
	}

	$output .= '<span class="item-amenities-text">' . esc_attr($prop_bed_label) . ':</span> <span class="hz-figure">' . esc_attr($prop_bed) . '</span>';
	$output .= '</li>';

	$output .= '<script defer>' .
	'if (!window.propertyValues) {' .
		'console.log("Creating propertyValues");'.
		'window.propertyValues = new Map();' .
		'window.propertyValues.set("'.get_the_ID().'-bed", '.esc_attr($prop_bed).');' .
		'} else {' .
			'window.propertyValues.set("'.get_the_ID().'-bed", '.esc_attr($prop_bed).');' .
			'console.log(propertyValues.entries());'.
			'}'.
			'</script>';
	$output .= '<!-- TheGrimSilence: Set Global Property Values -->';
}
echo $output;
