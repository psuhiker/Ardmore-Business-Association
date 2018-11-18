<?php if( get_field('aba_membership') ) { ?>

	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"  onClick="window.location.reload()">×</button>
	    	<p>Edit Your Business Listing</p>
	  	</div>
	  	<div class="modal-body">
	    	<iframe src="/wp-admin/post.php?post=<?php the_id(); ?>&action=edit" frameborder="0"></iframe>
	  	</div>
	</div>

	<section id="map">
	
	    <?php if( get_field('map_override') ) { ?>
	    
	        <iframe width='425' height='350' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0' src='<?php the_field('map_override'); ?>&amp;output=embed'></iframe>
	    
	    <?php } else { ?> 
	    
	        <address>
    		    <?php the_title(); ?>, <?php the_field('street_address') ?>, <?php the_field('city') ?>, <?php the_field('state') ?> <?php the_field('zip_code') ?>
    		</address>
    		
    		<script>
    			$(document).ready(function(){
    			    $("address").each(function(){                         
    			        var embed ="<iframe width='425' height='350' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( $(this).text() ) +"&amp;output=embed'></iframe>";
    			        $(this).html(embed);             
    			    });
    			});
    		</script>
    		
    	<?php } ?>
		
		<div class="coverup"></div>
	
	</section>
	
	<section class="content" id="businesses">
		<div class="container">
		
			<div class="col-sm-8 details">
			
				<div class="col-md-12">
		
					<div class="logo col-xs-3">
						<img src="<?php the_field('logo'); ?>">
					</div>
		
					<h1><?php the_title(); ?></h1>
					<p class="address"><?php the_field('street_address') ?><?php if(get_field('street_address_two' )) { ?>, <?php the_field('street_address_two') ?><?php } ?> | <?php the_field('city') ?>, <?php the_field('state') ?> <?php the_field('zip_code') ?></p>
					
					<ul class="phone">
						<?php if( have_rows('numbers') ): ?>
							<?php while ( have_rows('numbers') ) : the_row(); ?>
								<?php $numbers_type = get_sub_field('type'); ?>
								<?php if( $numbers_type === 'phone' ) { ?>
									<li><?php the_sub_field('number'); ?></li>
								<?php } ?>
							<?php endwhile; ?>
						<?php else : endif; ?>
						
					</ul>
					
					<!--<br><br>
						
					<div class="btn-group" role="group">
						
						<?php if( get_field('email') ) { ?><a href="mailto:<?php the_field('email'); ?>" class="btn btn-blue" class="btn btn-red" data-track="outbound-link"><i class="fa fa-envelope-o" aria-hidden="true" class="btn btn-red" data-track="outbound-link"></i></a><?php } ?>
						
						<?php if( get_field('website') ) { ?><a href="<?php the_field('website'); ?>" target="_blank" class="btn btn-blue business-page link-click"><i class="fa fa-laptop" aria-hidden="true" class="btn btn-red" data-track="outbound-link"></i></a><?php } ?>
						
					</div>-->
					
					<div class="btn-group" role="group">
					
						<?php if( have_rows('social') ): ?>
							<?php while ( have_rows('social') ) : the_row(); ?>
							
								<a href="<?php the_sub_field('url'); ?>" target="_blank" class="btn btn-blue" class="btn btn-red" data-track="outbound-link"><i class="fa fa-<?php the_sub_field('service'); ?>" aria-hidden="true" class="btn btn-red" data-track="outbound-link"></i></a>
								
							<?php endwhile; ?>
						<?php else : endif; ?>
						
					</div>
					
					<div class="description">
						<?php the_field('summary'); ?>
					</div>
					
					<?php if( have_rows('photo_gallery') ): ?>
					
						<section id="carousel">
						
							<!--<div id="flexslider-carousel" class="flexslider">
							
								<ul class="slides">
								
									<!-- Start of Slides -/->
									<?php while ( have_rows('photo_gallery') ) : the_row(); ?>
										
										<li style="background-image: url(<?php the_sub_field('photo_gallery_photo'); ?>);">
											<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
										</li>
									
									<?php endwhile; ?>
									<!-- End of Slides -/->
									
								</ul>
								
							</div>-->
							
							<div id="photo-carousel" class="carousel fade" data-ride="carousel">
							
								<ol class="carousel-indicators">
									<?php $indicatorCounter = 0; ?>
									<?php while ( have_rows('photo_gallery') ) : the_row(); ?>
							    		<li data-target="#photo-carousel" data-slide-to="<?php echo $indicatorCounter; ?>" class="<?php if( $indicatorCounter == '0' ) { ?>active<?php } ?>"></li>
							    		<?php $indicatorCounter++; ?>
							    	<?php endwhile; ?>
							    </ol>
							    
							    <div class="carousel-inner" role="listbox">
							    	<?php $photoCounter = 0; ?>
							    	<?php while ( have_rows('photo_gallery') ) : the_row(); ?>
							  			<div class="item <?php if( $photoCounter == '0' ) { ?>active<?php } ?>">
							      			<img src="<?php the_sub_field('photo_gallery_photo'); ?>">
							      			<div class="carousel-caption">
							      				<?php the_sub_field('photo_gallery_caption'); ?>
							      			</div>
							    		</div>
							    		<?php $photoCounter++; ?>
							    	<?php endwhile; ?>
							    </div>
							    
							    <a class="left carousel-control" href="#photo-carousel" role="button" data-slide="prev">
							    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							    	<span class="sr-only">Previous</span>
							    </a>
							    <a class="right carousel-control" href="#photo-carousel" role="button" data-slide="next">
							    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							    	<span class="sr-only">Next</span>
							    </a>
							</div>		    
						 
						</section>
						
					<?php else : endif; ?>
					
					<?php if( have_rows('promotions') ): ?>
					
						<div class="promotions">
					
							<div class="featured">
								<span><?php the_title(); ?> Promotions</span>
							</div>
						
							<?php while ( have_rows('promotions') ) : the_row(); ?>
							
								<div class="item">
							
									<?php if( get_sub_field('title') ) { ?>
										<h2><?php the_sub_field('title'); ?></h2>
									<?php } ?>
									
									<?php if( get_sub_field('details') ) { ?>
										<?php the_sub_field('details'); ?>
									<?php } ?>
									
									<?php if( get_sub_field('link') ) { ?>
										<p><a href="<?php the_sub_field('link'); ?>" target="_blank" class="button small blue" data-track="ad-click">Learn More  <i class="fa fa-long-arrow-right" aria-hidden="true" data-track="ad-click"></i></a></p>
									<?php } ?>
								
								</div>
									
							<?php endwhile; ?>
						
						</div>
						
					<?php else : endif; ?>
				
				</div>
				
				<div class="clear"></div>
			
			</div>
			
			<div class="col-sm-4 hours sidebar sidebar-right">
			
				<?php if( have_rows('hours') ): ?>
				
					<div class="hours">
				
						<h4>Hours</h4>
						
						<table class="table">
						
							<?php while ( have_rows('hours') ) : the_row(); ?>
							
								<tr>
									<td><?php the_sub_field('label'); ?>:</td>
									<td><?php the_sub_field('details'); ?></td>
								</tr>
							
							<?php endwhile; ?>
							
						</table>
						
						<div class="clear"></div>
					
					</div>
					
				<?php else : endif; ?>
				
				<div class="address">
				
					<h4>Contact</h4>
					
					<p class="address">
						<?php the_field('street_address') ?><br>
						<?php if(get_field('street_address_two' )) { ?>
							<?php the_field('street_address_two') ?><br>
							<?php } ?>
						<?php the_field('city') ?>, <?php the_field('state') ?> <?php the_field('zip_code') ?>
					</p>
					
					<?php if( have_rows('numbers') ): ?>
						<?php while ( have_rows('numbers') ) : the_row(); ?>
							<?php if( get_sub_field('hide') ) { ?>
							<?php } else { ?>
								<p class="phone"><span class="type"><?php the_sub_field('type'); ?>:</span> <?php the_sub_field('number'); ?></p>
							<?php } ?>
						<?php endwhile; ?>
					<?php else : endif; ?>
					
					<div class="gap"></div>
					
					<?php if( get_field('email') ) { ?>
						<p class="email"><span class="type">Email:</span> <a href="mailto:<?php the_field('email'); ?>" data-track="outbound-link"><?php the_field('email'); ?></a></p>
					<?php } ?>
					
					<?php if( get_field('website') ) { ?>
						<p class="website"><span class="type">Website:</span> <a href="<?php the_field('website'); ?>" target="_blank" \data-track="outbound-link"><?php the_field('website'); ?></a></p>
					<?php } ?>
				
				</div>
				
				<?php if( have_rows('promotions') ): ?>
				
					<div class="ads aligncenter bannerslider">
					
					    <ul class="slides">
				
	    					<?php while ( have_rows('promotions') ) : the_row(); ?>
	    					
	    						<?php if( get_sub_field('banner_ad') ) { ?>
	    						    <li>
	    								<?php if( get_sub_field('link') ) { ?><a href="<?php the_sub_field('link'); ?>" target="_blank" data-track="ad-click"><?php } ?>
	    									<img src="<?php the_sub_field('banner_ad'); ?>">
	    								<?php if( get_sub_field('link') ) { ?></a><?php } ?>
	    							</li>
	    						<?php } ?>
	    							
	    					<?php endwhile; ?>
						
						</ul>
					
					</div>
					
				<?php else : endif; ?>
			
			</div>
		
		</div>
	</section>

<?php } else { ?>

	<!-- Redirects all Non-ABA Members to the main business page -->
	<meta http-equiv="refresh" content="0; url=/businesses/">

<?php } ?>