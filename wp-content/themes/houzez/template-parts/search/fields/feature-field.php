<?php
$get_features = array();
$get_features = isset ( $_GET['feature'] ) ? $_GET['feature'] : $get_features;

$features_limit = houzez_option('features_limit');

if( taxonomy_exists('property_feature') ) {
    $prop_features = get_terms(
        array(
            "property_feature"
        ),
        array(
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => false,
            //'parent' => 0
        )
    );
    $features_count = count($get_features);
    $checked_feature = '';
    $count = $i = 0;
    if (!empty($prop_features)) {
        foreach ($prop_features as $feature):
        
            if( $features_limit != -1 ) {
                if ( $count == $features_limit ) break;
            }

            $checked_feature = isset($get_features[$i]) ? $get_features[$i] : '';

            echo '<label class="control control--checkbox">';
            echo '<input class="'.houzez_get_ajax_search().'" name="feature[]" type="checkbox" '.checked( $checked_feature, $feature->slug, false ).' value="' . esc_attr( $feature->slug ) . '">';
            echo esc_attr( $feature->name );
            echo '<span class="control__indicator"></span>';
            echo '</label>';
            $count++;
            $i++;
        endforeach;
    }
}