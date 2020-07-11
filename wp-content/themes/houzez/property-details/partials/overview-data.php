<?php
global $top_area;
$prop_size 	= houzez_get_listing_data('property_size');
$land_area 	= houzez_get_listing_data('property_land');
$bedrooms 	= houzez_get_listing_data('property_bedrooms');
$bathrooms 	= houzez_get_listing_data('property_bathrooms');
$year_built = houzez_get_listing_data('property_year');
$garage 	= houzez_get_listing_data('property_garage');

$property_status = houzez_taxonomy_simple('property_status');
$property_type = houzez_taxonomy_simple('property_type');
$prop_id 	= houzez_get_listing_data('property_id');

if(!empty($property_type)) {
	echo '<ul class="list-unstyled flex-fill">
			<li><strong>'.esc_attr( $property_type ).'</strong></li>
			<li class="property-overview-type">'.houzez_option('spl_prop_type', 'Property Type').'</li>
			
		</ul>';
}

if($top_area == 'v6' && !wp_is_mobile()) {
	if(!empty($prop_id)) {
		echo '<ul class="list-unstyled flex-fill">
				<li class="property-overview-item">
					<strong>'.houzez_propperty_id_prefix($prop_id).'</strong> 
				</li>
				<li class="h-prop-id">'.houzez_option('spl_prop_id', 'Property ID').'</li>
			</ul>';
	}
}

if(!empty($bedrooms)) {

	$bedrooms_label = ($bedrooms > 1 ) ? houzez_option('spl_bedrooms', 'Bedrooms') : houzez_option('spl_bedroom', 'Bedroom');

	$output_beds = "";
	$output_beds .='<ul class="list-unstyled flex-fill">';
			$output_beds .='<li class="property-overview-item">';
				
				if(houzez_option('icons_type') == 'font-awesome') {
					$output_beds .= '<i class="'.houzez_option('fa_bed').' mr-1"></i> ';

				} elseif (houzez_option('icons_type') == 'custom') {
					$cus_icon = houzez_option('bed');
					if(!empty($cus_icon['url'])) {
						$output_beds .= '<img class="img-fluid mr-1" src="'.esc_url($cus_icon['url']).'" width="16" height="16" alt="'.esc_attr($cus_icon['title']).'"> ';
					}
				} else {
					$output_beds .= '<i class="houzez-icon icon-hotel-double-bed-1 mr-1"></i> ';
				}

				$output_beds .='<strong>'.esc_attr( $bedrooms ).'</strong> ';
			$output_beds .='</li>';
			$output_beds .='<li class="h-beds">'.esc_attr($bedrooms_label).'</li>';
	$output_beds .='</ul>';

	echo $output_beds;	
}

if(!empty($bathrooms)) {

	$bath_label = ($bathrooms > 1 ) ? houzez_option('spl_bathrooms', 'Bathrooms') : houzez_option('spl_bathroom', 'Bathroom');

	$output_bath = '';
	$output_bath .= '<ul class="list-unstyled flex-fill">';
			$output_bath .= '<li class="property-overview-item">';
				
				if(houzez_option('icons_type') == 'font-awesome') {
					$output_bath .= '<i class="'.houzez_option('fa_bath').' mr-1"></i> ';

				} elseif (houzez_option('icons_type') == 'custom') {
					$cus_icon = houzez_option('bath');
					if(!empty($cus_icon['url'])) {
						$output_bath .= '<img class="img-fluid mr-1" src="'.esc_url($cus_icon['url']).'" width="16" height="16" alt="'.esc_attr($cus_icon['title']).'"> ';
					}
				} else {
					$output_bath .= '<i class="houzez-icon icon-bathroom-shower-1 mr-1"></i> ';
				}

				$output_bath .= '<strong>'.esc_attr($bathrooms).'</strong>';
			$output_bath .= '</li>';
			$output_bath .= '<li class="h-baths">'.esc_attr($bath_label).'</li>';
		$output_bath .= '</ul>';

	echo $output_bath;
}

