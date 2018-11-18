<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section class="sixtysix-third">
		<div class="container">
		
			<div class="col-sm-8 col-xs-12 one">
				<div class="inner">
					
					<h1><?php the_title(); ?></h1>
					
						<?php the_content(); ?>
			
				</div>
			</div>
		
			<div class="col-xs-12 col-sm-4 two">
				<div class="inner">
			
					<?php get_sidebar(); ?>
			
				</div>
			</div>
			
			<div class="clear"></div>
			
		</div>
	</section>
    
    <?php the_field('custom_script'); ?>

<?php endwhile; ?>

	<?php else : ?>

<?php endif; ?>