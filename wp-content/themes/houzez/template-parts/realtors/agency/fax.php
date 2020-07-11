<?php 
global $houzez_local;
$agency_fax = get_post_meta( get_the_ID(), 'fave_agency_fax', true );

if( !empty( $agency_fax ) ) { ?>
	<li>
		<strong><?php echo $houzez_local['fax_colon']; ?></strong> 
		<span><?php echo esc_attr( $agency_fax ); ?></span>
	</li>
<?php } ?>