if($garage != "") {

	$garage_label = ($garage > 1 ) ? houzez_option('spl_garages', 'Garages') : houzez_option('spl_garage', 'Garage');

	$output_garage = '';
	$output_garage .= '<ul class="list-unstyled flex-fill">';
		$output_garage .= '<li class="property-overview-item">';
			
			if(houzez_option('icons_type') == 'font-awesome') {
				$output_garage .= '<i class="'.houzez_option('fa_garage').' mr-1"></i> ';

			} elseif (houzez_option('icons_type') == 'custom') {
				$cus_icon = houzez_option('garage');
				if(!empty($cus_icon['url'])) {
					$output_garage .= '<img class="img-fluid mr-1" src="'.esc_url($cus_icon['url']).'" width="16" height="16" alt="'.esc_attr($cus_icon['title']).'"> ';
				}
			} else {
				$output_garage .= '<i class="houzez-icon icon-car-1 mr-1"></i> ';
			}

			$output_garage .= '<strong>'.esc_attr($garage).'</strong>';
		$output_garage .= '</li>';
		$output_garage .= '<li class="h-area">'.esc_attr($garage_label).'</li>';
	$output_garage .= '</ul>';

	echo $output_garage;
}

if(!empty( $prop_size )) {

	$output_size = "";
	$output_size .= '<ul class="list-unstyled flex-fill">';
		$output_size .= '<li class="property-overview-item">';
			
			if(houzez_option('icons_type') == 'font-awesome') {
				$output_size .= '<i class="'.houzez_option('fa_area-size').' mr-1"></i> ';

			} elseif (houzez_option('icons_type') == 'custom') {
				$cus_icon = houzez_option('area-size');
				if(!empty($cus_icon['url'])) {
					$output_size .= '<img class="img-fluid mr-1" src="'.esc_url($cus_icon['url']).'" width="16" height="16" alt="'.esc_attr($cus_icon['title']).'"> ';
				}
			} else {
				$output_size .= '<i class="houzez-icon icon-real-estate-dimensions-plan-1 mr-1"></i> ';
			}
			
			$output_size .= '<strong>'.houzez_get_listing_area_size( get_the_ID() ).'</strong>';
		$output_size .= '</li>';
		$output_size .= '<li class="h-area">'.houzez_get_listing_size_unit( get_the_ID() ).'</li>';
	$output_size .= '</ul>';

	echo $output_size;
}

if(!empty($land_area)) {

	$output_land = '';	
	$output_land .= '<ul class="list-unstyled flex-fill">';
		$output_land .= '<li class="property-overview-item">';
			
			if(houzez_option('icons_type') == 'font-awesome') {
				$output_land .= '<i class="'.houzez_option('fa_land-area').' mr-1"></i> ';

			} elseif (houzez_option('icons_type') == 'custom') {
				$cus_icon = houzez_option('land-area');
				if(!empty($cus_icon['url'])) {
					$output_land .= '<img class="img-fluid mr-1" src="'.esc_url($cus_icon['url']).'" width="16" height="16" alt="'.esc_attr($cus_icon['title']).'"> ';
				}
			} else {
				$output_land .= '<i class="houzez-icon icon-real-estate-dimensions-map mr-1"></i> ';
			}

			$output_land .= '<strong>'.houzez_get_land_area_size( get_the_ID() ).'</strong>';
		$output_land .= '</li>';
		$output_land .= '<li class="h-land">'.houzez_option('spl_lot', 'Lot').' '.houzez_get_land_size_unit( get_the_ID() ).'</li>';
	$output_land .= '</ul>';

	echo $output_land;
}

if(!empty( $year_built )) {

	$output_year = '';
	$output_year .= '<ul class="list-unstyled flex-fill">';
		$output_year .= '<li class="property-overview-item">';
			
			if(houzez_option('icons_type') == 'font-awesome') {
				$output_year .= '<i class="'.houzez_option('fa_year-built').' mr-1"></i> ';

			} elseif (houzez_option('icons_type') == 'custom') {
				$cus_icon = houzez_option('year-built');
				if(!empty($cus_icon['url'])) {
					$output_year .= '<img class="img-fluid mr-1" src="'.esc_url($cus_icon['url']).'" width="16" height="16" alt="'.esc_attr($cus_icon['title']).'"> ';
				}
			} else {
				$output_year .= '<i class="houzez-icon icon-calendar-3 mr-1"></i> ';
			}

			$output_year .= '<strong>'.esc_attr( $year_built ).'</strong>';
		$output_year .= '</li>';
		$output_year .= '<li class="h-year-built">'.houzez_option('spl_year_built', 'Year Built').'</li>';
	$output_year .= '</ul>';

	echo $output_year;
}