<div class="form-group">
	<select name="status[]" data-size="5" class="selectpicker status-js <?php houzez_ajax_search(); ?> form-control bs-select-hidden" title="<?php echo houzez_option('srh_status', 'Status'); ?>" data-live-search="false" data-selected-text-format="count > 1" data-actions-box="true" <?php houzez_multiselect(houzez_option('ms_status', 0)); ?> data-select-all-text="<?php echo houzez_option('cl_select_all', 'Select All'); ?>" data-deselect-all-text="<?php echo houzez_option('cl_deselect_all', 'Deselect All'); ?>" data-count-selected-text="{0} <?php echo houzez_option('srh_statuses', 'Statues'); ?>">
		<?php

		if( !houzez_is_multiselect(houzez_option('ms_status', 0)) ) {
			echo '<option value="">'.houzez_option('srh_status', 'Status').'</option>';
		}

		$args = array(
            'exclude' => houzez_option('search_exclude_status')
        );

		$status = isset($_GET['status']) ? $_GET['status'] : array();
        houzez_get_search_taxonomies('property_status', $status, $args );

		?>
	</select><!-- selectpicker -->
</div><!-- form-group -->