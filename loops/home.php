<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php if( get_field('marquee_slides') ) { ?>

		<?php include (TEMPLATEPATH . '/loops/marquee.php' ); ?>
		
	<?php } ?>
    
    <section class="content" id="copy">
    	<div class="container">
    	
    		<div class="col-sm-4 sidebar sidebar-left">
    		
    			<br>
    			
    			<div class="panel panel-default">
    			
    				<div class="panel-heading">Upcoming Events</div>
    				
    				<ul class="list-group">
    				
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
    							'posts_per_page' => 3,
    							'orderby'	=> 'meta_value_num',
    							'order'		=> 'ASC'
    						));
    						if( $posts ) {
    							foreach( $posts as $post ) {
    								setup_postdata( $post ); ?>
    								
    								<?php 
    									$date = get_field('date', false, false);
    									$date = new DateTime($date);
    								?>
    					
    						    <li class="list-group-item">
    						    	<p class="date"><?php echo $date->format('F j, Y'); ?></p>
    						    	<h3><?php the_title(); ?></h3>
    						    	<p class="more"><a href="<?php the_permalink(); ?>">View details</a></p>
    						    	<hr>
    						    </li>
    					    
    					<?php } wp_reset_postdata(); } ?>
    				
    				</ul>
    				
    				<p class="more"><a class="button red small" href="/events/">All Events <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
    				
    			</div>
    		
    			<div class="panel panel-default">
    			
    				<div class="panel-heading">Ardmore News</div>
    				
    				<ul class="list-group">
    				
    					<?php 
    					    $posts = get_posts(array(
    						    'post_type' => 'news',
    						    'posts_per_page' => 3
    					    ));
    					if( $posts ): ?>
    						<?php foreach( $posts as $post ):setup_postdata( $post ) ?>
    					
    						    <li class="list-group-item">
    						    	<p class="date"><?php the_time('F j, Y'); ?></p>
    						    	<h3><?php the_title(); ?></h3>
    						    	<p class="more"><a href="<?php the_permalink(); ?>">View details</a></p>
    						    	<hr>
    						    </li>
    					    
    					    <?php endforeach; ?>
    					    <?php wp_reset_postdata(); ?>
    					<?php else : ?>
    					
    					<?php endif; ?>
    				
    				</ul>
    				
    				<p class="more"><a class="button red small" href="/news/">All News <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
    				
    			</div>
    		
    		</div>
    		
    		<div class="col-sm-8 main">
    		
    			<div class="headline">
    				<h1><?php the_field('title'); ?></h1>
    			</div>
    		
    			<div class="search col-sm-8 col-sm-offset-2 col-xs-12">
    			
    				<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    				
    					<div class="input-group">
    				
    					    <input type="text" value="" name="s" id="s" placeholder="Search events, news, and businesses" class="form-control" />
    					    
    					    <span class="input-group-btn">
    					    	<button class="btn btn-default" type="button">Go</button>
    					    </span>
    				    
    				    </div>
    				    
    				</form>
    				
    				<div class="clear"></div>
    			
    			</div>
    		
    			<div class="clear"></div>
    			
    			<div class="col-xs-12">
    				<p class="featured"><span>Featured</span></p>
    			</div>
    			
    			<div class="clear"></div>
    			
    			<?php if( have_rows('featured_items') ): while ( have_rows('featured_items') ) : the_row(); ?>
    			
    			    <div class="col-md-6">
    			    
    			        <?php if( get_sub_field('featured_item_type') == 'next_event' ) { ?>
    			        
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
    			            		'posts_per_page' => 1,
    			            		'orderby'	=> 'meta_value_num',
    			            		'order'		=> 'ASC'
    			            	));
    			            	if( $posts ) {
    			            		foreach( $posts as $post ) {
    			            			setup_postdata( $post ); ?>
    			            			
    			            			<?php 
    			            				$date = get_field('date', false, false);
    			            				$date = new DateTime($date);
    			            			?>
    			            			
    			            		<div class="thumbnail">
    			            			<div class="image-bg" <?php if ( has_post_thumbnail() ) { ?>style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"<?php } else { ?>style="background-image: url(<?php bloginfo('template_directory'); ?><?php echo "/images/footer-bg.png" ?>);"<?php } ?>>
    			            				<div class="wrapper">
												<div class="content">
	    			            					<h3><?php the_title(); ?></h3>
	    			            					<p class="date"><?php echo $date->format('F j, Y'); ?></p>
												</div>
    			            				</div>
    			            			</div>
    			            			<div class="caption">
    			            				<p class="description"><?php the_field('excerpt'); ?></p>
    			            				<div class="clear"></div>
    			            				<p class="more"><a href="<?php the_permalink(); ?>" class="button small blue" data-track="featured-click">Event Details <i class="fa fa-long-arrow-right" aria-hidden="true" data-track="featured-click"></i></a><div class="clearfix"></div></p>
    			            			</div>
    			            			<div class="clearfix"></div>
    			            		</div>
    			                
    			            <?php } wp_reset_postdata(); } ?>
    			            
    			        <?php } elseif( get_sub_field('featured_item_type') == 'next_next_event' ) { ?>
    			        
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
    			            		'posts_per_page' => 1,
    			            		'offset'=> '1',
    			            		'orderby'	=> 'meta_value_num',
    			            		'order'		=> 'ASC'
    			            	));
    			            	if( $posts ) {
    			            		foreach( $posts as $post ) {
    			            			setup_postdata( $post ); ?>
    			            			
    			            			<?php 
    			            				$date = get_field('date', false, false);
    			            				$date = new DateTime($date);
    			            			?>
    			            			
    			            		<div class="thumbnail">
    			            			<div class="image-bg" <?php if ( has_post_thumbnail() ) { ?>style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"<?php } else { ?>style="background-image: url(<?php bloginfo('template_directory'); ?><?php echo "/images/footer-bg.png" ?>);"<?php } ?>>
    			            				<div class="wrapper">
												<div class="content">
	    			            					<h3><?php the_title(); ?></h3>
	    			            					<p class="date"><?php echo $date->format('F j, Y'); ?></p>
												</div>
    			            				</div>
    			            			</div>
    			            			<div class="caption">
    			            				<p class="description"><?php the_field('excerpt'); ?></p>
    			            				<div class="clear"></div>
    			            				<p class="more"><a href="<?php the_permalink(); ?>" class="button small blue" data-track="featured-click">Event Details <i class="fa fa-long-arrow-right" aria-hidden="true" data-track="featured-click"></i></a><div class="clearfix"></div></p>
    			            			</div>
    			            		</div>
    			                
    			            <?php } wp_reset_postdata(); } ?>
    			        
    			        <?php } elseif( get_sub_field('featured_item_type') == 'event' ) { ?>
    			        
    			            <?php $post_object = get_sub_field('featured_item_type_event'); if( $post_object ):  $post = $post_object; setup_postdata( $post ); ?>
    			            
    			                <?php 
    			                	$date = get_field('date', false, false);
    			                	$date = new DateTime($date);
    			                ?>
    			            
    			                <div class="thumbnail">
        			            	<div class="image-bg" <?php if ( has_post_thumbnail() ) { ?>style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"<?php } else { ?>style="background-image: url(<?php bloginfo('template_directory'); ?><?php echo "/images/footer-bg.png" ?>);"<?php } ?>>
        			            		<div class="wrapper">
											<div class="content">
	        			            			<h3><?php the_title(); ?></h3>
	        			            			<p class="date"><?php echo $date->format('F j, Y'); ?></p>
											</div>
        			            		</div>
        			            	</div>
        			            	<div class="caption">
        			            	    <!--<?php the_id(); ?>-->
        			            		<p class="description"><?php the_field('excerpt'); ?></p>
        			            		<div class="clear"></div>
        			            		<p class="more"><a href="<?php the_permalink(); ?>" class="button small blue" data-track="featured-click">Event Details <i class="fa fa-long-arrow-right" aria-hidden="true" data-track="featured-click"></i></a><div class="clearfix"></div></p>
        			            	</div>
        			            </div>
        			            
        			        <?php endif; wp_reset_postdata(); ?>
    			        
    			        <?php } elseif( get_sub_field('featured_item_type') == 'business' ) { ?>
    			        
    			            <?php $post_object = get_sub_field('featured_item_type_business'); if( $post_object ):  $post = $post_object; setup_postdata( $post ); ?>
    			            
    			                <?php 
    			                	$date = get_field('date', false, false);
    			                	$date = new DateTime($date);
    			                ?>
    			        
        			            <div class="thumbnail">
        			            	<div class="image-bg" <?php if ( has_post_thumbnail() ) { ?>style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"<?php } else { ?>style="background-image: url(<?php bloginfo('template_directory'); ?><?php echo "/images/footer-bg.png" ?>);"<?php } ?>>
        			            		<div class="wrapper">
											<div class="content">
												<h3><?php the_title(); ?></h3>
											</div>
        			            		</div>
        			            	</div>
        			            	<div class="caption">
        			            		<p class="description"><?php the_field('business_excerpt'); ?></p>
        			            		<div class="clear"></div>
        			            		<p class="more"><a href="<?php the_permalink(); ?>" class="button small blue" data-track="featured-click">View Profile <i class="fa fa-long-arrow-right" aria-hidden="true" data-track="featured-click"></i></a></p>
        			            	</div>
        			            </div>
    			            
    			            <?php endif; wp_reset_postdata(); ?>
							
						<?php } elseif( get_sub_field('featured_item_type') == 'landing_page' ) { ?>
						
						    <?php $post_object = get_sub_field('featured_item_type_landing_page'); if( $post_object ):  $post = $post_object; setup_postdata( $post ); ?>
						    
						        <div class="thumbnail">
						        	<div class="image-bg" <?php if ( has_post_thumbnail() ) { ?>style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"<?php } else { ?>style="background-image: url(<?php bloginfo('template_directory'); ?><?php echo "/images/footer-bg.png" ?>);"<?php } ?>>
						        		<div class="wrapper">
											<div class="content">
							        			<h3><?php the_field('seo_title_tag'); ?></h3>
											</div>
						        		</div>
						        	</div>
						        	<div class="caption">
						        		<p class="description"><?php the_field('seo_description'); ?></p>
						        		<div class="clear"></div>
						        		<p class="more"><a href="<?php the_permalink(); ?>" class="button small blue" data-track="featured-click">Learn More <i class="fa fa-long-arrow-right" aria-hidden="true" data-track="featured-click"></i></a><div class="clearfix"></div></p>
						        	</div>
						        </div>
						        
						    <?php endif; wp_reset_postdata(); ?>
    			        
    			        <?php } ?>
    			    
    			    </div>
    			        
    			<?php endwhile; else : endif; ?>
    			
    			<div class="clear"></div>
    			
    			<div class="col-md-12 copy">
    			
    				<?php the_content(); ?>
    				
    				<div class="clear"></div>
    				
    				<br><br>
    				
    				<div class="col-sm-6">
    				
    					<p class="member-cta"><a href="<?php the_field('primary_call_to_action_link'); ?>" class="button red large" data-track="become-a-member"><?php the_field('primary_call_to_action_text'); ?></a></p>
    				
    				</div>
    				
    				<div class="col-sm-6 join">
    				
    					<p><a href="<?php the_field('secondary_call_to_action_link'); ?>" data-track="learn-about-membership"><?php the_field('secondary_call_to_action_text'); ?></a></p>
    				
    				</div>
    			
    			</div>
    		
    		</div>
    	
    	</div>
    </section>

<?php endwhile; ?>

	<?php else : ?>

<?php endif; ?>