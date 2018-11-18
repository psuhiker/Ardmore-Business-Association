<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<body class="error">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>
	
	<div id="content">
		
		<div class="search col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
		
			<p class="copy"><?php echo ( get_theme_mod( 'error_text' ) ); ?></p>
			
			<div class="col-md-8 col-md-offset-2">
		
				<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
				
					<div class="input-group">
				
					    <input type="text" value="" name="s" id="s" placeholder="Search events, news, and businesses" class="form-control" />
					    
					    <span class="input-group-btn">
					    	<button class="btn btn-default" type="button">Go</button>
					    </span>
				    
				    </div>
				    
				</form>
			
			</div>
			
			<div class="clear"></div>
		
		</div>
		
		<div class="clear"></div>
	
	</div>
	
	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>