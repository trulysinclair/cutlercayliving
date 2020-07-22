<?php
global $post, $current_user;
$return_array = houzez20_property_contact_form();
if(empty($return_array)) {
	return;
}
$terms_page_id = houzez_option('terms_condition');
$hide_form_fields = houzez_option('hide_prop_contact_form_fields');
$agent_display = houzez_get_listing_data('agent_display_option');
$property_id = houzez_get_listing_data('property_id');

$agent_number = $return_array['agent_mobile'];
$agent_number_call = $return_array['agent_mobile_call'];
if( empty($agent_number) ) {
	$agent_number = $return_array['agent_phone'];
	$agent_num_call = $return_array['agent_phone_call'];
}

$user_name = $user_email = '';
if(!houzez_is_admin()) {
	$user_name =  $current_user->display_name;
	$user_email =  $current_user->user_email;
}

$send_btn_class = 'btn-half-width';
if($return_array['is_single_agent'] == false || empty($agent_number) || wp_is_mobile() ) {
	$send_btn_class = 'btn-full-width';
}

$agent_email = is_email( $return_array['agent_email'] );
if ($agent_email && $agent_display != 'none') {
?>
	<div class="property-form-wrap">

	<?php 
	if(houzez_form_type()) {

		echo $return_array['agent_data'];
		
		if(!empty(houzez_option('contact_form_agent_above_image'))) {
			echo do_shortcode(houzez_option('contact_form_agent_above_image'));
		}

	} else { ?>
		<div class="property-form clearfix">
			<form method="post" action="#">
				
				<?php echo $return_array['agent_data']; ?>

				<?php if( $hide_form_fields['name'] != 1 ) { ?>
				<div class="form-group">
					<input class="form-control" name="name" value="<?php echo esc_attr($user_name); ?>" type="text" placeholder="<?php echo houzez_option('spl_con_name', 'Name'); ?>">
				</div><!-- form-group -->
				<?php } ?>

				<?php if( $hide_form_fields['phone'] != 1 ) { ?>	
				<div class="form-group">
					<input class="form-control" name="mobile" value="" type="text" placeholder="<?php echo houzez_option('spl_con_phone', 'Phone'); ?>">
				</div><!-- form-group -->
				<?php } ?>

				<div class="form-group">
					<input class="form-control" name="email" value="<?php echo esc_attr($user_email); ?>" type="email" placeholder="<?php echo houzez_option('spl_con_email', 'Email'); ?>">
				</div><!-- form-group -->

				<?php if( $hide_form_fields['message'] != 1 ) { ?>	
				<div class="form-group form-group-textarea">
					<textarea class="form-control" name="message" rows="4" placeholder="<?php echo houzez_option('spl_con_message', 'Message'); ?>"><?php echo houzez_option('spl_con_interested', "Hello, I am interested in"); ?> [<?php echo get_the_title(); ?>]</textarea>
				</div><!-- form-group -->	
				<?php } ?>

				<?php if( $hide_form_fields['usertype'] != 1 ) { ?>	
				<div class="form-group">
					<select name="user_type" class="selectpicker form-control bs-select-hidden" title="<?php echo houzez_option('spl_con_select', 'Select'); ?>">

						<?php if( houzez_option('spl_con_buyer') != "" ) { ?>
						<option value="buyer"><?php echo houzez_option('spl_con_buyer', "I'm a buyer"); ?></option>
						<?php } ?>

						<?php if( houzez_option('spl_con_tennant') != "" ) { ?>
						<option value="tennant"><?php echo houzez_option('spl_con_tennant', "I'm a tennant"); ?></option>
						<?php } ?>

						<?php if( houzez_option('spl_con_agent') != "" ) { ?>
						<option value="agent"><?php echo houzez_option('spl_con_agent', "I'm an agent"); ?></option>
						<?php } ?>

						<?php if( houzez_option('spl_con_other') != "" ) { ?>
						<option value="other"><?php echo houzez_option('spl_con_other', 'Other'); ?></option>
						<?php } ?>
					</select><!-- selectpicker -->
				</div><!-- form-group -->
				<?php } ?>			
			
				<?php if ( $return_array['is_single_agent'] == true ) : ?>
		            <input type="hidden" name="target_email" value="<?php echo antispambot($agent_email); ?>">
		        <?php endif; ?>
		        <input type="hidden" name="property_agent_contact_security" value="<?php echo wp_create_nonce('property_agent_contact_nonce'); ?>"/>
		        <input type="hidden" name="property_permalink" value="<?php echo esc_url(get_permalink($post->ID)); ?>"/>
		        <input type="hidden" name="property_title" value="<?php echo esc_attr(get_the_title($post->ID)); ?>"/>
		        <input type="hidden" name="property_id" value="<?php echo esc_attr($property_id); ?>"/>
		        <input type="hidden" name="action" value="houzez_property_agent_contact">
		        <input type="hidden" name="listing_id" value="<?php echo intval($post->ID)?>">
		        <input type="hidden" name="is_listing_form" value="yes">
		        <input type="hidden" name="agent_id" value="<?php echo intval($return_array['agent_id'])?>">
		        <input type="hidden" name="agent_type" value="<?php echo esc_attr($return_array['agent_type'])?>">

		        <?php get_template_part('template-parts/google', 'reCaptcha'); ?>
		        <div class="form_messages"></div>
				<button type="button" class="houzez_agent_property_form btn btn-secondary <?php echo esc_attr($send_btn_class); ?>">
					<?php get_template_part('template-parts/loader'); ?>
					<?php echo houzez_option('spl_btn_send', 'Send Email'); ?>
					
				</button>
				
				<?php if ( $return_array['is_single_agent'] == true && !empty($agent_number) && !wp_is_mobile() ) : ?>
				<button type="button" class="btn btn-call btn-half-width">
					<span class="hide-on-click"><?php echo houzez_option('spl_btn_call', 'Call'); ?></span>
					<span class="show-on-click"><?php echo esc_attr($agent_number); ?></span>
				</button>
				<?php endif; ?>
			</form>
		</div><!-- property-form -->
		<div class="property-form-terms">
			<?php echo houzez_option('spl_sub_agree', 'By submitting this form I agree to'); ?> <a target="_blank" href="<?php echo esc_url(get_permalink($terms_page_id)); ?>"><?php echo houzez_option('spl_term', 'Terms of Use'); ?></a>
		</div><!-- property-form-terms -->
		
	<?php } ?>
</div><!-- property-form-wrap -->
<?php } ?>
