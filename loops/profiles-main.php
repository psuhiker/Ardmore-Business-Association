<div class="container">

	<div class="col-sm-4 col-xs-12 sidebar sidebar-left">
	
		<?php get_sidebar(); ?>
		<?php include (TEMPLATEPATH . '/includes/banner-ads.php' ); ?>
	
	</div>

	<div class="col-sm-8 col-xs-12 main-content">
	
		<?php 
    		$posts = get_posts(array(
    			'post_type' => 'profiles',
    			'posts_per_page' => -1
    		));
    		if( $posts ):
    		foreach( $posts as $post ):setup_postdata( $post ) 
    	?>
    	
    		<div class="col-md-6">
				<div class="profile-item">
				
					<?php 
						if( have_rows('focus_photos') ):
							while ( have_rows('focus_photos') ) : the_row();
								$bg = get_sub_field('focus_photos_photo');
								break;
							endwhile;
						else : endif; 
					?>
					
					<div class="preview-image" style="background-image: url(<?php echo $bg; ?>)"></div> 
				
					<h3><?php the_title(); ?></h3>
					<p><?php the_excerpt(); ?></p>
					<p class="more">
						<a href="<?php the_permalink(); ?>" class="button red small">
							Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</a>
					</p>
					
				</div> 
			</div> 
    					
    	<?php 
    		endforeach;
    		wp_reset_postdata();
    		else : endif; 
    	?>
	    
	</div>
	
</div>