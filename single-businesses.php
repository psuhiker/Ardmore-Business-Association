<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<body class="secondary post businesses fuelux single sidebar-right">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>
	
	<div id="content">
	
		<?php include (TEMPLATEPATH . '/loops/business.php' ); ?>
	
	</div>
	
	<?php include (TEMPLATEPATH . '/includes/background-sidebar-right.php' ); ?>
	
	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>