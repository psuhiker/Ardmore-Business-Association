<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="container">
	
		<div class="col-sm-8 col-sm-offset-4 main">
			
			<h1><?php the_title(); ?></h1>
					    
		</div>
	
		<div class="col-sm-4 col-xs-12 sidebar sidebar-right">
		
			<?php 
				$date = get_field('date', false, false);
				$date = new DateTime($date);
				$end_date = get_field('end_date', false, false);
				$end_date = new DateTime($end_date);
			?>
		
			<div class="details_time">
				<p class="time-label"><strong>When</strong></p>
				<p class="date">
					<?php echo $date->format('F j, Y'); ?>
					<?php if(get_field('end_date' )) { ?>
					 - <?php echo $end_date->format('F j, Y'); ?>
					<?php } ?>
				</p>
				<p class="time">
					<span class="start-time"><?php the_field('start_time'); ?><span class="period"><?php the_field('start_time_am_pm'); ?></span></span>
					<?php if(get_field('end_time' )) { ?>
						<span class="dash">-</span>
						<span class="end-time"><?php the_field('end_time'); ?><span class="period"><?php the_field('end_time_am_pm'); ?></span></span>
					<?php } ?>
				</p>
			</div>
			
			<div class="location">
				<p class="address-label"><strong>Where</strong></p>
				<p class="place"><?php the_field('place'); ?></p>
				<p class="street"><?php the_field('address'); ?></p>
				<p class="city-state-zip"><span class="city"><?php the_field('city'); ?></span><?php if(get_field('state' )) { ?>, <span class="state"><?php the_field('state'); ?></span><?php } ?> <span class="zip"><?php the_field('zip_code'); ?></span></p>
			</div>
			
			<?php if(get_field('aba_business_member' )) { ?>
				<div class="aba-member">
					<p class="member-label"><strong>Sponsored By:</strong></p>
					<?php $post_object = get_field('aba_member'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
						<p class="member-name"><?php the_title(); ?></p>
						<p class="profile-link"><a href="<?php the_permalink(); ?>" class="button small red" data-track="view-listing">View Profile <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
					    <?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>
			<?php } ?>
			
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
		
			<div class="description">
		    	<?php the_field('description'); ?>
		    </div>
		    
		    <!--<?php if ( has_post_thumbnail() ) { ?>
    		    <div class="image">
    		        <?php the_post_thumbnail(); ?>
    		    </div>
    		<?php } ?>-->
    		
    		<br><br>
		    
		</div>
		
	</div>

<?php endwhile; ?>

	<?php else : ?>

<?php endif; ?>
