<?php
$size = 'houzez-item-image-1';
$properties_images = rwmb_meta( 'fave_property_images', 'type=plupload_image&size='.$size, $post->ID );

if( !empty($properties_images) ) {?>

<div class="fw-property-gallery-wrap fw-property-section-wrap" id="property-gallery-wrap">
	<div class="row row-no-padding">

		<?php foreach( $properties_images as $prop_image_id => $prop_image_meta ) {
            $full_image = houzez_get_image_by_id( $prop_image_id, 'full' ); ?>

	        <div class="col-md-3 col-sm-6">
				<a href="<?php echo esc_url( $full_image[0] ); ?>" data-lightbox="roadtrip" class="hover-effect">
					<img class="img-fluid" src="<?php echo esc_url( $prop_image_meta['url'] ); ?>" width="<?php echo esc_attr( $prop_image_meta['width'] ); ?>" height="<?php echo esc_attr( $prop_image_meta['height'] ); ?>" alt="<?php echo esc_attr( $prop_image_meta['title'] ); ?>">
				</a>
			</div>

	    <?php } ?>
	</div><!-- row -->
</div><!-- fw-property-gallery-wrap -->
<?php } ?>