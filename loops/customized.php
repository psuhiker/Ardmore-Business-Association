<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php if( get_field('marquee_slides') ) { ?>

		<?php include (TEMPLATEPATH . '/loops/marquee.php' ); ?>
		
	<?php } ?>

	<?php if( have_rows('sections') ): while ( have_rows('sections') ) : the_row(); ?>
	
		<?php if( get_row_layout() == 'section_one_full' ) { ?>
			<?php $background_options = get_sub_field('background_options'); ?>
			
			<section class="content section-one-full" <?php if( $background_options === 'image' ) { ?>style="background-image: url(<?php the_sub_field('background_image'); ?>);"<?php } ?> <?php if( $background_options === 'color' ) { ?>style="background-color: <?php the_sub_field('background_color'); ?>;"<?php } ?>>
				<div class="container">
				
					<div class="col-sm-12">
					
						<?php the_sub_field('content'); ?>
						
					</div>
					
					<div class="clear"></div>
				
				</div>
			</section>
	        	
	    <?php } ?>
	    
	    <?php if( get_row_layout() == 'section_one_half' ) { ?>
	    	<?php $background_options = get_sub_field('background_options'); ?>
	    	
	    	<section class="content section-one-half" <?php if( $background_options === 'image' ) { ?>style="background-image: url(<?php the_sub_field('background_image'); ?>);"<?php } ?> <?php if( $background_options === 'color' ) { ?>style="background-color: <?php the_sub_field('background_color'); ?>;"<?php } ?>>
	    		<div class="container">
	    		
	    			<div class="col-sm-8 col-sm-offset-2">
	    			
	    				<?php the_sub_field('content'); ?>
	    				
	    			</div>
	    			
	    			<div class="clear"></div>
	    		
	    		</div>
	    	</section>
	        	
	    <?php } ?>
	    
	    <?php if( get_row_layout() == 'section_two' ) { ?>
	    	<?php $background_options = get_sub_field('background_options'); ?>
	    
	    	<section class="content section-two" <?php if( $background_options === 'image' ) { ?>style="background-image: url(<?php the_sub_field('background_image'); ?>);"<?php } ?> <?php if( $background_options === 'color' ) { ?>style="background-color: <?php the_sub_field('background_color'); ?>;"<?php } ?>>
	    		<div class="container">
	    		
	    			<div class="col-md-6">
	    			
	    				<?php the_sub_field('content_one'); ?>
	    			
	    			</div>
	    			
	    			<div class="col-md-6">
	    			
	    				<?php the_sub_field('column_two'); ?>
	    			
	    			</div>
	    			
	    			<div class="clear"></div>
	    		
	    		</div>
	    	</section>
	            	
	    <?php } ?>
	    
	    <?php if( get_row_layout() == 'section_two_third' ) { ?>
	    	<?php $background_options = get_sub_field('background_options'); ?>
	    
	    	<section class="content section-two-third" <?php if( $background_options === 'image' ) { ?>style="background-image: url(<?php the_sub_field('background_image'); ?>);"<?php } ?> <?php if( $background_options === 'color' ) { ?>style="background-color: <?php the_sub_field('background_color'); ?>;"<?php } ?>>
	    		<div class="container">
	    		
	    			<div class="col-md-4 col-md-offset-2">
	    			
	    				<?php the_sub_field('content_one'); ?>
	    			
	    			</div>
	    			
	    			<div class="col-md-4">
	    			
	    				<?php the_sub_field('column_two'); ?>
	    			
	    			</div>
	    			
	    			<div class="clear"></div>
	    		
	    		</div>
	    	</section>
	    
	    <?php } ?>
	    
	    <?php if( get_row_layout() == 'section_four' ) { ?>
	    	<?php $background_options = get_sub_field('background_options'); ?>
	        
	    	<section class="content section-four" <?php if( $background_options === 'image' ) { ?>style="background-image: url(<?php the_sub_field('background_image'); ?>);"<?php } ?> <?php if( $background_options === 'color' ) { ?>style="background-color: <?php the_sub_field('background_color'); ?>;"<?php } ?>>
	    		<div class="container">
	    		
	    			<div class="col-md-3">
	    			
	    				<?php the_sub_field('content_one'); ?>
	    			
	    			</div>
	    			
	    			<div class="col-md-3">
	    			
	    				<?php the_sub_field('column_two'); ?>
	    			
	    			</div>
	    			
	    			<div class="col-md-3">
	    			
	    				<?php the_sub_field('column_three'); ?>
	    			
	    			</div>
	    			
	    			<div class="col-md-3">
	    			
	    				<?php the_sub_field('column_four'); ?>
	    			
	    			</div>
	    			
	    			<div class="clear"></div>
	    		
	    		</div>
	    	</section>
	                	
	    <?php } ?>
	    
	    <?php if( get_row_layout() == 'section_businesses' ) { ?>
	    
	    	<section id="businesses" style="background-color: #f3f7eb;">
	    		<div class="container">
	    			
	    			<?php if ( get_sub_field('section_header') ) { ?>
	    				<h2 class="text-center">
	    					<?php the_sub_field('section_header'); ?>
	    				</h2>
	    			<?php } ?>
	    
	    			<?php if( have_rows('add_businesses') ): ?>
	    	    		
	    	    		<div class="row row-eq-height">
	    	
	    	    	        <?php while ( have_rows('add_businesses') ) : the_row(); ?>
							
								<?php 
	    	    	                $post_object = get_sub_field('individual_business');
	    	    	                if( $post_object ): 
	    	    	                $post = $post_object;
	    	    	            	setup_postdata( $post ); 
	    	    	            ?>
	    	    	                <?php include (TEMPLATEPATH . '/includes/landing-page-business.php' ); ?>
	    	    	                <?php wp_reset_postdata(); ?>
	    	    	            <?php endif; ?>
	    	    	        
	    	    	        <?php endwhile; ?>
	    		        
	    	    		</div>
						
					<?php else : endif; ?>
	    	    
	    	    </div>
	    	</section>
	    
	    <?php } ?>
	    
	<?php endwhile; else : endif; ?>
	
	<?php if ( is_page( 'association' ) ) { ?>
	
		<?php include (TEMPLATEPATH . '/loops/about-aba.php' ); ?>
	
	<?php } ?>
	
	<?php if ( is_page( 'ardmore' ) ) { ?>
	
	    <style><!--
	        section#map {
	            display: none;
	        }
	        section.businesses {
	            padding-top: 50px;
	            margin-top: 0px;
	        }
	    --></style>
	    
	    <div class="clear"></div>
	
		<?php include (TEMPLATEPATH . '/loops/businesses-main-all.php' ); ?>
	
	<?php } ?>
	
	<!-- Style Correction for Marquee -->
	<?php if( get_field('marquee_slides') ) { ?>
	
		<style><!--
			div#content section#carousel {
			    margin-bottom: -40vh !important;
			} 
			
			.canvas div#content section#carousel {
			    margin-bottom: -45vh !important;
			}
			
			div#content section:nth-child(2) {
			    padding-top: 30vh;
			}
		--></style>
	
	<?php } ?>

<?php endwhile; ?>

	<?php else : ?>

<?php endif; ?>