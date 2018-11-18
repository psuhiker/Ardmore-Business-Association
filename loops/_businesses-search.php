<div class="item">

	<!--<h1><?php the_title(); ?></h1>
	<p class="address"><?php the_field('street_address') ?><?php if(get_field('street_address_two' )) { ?>, <?php the_field('street_address_two') ?><?php } ?> | <?php the_field('city') ?>, <?php the_field('state') ?> <?php the_field('zip_code') ?></p>
	
	<?php if( have_rows('numbers') ): ?>
		<?php while ( have_rows('numbers') ) : the_row(); ?>
		
			<?php $numbers_type = get_sub_field('type'); ?>
		
			<?php if( $numbers_type === 'phone' ) { ?>
				<p class="phone"><?php the_sub_field('number'); ?></p>
			<?php } ?>
			
		<?php endwhile; ?>
	<?php else : endif; ?>
	
	<?php if( get_field('aba_membership') ) { ?>
	
		<div class="btn-group" role="group">
			
			<?php if( get_field('email') ) { ?><a href="mailto:<?php the_field('email'); ?>" class="btn btn-red"><i class="fa fa-envelope-o" aria-hidden="true"></i></a><?php } ?>
			
			<?php if( get_field('website') ) { ?><a href="<?php the_field('website'); ?>" target="_blank" class="btn btn-red"><i class="fa fa-laptop" aria-hidden="true"></i></a><?php } ?>
			
		</div>
		
		<div class="link">
		
			<a href="<?php the_permalink(); ?>" class="btn btn-blue">See Full Profile & Promotions</a>
			
		</div>
	
	<?php } ?>-->
	
    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<p class="address">
	
	    <?php the_field('street_address') ?><?php if(get_field('street_address_two' )) { ?>, <?php the_field('street_address_two') ?><?php } ?> | <?php the_field('city') ?>, <?php the_field('state') ?> <?php the_field('zip_code') ?>
	
        	<?php if(get_field('numbers' )) { ?>
        		
        		<?php if( have_rows('numbers') ): ?>
        			<?php while ( have_rows('numbers') ) : the_row(); ?>
        			
        				<?php $numbers_type = get_sub_field('type'); ?>
        
        				<?php if( $numbers_type === 'phone' ) { ?>
        					 | <?php the_sub_field('number'); ?>
        				<?php } ?>
        		
        			<?php endwhile; ?>
        		<?php else : endif; ?>
        	
        	<?php } ?>
	
	</p>
	
    <?php if(get_field('hours' )) { ?>
	
		<div class="col-sm-6 hours">

			<p><strong>Hours</strong></p>
			<?php if( have_rows('hours') ): ?>
			
				<ul>
				
					<?php while ( have_rows('hours') ) : the_row(); ?>
					
						<li><strong><?php the_sub_field('label'); ?>:</strong> <span><?php the_sub_field('details'); ?></span></li>
						
					<?php endwhile; ?>
				
				</ul>
				
			<?php else : endif; ?>
		
		</div>
	
	<?php } ?>
		
	<?php if( get_field('aba_membership') ) { ?>
	
	    <div class="clear"></div>
	
		<p class="more"><a href="<?php the_permalink(); ?>" class="button red small" data-track="view-listing">See Full Profile & Promotions  <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
	
	<?php } ?>
	
	<div class="clear"></div>

</div>