<div class="item">

	<h1><?php the_title(); ?></h1>
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
	
</div>