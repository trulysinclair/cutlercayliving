<div class="form-group">
	<select name="states[]" data-target="houzezThirdList" data-size="5" class="houzezSelectFilter houzezStateFilter houzezSecondList selectpicker <?php houzez_ajax_search(); ?> houzez-state-js form-control bs-select-hidden" title="<?php echo houzez_option('srh_states', 'All States'); ?>" data-live-search="true">
		<?php
        $state = isset($_GET['states']) ? $_GET['states'] : array();

        echo '<option value="">'.houzez_option('srh_states', 'All States').'</option>';

        houzez_get_search_taxonomies('property_state', $state );

		?>
	</select><!-- selectpicker -->
</div><!-- form-group -->