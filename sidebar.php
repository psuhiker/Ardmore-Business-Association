<?php if (is_post_type_archive( 'events' )) { ?>

	<div class="events-search">
	
		<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		
			<div class="input-group">
		
			    <input type="text" value="" name="s" id="s" placeholder="Search Ardmore Events" class="form-control" />
			    <input type="hidden" name="post_type" value="events" />
			    
			    <span class="input-group-btn">
			    	<button class="btn btn-default" type="button">Go!</button>
			    </span>
		    
		    </div>
		    
		</form>
	
	</div>
	
	<div class="clear"></div>
	
	<?php include (TEMPLATEPATH . '/includes/banner-ads.php' ); ?>

<?php } ?>

<?php if (is_post_type_archive( 'news' )) { ?>

	<div class="events-search">
	
		<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		
			<div class="input-group">
		
			    <input type="text" value="" name="s" id="s" placeholder="Search Ardmore News" class="form-control" />
			    <input type="hidden" name="post_type" value="news" />
			    
			    <span class="input-group-btn">
			    	<button class="btn btn-default" type="button">Go!</button>
			    </span>
		    
		    </div>
		    
		</form>
	
	</div>
	
	<div class="clear"></div>
	
	<?php include (TEMPLATEPATH . '/includes/banner-ads.php' ); ?>

<?php } ?>

<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar('sidebar-1') ) : ?>
<?php endif; ?>