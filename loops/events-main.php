<div class="container">

	<div class="col-sm-4 col-xs-12 sidebar sidebar-left">
	
		<?php get_sidebar(); ?>
	
	</div>

	<div class="col-sm-8 col-xs-12 main-content">
	
		<?php // if (have_posts()) : ?>
		
			<?php // while (have_posts()) : the_post(); ?>
			
		
		<?php 
		    //$today = current_time('mysql');
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
				'posts_per_page' => -1
			));
			if( $posts ) {
				foreach( $posts as $post ) {
					setup_postdata( $post ); ?>
					
					<?php 
						$date = get_field('date', false, false);
						$date = new DateTime($date);
					?>
			
				<div class="item">
					
					<div class="details">
					
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="date"><?php echo $date->format('F j, Y'); ?></p>
						<p>
							<?php if(get_field('place' )) { ?>
								<strong><?php the_field('place'); ?></strong> | 
							<?php } ?> 
							<?php if(get_field('address' )) { ?>
								<?php the_field('address'); ?> | 
							<?php } ?>
							<?php if(get_field('city' )) { ?>
								<?php the_field('city'); ?>,
							<?php } ?>
							<?php if(get_field('state' )) { ?>
								<?php the_field('state'); ?>
							<?php } ?> 
							<?php if(get_field('zip_code' )) { ?>
								<?php the_field('zip_code'); ?>
							<?php } ?>
						</p>
						<p class="time">
							<span class="start-time"><?php the_field('start_time'); ?><span class="period"><?php the_field('start_time_am_pm'); ?></span></span>
							<?php if(get_field('end_time' )) { ?>
								<span class="dash">-</span>
								<span class="end-time"><?php the_field('end_time'); ?><span class="period"><?php the_field('end_time_am_pm'); ?></span></span>
							<?php } ?>
						</p>
						<p class="more"><a href="<?php the_permalink(); ?>" class="button red small">Event Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
						
						<div class="clear"></div>
						<hr>
						
					</div>
				
				</div>
				
		<?php } wp_reset_postdata(); } ?>
		
			<?php // endwhile; ?>
		
			<?php // else : ?>
		
		<?php // endif; ?>
	    
	</div>
	
	<!--<div class="col-sm-8 col-sm-offset-4 col-xs-12 pages">
	
		<?php the_posts_pagination( $args ); ?> 
	
	</div>-->
	
</div>