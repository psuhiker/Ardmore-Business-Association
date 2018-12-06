<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php
		$focusID = get_the_id();
		$post_object = get_field('focus_business');
		if($post_object):
			$post = $post_object;
			setup_postdata($post);
	?>

	<div class="container">
		
		<div class="col-sm-4 col-xs-12 sidebar sidebar-right">
		
			<br/>
		
			<?php if(get_field('logo' )) { ?>
				<div class="logo">
					<img src="<?php the_field('logo'); ?>">
				</div>
			<?php } ?>
		
			<p><strong><?php the_title(); ?></strong></p>
			<p class="address"><?php the_field('street_address') ?><?php if(get_field('street_address_two' )) { ?>, <?php the_field('street_address_two') ?><?php } ?></p>
			<p class="address"><?php the_field('city') ?>, <?php the_field('state') ?> <?php the_field('zip_code') ?></p>
					
			<ul class="phone list-unstyled">
				<?php if( have_rows('numbers') ): ?>
					<?php while ( have_rows('numbers') ) : the_row(); ?>
						<?php $numbers_type = get_sub_field('type'); ?>
						<?php if( $numbers_type === 'phone' ) { ?>
							<li><?php the_sub_field('number'); ?></li>
						<?php } ?>
					<?php endwhile; ?>
				<?php else : endif; ?>
						
			</ul>
			
			<?php if(get_field('aba_membership')) { ?>
				<div class="aba-member">
					<p class="profile-link"><a href="<?php the_permalink(); ?>" class="button small red" data-track="view-listing">View Profile <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
				</div>
			<?php } ?>
			
			<?php if( have_rows('hours') ): ?>
				
				<div class="hours">
				
					<h4><?php the_title(); ?> Hours</h4>
						
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
			
			<div class="social-share">
				<p><strong>Share This</strong></p>
				<ul>
					<li><a href="http://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" target="_blank" title="Share on Twitter" onclick="javascript:window.open(this.href,
					'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="<?php bloginfo('template_directory'); ?>/images/share-icon-twitter.png"></a></li>
					<li><a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" title="Share on Facebook" onClick="javascript:window.open(this.href,
					'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="<?php bloginfo('template_directory'); ?>/images/share-icon-facebook.png"></a></li>
				</ul>
			</div>
		
		</div>
	
		<div class="col-sm-8 col-xs-12 main-content">
		
			<h1><?php the_title(); ?></h1>
			
			<div class="default-padding--bottom businesses single">
			
				<?php if( have_rows('social') ): ?>
					<?php while ( have_rows('social') ) : the_row(); ?>
							
						<a href="<?php the_sub_field('url'); ?>" target="_blank" class="btn btn-blue" class="btn btn-red" data-track="outbound-link"><i class="fa fa-<?php the_sub_field('service'); ?>" aria-hidden="true" class="btn btn-red" data-track="outbound-link"></i></a>
								
					<?php endwhile; ?>
				<?php else : endif; ?>
				
				<?php if( get_field('website') ) { ?>
					<a href="<?php the_field('website'); ?>" target="_blank" class="btn btn-blue business-page link-click">
						<i class="fa fa-laptop" aria-hidden="true" class="btn btn-red" data-track="outbound-link"></i>
					</a>
				<?php } ?>
				
			</div> 
		
			<div class="description">
		    	<?php the_field('focus_content', $focusID); ?>
		    </div>
		    
		    <?php if( have_rows('focus_photos', $focusID) ): ?>
				<section id="carousel" class="xl-margin--top">
					<div id="photo-carousel" class="carousel fade" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php $indicatorCounter = 0; ?>
							<?php while ( have_rows('focus_photos', $focusID) ) : the_row(); ?>
							    <li data-target="#photo-carousel" data-slide-to="<?php echo $indicatorCounter; ?>" class="<?php if( $indicatorCounter == '0' ) { ?>active<?php } ?>"></li>
							    <?php $indicatorCounter++; ?>
							<?php endwhile; ?>
						</ol>
						<div class="carousel-inner" role="listbox">
							<?php $photoCounter = 0; ?>
							<?php while ( have_rows('focus_photos', $focusID) ) : the_row(); ?>
								<div class="item <?php if( $photoCounter == '0' ) { ?>active<?php } ?>">
							      	<img src="<?php the_sub_field('focus_photos_photo', $focusID); ?>">
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
    		
    		<br><br>
		    
		</div>
		
	</div>
	
	<?php
		wp_reset_postdata;
		endif;
	?>

<?php endwhile; ?>

	<?php else : ?>

<?php endif; ?>
