<?php
$address = houzez_get_listing_data('property_map_address');
if(!empty($address) && houzez_option('disable_address', 1)) {
	echo '<address id="details-old" class="item-address"><i class="houzez-icon icon-pin mr-1"></i>'.esc_attr($address).'</address>';
}
