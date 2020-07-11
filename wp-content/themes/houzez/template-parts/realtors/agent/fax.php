<?php 
global $houzez_local;
$agent_fax = get_post_meta( get_the_ID(), 'fave_agent_fax', true );

if(is_author()) {
	global $current_author_meta;
	$agent_fax = isset($current_author_meta['fave_author_fax'][0]) ? $current_author_meta['fave_author_fax'][0] : '';
}

if( !empty( $agent_fax ) ) { ?>
	<li>
		<strong><?php echo $houzez_local['fax_colon']; ?></strong> 
		<span><?php echo esc_attr( $agent_fax ); ?></span>
	</li>
<?php } ?>