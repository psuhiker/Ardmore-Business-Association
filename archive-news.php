<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<body class="secondary post news main-page sidebar-left">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>
	
	<section id="title">
	
	    <div class="coverup"></div>
	        
	    <div class="copy">
	        
	        <h1 style="text-align: center; margin-top: 10px;">Ardmore News</h1>
	        
	    </div>
	    
	</section>
	
	<div id="content">
		
		<?php include (TEMPLATEPATH . '/loops/news-main.php' ); ?>
	
	</div>
	
	<?php include (TEMPLATEPATH . '/includes/background-sidebar-left.php' ); ?>
	
	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>