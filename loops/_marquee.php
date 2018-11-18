<?php 
    global $current_user;
    get_currentuserinfo();
?>

<?php if ($current_user->ID == '1') { ?>

<section id="carousel">
    
    <div id="marquee-carousel" class="carousel fade" data-ride="carousel">
    
    	<ol class="carousel-indicators">
    		<?php $indicatorCounter = 0; ?>
    		
    		<?php if( have_rows('marquee_slides') ): while ( have_rows('marquee_slides') ) : the_row(); ?>
        		
        		<li data-target="#marquee-carousel" data-slide-to="<?php echo $indicatorCounter; ?>" class="<?php if( $indicatorCounter == '0' ) { ?>active<?php } ?>"></li>
        		<?php $indicatorCounter++; ?>
        		
        	<?php endwhile; else : endif; ?>
        	
        </ol>
        
        <div class="carousel-inner" role="listbox">
        	<?php $photoCounter = 0; ?>
        	
        	<?php if( have_rows('marquee_slides') ): while ( have_rows('marquee_slides') ) : the_row(); ?>
        	
        	    <?php if( get_row_layout() == 'events' ): ?>
        	    
        	        <?php $post_object = get_sub_field('slides_events'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
        	        
        	            <div class="item <?php if( $photoCounter == '0' ) { ?>active<?php } ?>" style="background-image: url(<?php the_sub_field('slide_image_events'); ?>);">
        	            	<a href="<?php the_permalink(); ?>" data-track="marquee-click">
        	            		<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
        	            		<div class="caption">
        	            			<div class="inner">
        	            				<h3><?php the_title(); ?></h3>
        	            				<div class="excerpt"><?php the_excerpt(); ?></div>
        	            			</div>
        	            		</div>
        	            	</a>
        	            </div>
        	            <?php $photoCounter++; ?>
        	        
        	        <?php wp_reset_postdata(); ?>
        	        <?php endif; ?>
        	    
        	    <?php endif; ?>
        	    
        	    <?php if( get_row_layout() == 'news' ): ?>
        	    
        	        <?php $post_object = get_sub_field('slides_news'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
        	        
        	            <div class="item <?php if( $photoCounter == '0' ) { ?>active<?php } ?>" style="background-image: url(<?php the_sub_field('slide_image_news'); ?>);">
        	            	<a href="<?php the_permalink(); ?>" data-track="marquee-click">
        	            		<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
        	            		<div class="caption">
        	            			<div class="inner">
        	            				<h3><?php the_title(); ?></h3>
        	            			</div>
        	            		</div>
        	            	</a>
        	            </div>
        	            <?php $photoCounter++; ?>
        	        
        	        <?php wp_reset_postdata(); ?>
        	        <?php endif; ?>
        	    
        	    <?php endif; ?>
        	    
        	    <?php if( get_row_layout() == 'businesses' ): ?>
        	    
        	        <?php $post_object = get_sub_field('slides_businesses'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
        	        
        	            <div class="item <?php if( $photoCounter == '0' ) { ?>active<?php } ?>" style="background-image: url(<?php the_sub_field('slide_image_businesses'); ?>);">
        	            	<a href="<?php the_permalink(); ?>" data-track="marquee-click">
        	            		<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
        	            		<div class="caption">
        	            			<div class="inner">
        	            				<h3><?php the_sub_field('slide_headline_businesses'); ?></h3>
        	            				<div class="excerpt"><?php the_excerpt(); ?></div>
        	            			</div>
        	            		</div>
        	            	</a>
        	            </div>
        	            <?php $photoCounter++; ?>
        	        
        	        <?php wp_reset_postdata(); ?>
        	        <?php endif; ?>
        	    
        	    <?php endif; ?>
        	    
        	    <?php if( get_row_layout() == 'page' ): ?>
        	    
        	        <?php $post_object = get_sub_field('slides_page'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
        	        
        	            <div class="item <?php if( $photoCounter == '0' ) { ?>active<?php } ?>" style="background-image: url(<?php the_sub_field('slide_image_page'); ?>);">
        	            	<a href="<?php the_permalink(); ?>" data-track="marquee-click">
        	            		<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
        	            		<div class="caption">
        	            			<div class="inner">
        	            				<h3><?php the_sub_field('slide_headline_page'); ?></h3>
        	            				<div class="excerpt"><?php the_excerpt(); ?></div>
        	            			</div>
        	            		</div>
        	            	</a>
        	            </div>
        	            <?php $photoCounter++; ?>
        	        
        	        <?php wp_reset_postdata(); ?>
        	        <?php endif; ?>
        	    
        	    <?php endif; ?>
        	    
        	    <?php if( get_row_layout() == 'custom' ): ?>
        	    
        	        <div class="item <?php if( $photoCounter == '0' ) { ?>active<?php } ?>" style="background-image: url(<?php the_sub_field('slide_image_custom'); ?>);">
        	            <?php if( get_sub_field('slide_link_custom') ) { ?>
        	        	    <a href="<?php the_sub_field('slide_link_custom'); ?>" data-track="marquee-click">
        	        	<?php } ?>
        	        		<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
        	        		<div class="caption">
        	        			<div class="inner">
        	        				<h3><?php the_sub_field('slide_headline_custom'); ?></h3>
        	        				<div class="excerpt"><?php the_sub_field('slide_copy_custom'); ?></div>
        	        			</div>
        	        		</div>
        	        	<?php if( get_sub_field('slide_link_custom') ) { ?>
        	        	    </a>
        	        	<?php } ?>
        	        </div>
        	        <?php $photoCounter++; ?>
        	    
        	    <?php endif; ?>
        		
        	<?php endwhile; else : endif; ?>
        	
        </div>
        
    </div>
        
</section>

<?php } else { ?>

<section id="carousel">

    <div class="temp-flexslider">
        <div class="temp-viewport">
        
        	<ul class="slides">
        	
        	    <li style="background-image: url(http://www.ardmoreshops.com/wp-content/uploads/2016/05/mainlinebikerace.jpg);">
        	    	<a href="http://www.ardmoreshops.com/news/1st-annual-main-line-bike-race-a-success/" data-track="marquee-click">
        	    		
        	    		<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
        	    		<div class="caption">
        	    			<div class="inner">
        	    				<h3>Thank You!</h3>
        	    				<div class="excerpt">Thank you to everyone who helped make the 1st Annual Main Line Bike Race a success</div>
        	    				<p class="center"><img src="http://www.ardmoreshops.com/wp-content/uploads/2017/07/mainlinebikerace-sponsors.png" width="600" height="131" style="height: 131px !important;"></p>
        	    			</div>
        	    		</div>
        	    		
        	    	</a>
        	    </li>
        	
        	</ul>
        	
        </div>
    </div>

</section>

<!--<section id="carousel">

    <div class="temp-flexslider">
        <div class="temp-viewport">
        
        	<ul class="slides">
        	
        	    <li style="background-image: url(http://www.ardmoreshops.com/wp-content/uploads/2016/05/mainlinebikerace.jpg);">
        	    	<a href="http://www.ardmoreshops.com/events/main-line-bike-race-of-ardmore/" data-track="marquee-click">
        	    		
        	    		<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
        	    		<div class="caption">
        	    			<div class="inner">
        	    				<h3>Race Day Is Almost Here!</h3>
        	    				<div class="excerpt">On Sunday, August 20th, Lower Merion Township will shut down Lancaster Ave for the first ever Main Line Bike Race and Family Fun Zone!</div>
        	    				<p class="center"><img src="http://www.ardmoreshops.com/wp-content/uploads/2017/07/mainlinebikerace-sponsors.png" width="600" height="131" style="height: 131px !important;"></p>
        	    			</div>
        	    		</div>
        	    		
        	    	</a>
        	    </li>
        	
        	</ul>
        	
        </div>
    </div>

</section>-->

<?php } ?>

<!--<section id="carousel">

	<div id="flexslider-carousel" class="flexslider">
	
		<ul class="slides">
		
			<?php if( have_rows('marquee_slides') ): while ( have_rows('marquee_slides') ) : the_row(); ?>
				
				<?php if( get_row_layout() == 'events' ): ?>
				
					<?php $post_object = get_sub_field('slides_events'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
					
						<li style="background-image: url(<?php the_sub_field('slide_image_events'); ?>);">
							<a href="<?php the_permalink(); ?>" data-track="marquee-click">
								
								<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
								<div class="caption">
									<div class="inner">
										<h3><?php the_title(); ?></h3>
										<div class="excerpt"><?php the_excerpt(); ?></div>
									</div>
								</div>
								
							</a>
						</li>
					    
					<?php wp_reset_postdata(); ?>
					<?php endif; ?>
					
				<?php endif; ?>
					
				<?php if( get_row_layout() == 'news' ): ?>
			        
			        <?php $post_object = get_sub_field('slides_news'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
			        
			        	<li style="background-image: url(<?php the_sub_field('slide_image_news'); ?>);">
			        		<a href="<?php the_permalink(); ?>" data-track="marquee-click">
			        	
				        		<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
				        		<div class="caption">
				        			<div class="inner">
				        				<h3><?php the_title(); ?></h3>
				        			</div>
				        		</div>
			        		
			        		</a>
			        	</li>
			            
			        <?php wp_reset_postdata(); ?>
			        <?php endif; ?>
			        
			    <?php endif; ?>
			        
			    <?php if( get_row_layout() == 'businesses' ): ?>
			
			        <?php $post_object = get_sub_field('slides_businesses'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
			        
			        	<li style="background-image: url(<?php the_sub_field('slide_image_businesses'); ?>);">
				        	<a href="<?php the_permalink(); ?>" data-track="marquee-click">
				        
					        	<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
					        	<div class="caption">
					        		<div class="inner">
					        			<h3><?php the_sub_field('slide_headline_businesses'); ?></h3>
					        			<div class="excerpt"><?php the_excerpt(); ?></div>
					        		</div>
					        	</div>
				        	
				        	</a>
				        </li>
			            
			        <?php wp_reset_postdata(); ?>
			        <?php endif; ?>
			        
			    <?php endif; ?>
			    
				<?php if( get_row_layout() == 'page' ): ?>
			
			        <?php $post_object = get_sub_field('slides_page'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
			        
			        	<li style="background-image: url(<?php the_sub_field('slide_image_page'); ?>);">
				        	<a href="<?php the_permalink(); ?>" data-track="marquee-click">
				        
					        	<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
					        	<div class="caption">
					        		<div class="inner">
					        			<h3><?php the_sub_field('slide_headline_page'); ?></h3>
					        			<div class="excerpt"><?php the_excerpt(); ?></div>
					        		</div>
					        	</div>
				        	
				        	</a>
				        </li>
			            
			        <?php wp_reset_postdata(); ?>
			        <?php endif; ?>
			        
			    <?php endif; ?>
			    
			    <?php if( get_row_layout() == 'custom' ): ?>
			        
			        <li style="background-image: url(<?php the_sub_field('slide_image_custom'); ?>);">
			        	<?php if( get_sub_field('slide_link_custom') ) { ?>
			        		<a href="<?php the_sub_field('slide_link_custom'); ?>" data-track="marquee-click">
			        	<?php } ?>
			       
				        	<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
				        	<div class="caption">
				        		<div class="inner">
				        			<h3><?php the_sub_field('slide_headline_custom'); ?></h3>
				        			<div class="excerpt"><?php the_sub_field('slide_copy_custom'); ?></div>
				        		</div>
				        	</div>
			        	
			        	<?php if( get_sub_field('slide_link_custom') ) { ?>
			        		</a>
			        	<?php } ?>
			        </li>
			        
			    <?php endif; ?>
			
			<?php endwhile; else : endif; ?>
			
		</ul>
		
	</div>	    
 
</section>-->