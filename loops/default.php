<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section class="content">
		<div class="container">
		
			<br>
			
			<div class="col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0 main">
			
				<h1><?php the_field('title'); ?></h1>
			
				<?php the_content(); ?>
			
			</div>
			
		</div>
	</section>

<?php endwhile; ?>

	<?php else : ?>

<?php endif; ?>