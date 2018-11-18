<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="container">
	
		<div class="col-sm-8 col-xs-12 main main-content">
			<div class="wrapper">
			
				<h1><?php the_title(); ?></h1>
			    
				<?php the_content(); ?>
			
			</div>    
		</div>
		
		<div class="col-sm-4 col-xs-12 sidebar sidebar-right">
			
			<div class="panel panel-default">
			
				<div class="panel-heading">Ardmore News</div>
				
				<ul class="list-group">
				
					<?php 
					    $posts = get_posts(array(
						    'post_type' => 'news',
						    'posts_per_page' => 10
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
			
	</div>

<?php endwhile; ?>

	<?php else : ?>

<?php endif; ?>
