<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">

	<div class="input-group">

	    <input type="text" value="" name="s" id="s" placeholder="Search for Ardmore Businesses" class="form-control" />
	    <input type="hidden" name="post_type" value="businesses" />
	    
	    <span class="input-group-btn">
	    	<button class="btn btn-default" type="button">Go!</button>
	    </span>
    
    </div>
    
</form>

<div class="clear"></div>

<?php include (TEMPLATEPATH . '/includes/banner-ads.php' ); ?>