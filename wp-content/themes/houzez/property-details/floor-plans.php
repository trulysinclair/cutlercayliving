<?php
$floor_plans = get_post_meta( get_the_ID(), 'floor_plans', true );

if( isset($floor_plans[0]['fave_plan_title']) && !empty( $floor_plans[0]['fave_plan_title'] ) ) {
?>
<div class="property-floor-plans-wrap property-section-wrap" id="property-floor-plans-wrap">
	<div class="block-wrap">
		<div class="block-title-wrap d-flex justify-content-between align-items-center">
			<h2><?php echo houzez_option('sps_floor_plans', 'Floor Plans'); ?></h2>
		</div><!-- block-title-wrap -->
		<div class="block-content-wrap">
			<div class="accordion">
				<?php 
				$i = 0;
				foreach( $floor_plans as $plan ):
					$i++;
		            $price_postfix = '';
		            if( !empty( $plan['fave_plan_price_postfix'] ) ) {
		                $price_postfix = ' / '.$plan['fave_plan_price_postfix'];
		            }
		            $filetype = wp_check_filetype($plan['fave_plan_image']);
	            ?>
				
				<div class="accordion-tab floor-plan-wrap">
					<div class="accordion-header" data-toggle="collapse" data-target="#floor-<?php echo esc_attr($i); ?>" aria-expanded="false">
						<div class="d-flex align-items-center" id="floor-plans-<?php echo esc_attr($i); ?>">
							<div class="accordion-title flex-grow-1">
								<?php echo esc_attr( $plan['fave_plan_title'] ); ?>
							</div><!-- accordion-title -->
							<ul class="floor-information list-unstyled list-inline">
								<?php if( !empty( $plan['fave_plan_size'] ) ) { ?>
			                        <li class="list-inline-item">
			                            <?php esc_html_e( 'Size', 'houzez' ); ?>: 
			                            <strong> <?php echo esc_attr( $plan['fave_plan_size'] ); ?></strong>
			                        </li>
			                    <?php } ?>

			                    <?php if( !empty( $plan['fave_plan_rooms'] ) ) { ?>
			                        <li class="list-inline-item">
			                        	<i class="houzez-icon icon-hotel-double-bed-1 mr-1"></i>
			                        	<strong><?php echo esc_attr( $plan['fave_plan_rooms'] ); ?></strong>
			                        </li>
			                    <?php } ?>

			                    <?php if( !empty( $plan['fave_plan_bathrooms'] ) ) { ?>
			                        <li class="list-inline-item">
			                        	<i class="houzez-icon icon-bathroom-shower-1 mr-1"></i>
			                        	<strong><?php echo esc_attr( $plan['fave_plan_bathrooms'] ); ?></strong>
			                        </li>
			                    <?php } ?>

			                    <?php if( !empty( $plan['fave_plan_price'] ) ) { ?>
			                        <li class="list-inline-item">
			                        	<?php echo houzez_option('spl_price', 'Price'); ?>: 
			                        	<strong><?php echo houzez_get_property_price( $plan['fave_plan_price'] ).$price_postfix; ?></strong>
			                        </li>
			                    <?php } ?>
							</ul>
						</div><!-- d-flex -->
					</div><!-- accordion-header -->
					<div id="floor-<?php echo esc_attr($i); ?>" class="collapse" data-parent="#floor-plans-<?php echo esc_attr($i); ?>">
						<div class="accordion-body">
							<?php if( !empty( $plan['fave_plan_image'] ) ) { ?>
                    
			                        <?php if($filetype['ext'] != 'pdf' ) {?>
			                        <a href="<?php echo esc_url( $plan['fave_plan_image'] ); ?>" target="_blank">
			                            <img class="img-fluid" src="<?php echo esc_url( $plan['fave_plan_image'] ); ?>" alt="image">
			                        </a>
			                        <?php } else { 
			                            
			                            $path = $plan['fave_plan_image'];
			                            $file = basename($path); 
			                            $file = basename($path, ".pdf");
			                            echo '<a href="'.esc_url( $plan['fave_plan_image'] ).'" download>';
			                            echo $file;
			                            echo '</a>';
			                        } ?>
			                    
			                <?php } ?>
							
							<div class="floor-plan-description">
								<p><strong><?php echo esc_html__('Description', 'houzez'); ?>:</strong><br>
									<?php 
									if( !empty( $plan['fave_plan_description'] ) ) { 
										echo wp_kses_post( $plan['fave_plan_description'] ); 
									} 
									?>
								</p>
							</div><!-- floor-plan-description -->
						</div><!-- accordion-body -->
					</div><!-- collapse -->
				</div><!-- accordion-tab -->


				<?php endforeach; ?>
			</div><!-- accordion -->
		</div><!-- block-content-wrap -->
	</div><!-- block-wrap -->
</div><!-- property-floor-plans-wrap -->
<?php } ?>