<?php 
	$date = get_field('date', false, false);
	$date = new DateTime($date);
?>

<div class="item">

	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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
	    <?php echo $date->format('F j, Y'); ?>  
		<span class="start-time"><?php if (get_field('start_time')) { ?> | <?php } ?><?php the_field('start_time'); ?><span class="period"><?php the_field('start_time_am_pm'); ?></span></span>
		<?php if(get_field('end_time' )) { ?>
			<span class="dash">-</span>
			<span class="end-time"><?php the_field('end_time'); ?><span class="period"><?php the_field('end_time_am_pm'); ?></span></span>
		<?php } ?>
	</p>
	<p class="more"><a href="<?php the_permalink(); ?>" class="button red small">Event Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
	
	<div class="clear"></div>
	
</div>