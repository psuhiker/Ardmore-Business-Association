<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<body class="secondary post businesses business single sidebar-left profile">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>

	<?php 
		if( have_rows('focus_photos') ):
			while ( have_rows('focus_photos') ) : the_row();
				$bg = get_sub_field('focus_photos_photo');
				break;
			endwhile;
		else : endif; 
	?>
	
	<section id="title" style="background-image: url(<?php echo $bg; ?>)">
	
	    <div class="coverup"></div>
	    
	</section>
	
	<div id="content">
	
		<?php include (TEMPLATEPATH . '/loops/profiles.php' ); ?>
	
	</div>
	
	<?php include (TEMPLATEPATH . '/includes/background-sidebar-left.php' ); ?>
	
	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>