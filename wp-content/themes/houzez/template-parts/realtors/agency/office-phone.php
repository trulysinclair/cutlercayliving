<?php 
global $houzez_local;
$agency_phone = get_post_meta( get_the_ID(), 'fave_agency_phone', true );
$agency_office_call = str_replace(array('(',')',' ','-'),'', $agency_phone);

if( !empty($agency_phone) ) { ?>
    <li>
    	<strong><?php echo $houzez_local['office_colon']; ?></strong> 
    	<span class="agent-phone <?php houzez_show_phone(); ?>"><?php echo esc_attr( $agency_phone ); ?></span>
    </li>
<?php } ?>