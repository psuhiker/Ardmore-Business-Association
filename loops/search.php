<div class="container">

	<br>
	
	<div class="col-sm-4 sidebar">
	
		<ul class="nav nav-pills nav-stacked" role="tablist">
		
			<li role="presentation" class="active"><a href="#all" aria-controls="events" role="tab" data-toggle="tab">All</a></li>
			
			<?php global $wp_query;
			$args = array_merge( $wp_query->query_vars, array( 'showposts'=>'1', 'post_type' => 'businesses' ) );
			query_posts( $args ); if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<li role="presentation"><a href="#businesses" aria-controls="businesses" role="tab" data-toggle="tab">Businesses</a></li>
			
			<?php endwhile; ?>
				<?php else : ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
			
			<?php global $wp_query;
			$args = array_merge( $wp_query->query_vars, array( 'showposts'=>'1', 'post_type' => 'events' ) );
			query_posts( $args ); if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<li role="presentation"><a href="#events" aria-controls="events" role="tab" data-toggle="tab">Events</a></li>
			
			<?php endwhile; ?>
				<?php else : ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
			
			<?php global $wp_query;
			$args = array_merge( $wp_query->query_vars, array( 'showposts'=>'1', 'post_type' => 'news' ) );
			query_posts( $args ); if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<li role="presentation"><a href="#news" aria-controls="news" role="tab" data-toggle="tab">News</a></li>
			
			<?php endwhile; ?>
				<?php else : ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
			
			<?php global $wp_query;
			$args = array_merge( $wp_query->query_vars, array( 'showposts'=>'1', 'post_type' => 'post' ) );
			query_posts( $args ); if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<li role="presentation"><a href="#articles" aria-controls="articles" role="tab" data-toggle="tab">Articles</a></li>
			
			<?php endwhile; ?>
				<?php else : ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
				
		</ul>
		
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

	<div class="col-sm-8 main">
	
		<div class="tab-content">
		
			<div role="tabpanel" class="tab-pane active" id="all">
			
			    <?php $posts = query_posts($query_string . '&orderby=type&order=asc&showposts=10&meta_key=aba_membership&meta_value=1'); if (have_posts()) : ?>
			    
			        <div role="tabpanel" class="tab-pane active" id="all">
			        
			    	    <div class="featured">
			    	    
			    	        <p class="title"><span>Featured Businesses</span></p>
			    	        
			    	        <?php while (have_posts()) : the_post(); ?>
			    	        
			    	            <?php include (TEMPLATEPATH . '/loops/display-business.php' ); ?>
			    	        	
			    	        <?php endwhile; ?>
			    	    		
			    	    </div>
			        
			        </div>
			        		
			    <?php else : ?>
			        	        
			    <?php endif; ?>
			    
			    <?php $posts = query_posts($query_string . '&orderby=type&order=asc&showposts=10&meta_key=aba_membership&meta_value=0'); if (have_posts()) : ?>
			    
			        <div role="tabpanel" class="tab-pane active" id="all">
			        
			    	    <div class="non-members">
			    	        
			    	        <?php while (have_posts()) : the_post(); ?>
			    	        
			    	            <?php include (TEMPLATEPATH . '/loops/display-business.php' ); ?>
			    	        	
			    	        <?php endwhile; ?>
			    	    		
			    	    </div>
			        
			        </div>
			        		
			    <?php else : ?>
			        	        
			    <?php endif; ?><?php wp_reset_query(); ?>
			    
			    <!-- end of businesses -->
			
			    <?php global $wp_query;
				$args = array_merge( $wp_query->query_vars, array( ) );
				query_posts( $args ); if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<?php get_post_type( $post ) ?>
					<?php if ( 'events' == get_post_type() ) { ?>
					
						<?php include (TEMPLATEPATH . '/loops/display-events.php' ); ?>
					
					<?php } elseif ( 'news' == get_post_type() ) { ?>
					
						<?php include (TEMPLATEPATH . '/loops/display-news.php' ); ?>
					
					<?php } elseif ( 'businesses' == get_post_type() ) { ?>
					
					    <!--<div class="featured">
					    
					    	<p class="title"><span>Featured Businesses</span></p>
					
					        <?php include (TEMPLATEPATH . '/loops/display-business.php' ); ?>
					    	
					    </div>
					    
					    <div class="non-members">
					    
					        <?php include (TEMPLATEPATH . '/loops/display-business.php' ); ?>
					    
					    </div>-->
					
					<?php } else { ?>
					
						<?php include (TEMPLATEPATH . '/loops/display-default.php' ); ?>
					
					<?php } ?>
				
				<?php endwhile; ?>
				
					<?php else : ?>
				
				<?php endif; ?>
					
			
			</div>
	
			<div role="tabpanel" class="tab-pane" id="events">
			
				<?php global $wp_query;
				$args = array_merge( $wp_query->query_vars, array( 'post_type' => 'events' ) );
				query_posts( $args ); if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<?php include (TEMPLATEPATH . '/loops/display-events.php' ); ?>
				
				<?php endwhile; ?>
				
					<?php else : ?>
				
				<?php endif; ?>
			
			</div>
			
			<div role="tabpanel" class="tab-pane" id="news">
			
				<?php global $wp_query;
				$args = array_merge( $wp_query->query_vars, array( 'post_type' => 'news' ) );
				query_posts( $args ); if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<?php include (TEMPLATEPATH . '/loops/display-news.php' ); ?>
				
				<?php endwhile; ?>
				
					<?php else : ?>
				
				<?php endif; ?>
			
			</div>
			
			<div role="tabpanel" class="tab-pane" id="businesses">
			
				<!--<?php global $wp_query;
				$args = array_merge( $wp_query->query_vars, array( 'post_type' => 'businesses' ) );
				query_posts( $args ); if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<?php include (TEMPLATEPATH . '/loops/display-business.php' ); ?>
				
				<?php endwhile; ?>
				
					<?php else : ?>
				
				<?php endif; ?>-->
				
				<?php $posts = query_posts($query_string . '&orderby=type&order=asc&showposts=10&meta_key=aba_membership&meta_value=1'); if (have_posts()) : ?>
				
				    <div role="tabpanel" class="tab-pane active" id="all">
				    
					    <div class="featured">
					    
					        <p class="title"><span>Featured Businesses</span></p>
					        
					        <?php while (have_posts()) : the_post(); ?>
					        
					            <?php include (TEMPLATEPATH . '/loops/display-business.php' ); ?>
					        	
					        <?php endwhile; ?>
					    		
					    </div>
				    
				    </div>
				    		
				<?php else : ?>
				    	        
				<?php endif; ?>
				
				<?php $posts = query_posts($query_string . '&orderby=type&order=asc&showposts=10&meta_key=aba_membership&meta_value=0'); if (have_posts()) : ?>
				
				    <div role="tabpanel" class="tab-pane active" id="all">
				    
					    <div class="non-members">
					        
					        <?php while (have_posts()) : the_post(); ?>
					        
					            <?php include (TEMPLATEPATH . '/loops/display-business.php' ); ?>
					        	
					        <?php endwhile; ?>
					    		
					    </div>
				    
				    </div>
				    		
				<?php else : ?>
				    	        
				<?php endif; ?>
			
			</div>
			
			<div role="tabpanel" class="tab-pane" id="articles">
			
				<?php global $wp_query;
				$args = array_merge( $wp_query->query_vars, array( 'post_type' => 'post' ) );
				query_posts( $args ); if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<?php include (TEMPLATEPATH . '/loops/display-default.php' ); ?>
				
				<?php endwhile; ?>
				
					<?php else : ?>
				
				<?php endif; ?>
			
			</div>
		
		</div>
	
	</div>
	
</div>