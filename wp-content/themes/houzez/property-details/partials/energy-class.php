<?php
global $energy_class;

$energy_global_index = houzez_get_listing_data('energy_global_index');
$renewable_energy_index = houzez_get_listing_data('renewable_energy_global_index');
$energy_performance = houzez_get_listing_data('energy_performance');
$epc_current_rating = houzez_get_listing_data('epc_current_rating');
$epc_potential_rating = houzez_get_listing_data('epc_potential_rating');
$energy_array = array('A+', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');
?>
<ul class="class-energy-list list-unstyled">
	<li>
		<strong><?php echo houzez_option('spl_energetic_cls', 'Energetic class'); ?>:</strong> 
		<span><?php echo esc_attr($energy_class); ?></span>
	</li>
	<li>
		<strong><?php echo houzez_option('spl_energy_index', 'Global energy performance index'); ?>:</strong> 
		<span><?php echo esc_attr($energy_global_index); ?></span>
	</li>

	<?php if(!empty($renewable_energy_index)) { ?>
	<li>
		<strong><?php echo houzez_option('spl_energy_renew_index', 'Renewable energy performance index'); ?>:</strong> 
		<span><?php echo esc_attr($renewable_energy_index); ?></span>
	</li>
	<?php } ?>

	<?php if(!empty($energy_performance)) { ?>
	<li>
		<strong><?php echo houzez_option('spl_energy_build_performance', 'Energy performance of the building'); ?>:</strong> 
		<span><?php echo esc_attr($energy_performance); ?></span>
	</li>
	<?php } ?>

	<?php if(!empty($epc_current_rating)) { ?>
	<li>
		<strong><?php echo houzez_option('spl_energy_ecp_rating', 'EPC Current Rating'); ?>:</strong> 
		<span><?php echo esc_attr($epc_current_rating); ?></span>
	</li>
	<?php } ?>

	<?php if(!empty($epc_potential_rating)) { ?>
	<li>
		<strong><?php echo houzez_option('spl_energy_ecp_p', 'EPC Potential Rating'); ?>:</strong> 
		<span><?php echo esc_attr($epc_potential_rating); ?></span>
	</li>
	<?php } ?>
</ul>
<ul class="class-energy">
	<?php 
    foreach($energy_array as $energy) {
        $indicator_energy = '';
        if( $energy == $energy_class ) {
            $indicator_energy = '<div class="indicator-energy" data-energyclass="'.$energy_class.'">'.$energy_global_index.' | '.houzez_option('spl_energy_cls', 'Energy class').' '.$energy_class.'</div>';
        }
        echo '<li class="class-energy-indicator">
            '.$indicator_energy.'
            <span class="energy-'.$energy.'">'.$energy.'</span>
        </li>';
    }
    ?>
</ul>