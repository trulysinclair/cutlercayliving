<?php
if(houzez_option('agency_tabs', 1)) {
    $agency_detail_tab_1 = houzez_option('agency_detail_tab_1');
    $agency_detail_tab_2 = houzez_option('agency_detail_tab_2');

    if(!empty($agency_detail_tab_1) || !empty($agency_detail_tab_2)) { 
        
    $tab_1 = houzez_get_term_by( 'term_id', $agency_detail_tab_1, 'property_status' );
    $tab_2 = houzez_get_term_by( 'term_id', $agency_detail_tab_2, 'property_status' );

    $all_link = add_query_arg( 'tab', '', get_permalink($post->ID) );
    $tab1_link = add_query_arg( 'tab', $tab_1->slug, get_permalink($post->ID) );
    $tab2_link = add_query_arg( 'tab', $tab_2->slug, get_permalink($post->ID) );

    $tab_all = $tab1_active = $tab2_active = $sortby = '';
    if( isset( $_GET['tab'] ) && $_GET['tab'] == $tab_1->slug ) {
        $tab1_active = "active";
    } elseif( isset( $_GET['tab'] ) && $_GET['tab']  == $tab_2->slug ) {
        $tab2_active = "active";
    } else {
        $tab_all = "active";
    }
    ?>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link <?php echo esc_attr( $tab_all ); ?>" href="<?php echo esc_url($all_link); ?>"><?php esc_html_e('All', 'houzez');?></a>
        </li>

        <?php if(!empty($agency_detail_tab_1)) { ?>
        <li class="nav-item">
            <a class="nav-link <?php echo esc_attr( $tab1_active ); ?>" href="<?php echo esc_url($tab1_link);?>"><?php echo esc_attr($tab_1->name);?></a>
        </li>
        <?php } ?>

        <?php if(!empty($agency_detail_tab_2)) { ?>
        <li class="nav-item">
            <a class="nav-link <?php echo esc_attr( $tab2_active ); ?>" href="<?php echo esc_url($tab2_link);?>"><?php echo esc_attr($tab_2->name);?></a>
        </li>
        <?php } ?>
    </ul><!-- nav-tabs -->
    <?php }
}
?>
