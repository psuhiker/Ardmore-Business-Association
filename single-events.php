<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<body class="secondary post event single sidebar-left">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>
	
	<section id="title">
	
	    <div class="coverup"></div>
	    
	</section>
	
	<div id="content">
	
		<?php include (TEMPLATEPATH . '/loops/events.php' ); ?>
	
	</div>
	
	<?php include (TEMPLATEPATH . '/includes/background-sidebar-left.php' ); ?>
	
	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>