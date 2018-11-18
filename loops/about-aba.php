<section class="board">
	<div class="container">
	
		<h2><span>Ardmore Business Association Board</span></h2>
	
		<div class="directors">
	
			<?php if( have_rows('board_of_directors') ): ?>
			
				<h3>Board of Directors</h3>
			
			<?php while ( have_rows('board_of_directors') ) : the_row(); ?>
			
			        <div class="col-md-4 board-member">
			        
			        	<p class="name"><span><?php the_sub_field('title'); ?></span> <strong><?php the_sub_field('name'); ?></strong></p>
			        	
			        	<?php if(get_sub_field('business' )) { ?>
			        		
			        		<?php $post_object = get_sub_field('business'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
			        			<p class="business"><a href="<?php the_permalink(); ?>" data-track="view-listing"><?php the_title(); ?></a></p>
			        		    <?php wp_reset_postdata(); ?>
			        		<?php endif; ?>
			        		
			        	<?php } ?>
			        
			        </div>
			
			<?php endwhile; else : endif; ?>
			
			<div class="clear"></div>
		
		</div>
		
		<div class="members">
		
			<?php if( have_rows('board_members') ): ?>
			
			    <h3>Board Members</h3>
			
			<?php while ( have_rows('board_members') ) : the_row(); ?>
			
			        <div class="col-md-4 col-sm-6 board-member">
			        
			        	<p class="name"><strong><?php the_sub_field('name'); ?></strong></p>
			        	
			        	<?php if(get_sub_field('business' )) { ?>
			        		
			        		<?php $post_object = get_sub_field('business'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
			        			<p class="business"><a href="<?php the_permalink(); ?>" data-track="view-listing"><?php the_title(); ?></a></p>
			        		    <?php wp_reset_postdata(); ?>
			        		<?php endif; ?>
			        		
			        	<?php } ?>
			        	
			        	<?php if(get_sub_field('business_second' )) { ?>
			        		
			        		<?php $post_object = get_sub_field('business_second'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
			        			<p class="business"><a href="<?php the_permalink(); ?>" data-track="view-listing"><?php the_title(); ?></a></p>
			        		    <?php wp_reset_postdata(); ?>
			        		<?php endif; ?>
			        		
			        	<?php } ?>
			        
			        </div>
			
			<?php endwhile; else : endif; ?>
			
			<div class="clear"></div>
		
		</div>
		
		<div class="col-md-8 col-md-offset-2">
		
			<?php the_field('board_copy'); ?>
			
		</div>
	
	</div>
</section>

<section class="members">
	<div class="container">
	
		<h2><span>Ardmore Business Association Members</span></h2>
		
		<ul>
		
		<?php 
		    $posts = get_posts(array(
			    'post_type' => 'businesses',
			    'posts_per_page' => -1,
			    'meta_key' => 'aba_membership',
			    'meta_value' => '1',
			    'orderby' => 'title',
			    'order' => 'ASC',
		    ));
		    if( $posts ): ?>
			
				<?php foreach( $posts as $post ):setup_postdata( $post ) ?>
			
					<li><a href="<?php the_permalink(); ?>" data-track="view-listing"><?php the_title(); ?></a></li>
			
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
			
			<?php endif; ?>
			
		</ul>
	
	</div>
</section>