<div class="btn-group">
	<button type="button" class="btn btn-light-grey-outlined" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<?php echo houzez_option('srh_status', 'Status'); ?>
	</button>
	<div class="dropdown-menu dropdown-menu-small dropdown-menu-right advanced-search-dropdown clearfix">
		
		<?php
		$get_status = array();
		$get_status = isset ( $_GET['status'] ) ? $_GET['status'] : $get_status;

		if( taxonomy_exists('property_status') ) {
		    $prop_status = get_terms(
		        array(
		            "property_status"
		        ),
		        array(
		            'orderby' => 'name',
		            'order' => 'ASC',
		            'hide_empty' => false,
		            'parent' => 0
		        )
		    );
		
		    $checked_status = '';
		    $count = 0;
		    if (!empty($prop_status)) {
		        foreach ($prop_status as $status):
		       
		            echo '<label class="control control--checkbox">';
		            echo '<input class="'.houzez_get_ajax_search().'" name="status[]" type="checkbox" '.checked( $checked_status, $status->slug, false ).' value="' . esc_attr( $status->slug ) . '">';
		            echo esc_attr( $status->name );
		            echo '<span class="control__indicator"></span>';

		            $get_child = get_terms('property_status', array(
                        'hide_empty' => false,
                        'parent' => $status->term_id
                    ));

                    if (!empty($get_child)) {
                        foreach($get_child as $child) {
                            echo '<label class="control control--checkbox">';
                                echo '<input class="'.houzez_get_ajax_search().'" name="status[]" type="checkbox" '.checked( $checked_status, $child->slug, false ).' value="' . esc_attr( $child->slug ) . '">';
					            echo esc_attr( $child->name );
					            echo '<span class="control__indicator"></span>';
                            echo '</label>';

                        }
                    }

		            echo '</label>';
		            $count++;
		        endforeach;
		    }
		} ?>

		<button class="btn btn-clear clear-checkboxes"><?php echo houzez_option('srh_clear', 'Clear'); ?></button> 
		<button class="btn btn-apply"><?php echo houzez_option('srh_apply', 'Apply'); ?></button>
	</div><!-- advanced-search-dropdown -->
</div><!-- btn-group -->