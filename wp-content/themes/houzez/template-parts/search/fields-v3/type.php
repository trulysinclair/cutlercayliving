<div class="btn-group">
	<button type="button" class="btn btn-light-grey-outlined" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<?php echo houzez_option('srh_type', 'Type'); ?>
	</button>
	<div class="dropdown-menu dropdown-menu-small dropdown-menu-right advanced-search-dropdown clearfix">
		
		<?php
		$get_type = array();
		$get_type = isset ( $_GET['type'] ) ? $_GET['type'] : $get_type;

		if( taxonomy_exists('property_type') ) {
		    $prop_type = get_terms(
		        array(
		            "property_type"
		        ),
		        array(
		            'orderby' => 'name',
		            'order' => 'ASC',
		            'hide_empty' => false,
		            'parent' => 0
		        )
		    );
		
		    $checked_type = '';
		    
		    if (!empty($prop_type)) {
		        foreach ($prop_type as $type):
		       
		            echo '<label class="control control--checkbox">';
		            echo '<input class="'.houzez_get_ajax_search().'" name="type[]" type="checkbox" '.checked( $checked_type, $type->slug, false ).' value="' . esc_attr( $type->slug ) . '">';
		            echo esc_attr( $type->name );
		            echo '<span class="control__indicator"></span>';

		            $get_child = get_terms('property_type', array(
                        'hide_empty' => false,
                        'parent' => $type->term_id
                    ));

                    if (!empty($get_child)) {
                    	$count = 0;
                        foreach($get_child as $child) {
                            echo '<label class="control control--checkbox hz-checkbox-'.$count.'">';
                                echo '<input class="'.houzez_get_ajax_search().'" name="type[]" type="checkbox" '.checked( $checked_type, $child->slug, false ).' value="' . esc_attr( $child->slug ) . '">';
					            echo esc_attr( $child->name );
					            echo '<span class="control__indicator"></span>';
                            echo '</label>';
                            $count++;
                        }
                    }

		            echo '</label>';
		        endforeach;
		    }
		} ?>

		<button class="btn btn-clear clear-checkboxes"><?php echo houzez_option('srh_clear', 'Clear'); ?></button> 
		<button class="btn btn-apply"><?php echo houzez_option('srh_apply', 'Apply'); ?></button>
	</div><!-- advanced-search-dropdown -->
</div><!-- btn-group -->