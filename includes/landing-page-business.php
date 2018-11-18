<div class="col-xs-12 col-sm-6 col-md-4 text-center business">
	<div class="thumbnail">
    	<div class="businessName">
        	<?php if(get_field('logo' )) { ?>
        	    <?php if( get_field('aba_membership') ) { ?>
            	    <div class="hidden-xs hidden-sm hidden-md hidden-lg">
            	    	<h3><?php the_title(); ?></h3>
            	    </div>
            	    <div class="logo" style="background-image: url(<?php the_field('logo'); ?>);">
            	    	<?php if( get_field('aba_membership') ) { ?>
            	    	    <a href="<?php the_permalink(); ?>" data-track="view-listing">
            	    	    	<img src="<?php bloginfo('template_directory'); ?>/images/spacer.png">
            	    	    </a>
            	    	<?php } ?>
            	    </div>
            	<?php } else { ?>
            	    <div class="vertical-align">
            	    	<div class="wrapper">
            	    		<div class="content">
                        	    <h3>
                        	        <?php the_title(); ?>
                        	    </h3>
            	    		</div>
            	    	</div>
            	    </div>
            	<?php } ?>
        	<?php } else { ?>
        	    <div class="vertical-align">
        	    	<div class="wrapper">
        	    		<div class="content">
        	    			<?php if( get_field('aba_membership') ) { ?>
        	    			    <h3>
            	    			    <a href="<?php the_permalink(); ?>" data-track="view-listing">
            	    			    	<?php the_title(); ?>
            	    			    </a>
        	    			    </h3>
        	    			<?php } else { ?>
        	    			    <h3>
        	    			        <?php the_title(); ?>
        	    			    </h3>
        	    			<?php } ?>
        	    		</div>
        	    	</div>
        	    </div>
        	<?php } ?>
    	</div>
    	<div class="businessInfo col-xs-12 text-center">
    		<p><?php the_field('street_address') ?></p>
    		<?php if( have_rows('numbers') ): ?>
    			<?php while ( have_rows('numbers') ) : the_row(); ?>
    				<?php $numbers_type = get_sub_field('type'); ?>
    				<?php if( $numbers_type === 'phone' ) { ?>
    					<p><?php the_sub_field('number'); ?></p>
    				<?php } ?>
    			<?php endwhile; ?>
    		<?php else : endif; ?>
    		<?php if( get_field('aba_membership') ) { ?>
    		    <p class="businessLink">
    			    <a href="<?php the_permalink(); ?>" data-track="view-listing">
    			    	View Page <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    			    </a>
    		    </p>
    		<?php } ?>
    	</div>
		<!--<?php if( get_field('map_icon') ) { ?>
	    	<div class="businessMap" style="background-image: url(<?php the_field('map_icon'); ?>);">-->
	    		<!--<script>
	    		      function initMap<?php the_id(); ?>() {
	    		        var uluru<?php the_id(); ?> = {lat: -25.363, lng: 131.044};
	    		        var address<?php the_id(); ?> ="<?php the_field('street_address') ?>, <?php the_field('city') ?>, <?php the_field('state') ?> <?php the_field('zip_code') ?>";
	    		        var map<?php the_id(); ?> = new google.maps.Map(document.getElementById('map<?php the_id(); ?>'), {
	    		          zoom: 4,
	    		          center: uluru<?php the_id(); ?>,
	    		          disableDefaultUI: true
	    		        });
	    		        var marker = new google.maps.Marker({
	    		          position: uluru<?php the_id(); ?>,
	    		          map: map<?php the_id(); ?>
	    		        });
	    		      }
	    		</script>
	    		<script async defer
	    		    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbwDU4Lw6xsdh-inBHiuTBSoDMEHZQ3ag&callback=initMap<?php the_id(); ?>">
	    		</script>-->
	    	<!--</div>
		<?php } ?>-->
        <div class="clearfix"></div>
	</div>
</div>