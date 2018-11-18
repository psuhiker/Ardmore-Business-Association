<?php
	$user_id = get_current_user_id();
?>

<!-- // If User is No Longer a Member -->

<?php if( have_rows('businesses', 'user_'. $user_id ) ): ?>
	<?php while( have_rows('businesses', 'user_'. $user_id ) ): the_row(); ?>
		<?php $post_object = get_sub_field('business'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
		
		    <?php if( get_field('aba_membership') ) { ?><?php } else { ?>
		    
		        <style><!--
		            .content.dashboard {
		                display: none;
		            }
		        --></style>
		        
		        <section class="content lapse">
		        	<div class="container">
		        	    <div class="col-md-8 col-md-offset-2 text-center">
		        	
    		        	    <h1>Your membership dues for<br> <strong><?php the_title(); ?></strong><br> have lapsed.</h1>
    		        	    <p>In order to continue with your membership benefits, including the ability to manage your business page, please submit your membership dues.</p>
    		        	    <p><a href="/association/membership-dues/" class="btn btn-primary">Pay Membership Dues</a></p>
    		        	    
    		        	    <br><br>
    		        	    
    		        	    <p>If you have any questions regarding the status of your membership, please contact us at <a href="mailto:info@ardmoreshops.com">info@ardmoreshops.com</a>.</p>
    		        	    
    		        	    <br><br>
		        	    
		        	    </div>
		        	</div>
		        </section>
		    
		    <?php } ?>
		
		<?php wp_reset_postdata(); endif; ?>
	<?php endwhile; ?>
<?php endif; ?>	

<!-- Dashboard -->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section class="content dashboard">
		
		<div class="col-12 marquee">
			<div class="container">
				<h1><?php the_field('title'); ?></h1>
			</div>
		</div>
		
		<div class="container">
			
			<div class="col-sm-8 col-sm-push-4 col-md-9 col-md-push-3 main">
			
				<?php if ( is_page('member-dashboard') ) { ?>
				
				    <?php include (TEMPLATEPATH . '/includes/member-dashboard.php' ); ?>
				    
				<?php } elseif ( is_page('member-administration') ) { ?>
				
				    <?php include (TEMPLATEPATH . '/includes/member-administration.php' ); ?>
				    
				<?php } elseif ( is_page('networking-directory') ) { ?>
				
				    <?php include (TEMPLATEPATH . '/includes/member-directory.php' ); ?>
				    
				<?php } ?>
			
			</div>
			
			<div class="col-sm-4 col-sm-pull-8 col-md-3 col-md-pull-9">
			
				<!-- SIDEBAR -->
				<?php 
				    $today = current_time( 'ymd', $gmt = 0 );
					$posts = get_posts(array(
						'post_type'	=> 'events',
						'meta_query' => array(
								array(
									'key' => 'date',
									'compare' => '>=',
									'value' => $today,
									'type' => 'DATE',
								),
							),
						'meta_key'	=> 'date',
						'orderby'	=> 'meta_value_num',
						'order'		=> 'ASC',
						'tag'  => 'ABA',
						'posts_per_page' => -1
					));
					if( $posts ) { 
				?>
				
				<h3>Upcoming ABA Events</h3>
				
				<?php foreach( $posts as $post ) { setup_postdata( $post ); ?>
							
				<?php 
					$date = get_field('date', false, false);
					$date = new DateTime($date);
				?>
				
				<p>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</p>
				
				<p class="date">
					<?php echo $date->format('F j, Y'); ?>
				</p>
				<p class="date">
					<span class="start-time"><?php the_field('start_time'); ?><span class="period"><?php the_field('start_time_am_pm'); ?></span></span>
					<?php if(get_field('end_time' )) { ?>
						<span class="dash">-</span>
						<span class="end-time"><?php the_field('end_time'); ?><span class="period"><?php the_field('end_time_am_pm'); ?></span></span>
					<?php } ?>
				</p>
				
				<p class="date">
					<?php if(get_field('place' )) { ?>
						<strong><?php the_field('place'); ?></strong> | 
					<?php } ?> 
					<?php if(get_field('address' )) { ?>
						<?php the_field('address'); ?>
					<?php } ?>
				</p>
				
				<br>
						
				<?php } wp_reset_postdata(); } ?>
				<!-- SIDEBAR -->
			
			</div>
			
		</div>
	</section>

<?php endwhile; ?>

	<?php else : ?>

<?php endif; ?>