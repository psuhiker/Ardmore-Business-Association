<div class="container">

	<div class="col-sm-4 col-xs-12 sidebar sidebar-left">
	
		<?php get_sidebar(); ?>
	
	</div>

	<div class="col-sm-8 col-xs-12 main-content">
	
		<?php if (have_posts()) : ?>
		
			<?php while (have_posts()) : the_post(); ?>
			
				<div class="item">
		
					<div class="details">
					
						<h3><?php the_title(); ?></h3>
						
						<p class="date"><?php the_time('F, j Y'); ?></p>
						
						<?php if(has_post_thumbnail()) { ?>
							<div class="thumb col-sm-4 col-xs-6">
								<img src="<?php the_post_thumbnail_url(); ?>">
							</div>
						<?php } ?>
						
						<div class="excerpt">
							<?php the_excerpt(); ?>
						</div>
						
						<p class="more"><a href="<?php the_permalink(); ?>" class="button red small">Read Article <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
						
						<div class="clear"></div>
						<hr>
						
					</div>
				
				</div>
		
			<?php endwhile; ?>
		
			<?php else : ?>
		
		<?php endif; ?>
	    
	</div>
	
	<div class="col-sm-8 col-sm-offset-4 col-xs-12 pages">
	
		<?php the_posts_pagination( $args ); ?> 
	
	</div>
	
</div>