<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<body class="secondary post event single sidebar-left profile">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>

	<?php
		$focusID = get_the_id();
		$post_object = get_field('focus_business');
		if($post_object):
			$post = $post_object;
			setup_postdata($post);
	?>
	
		<?php 
			the_title();
			if( have_rows('focus_photos') ): ?>has photos
			<?php while ( have_rows('focus_photos') ) : the_row(); 
		?>
			the photo
			<?php the_sub_field('focus_photos_photo'); ?>
		<?php 
			endwhile;
			else : endif;
		?>
	
	<?php
		wp_reset_postdata;
		endif;
	?>
	
	<section id="title">
	
	    <div class="coverup"></div>
	    
	</section>
	
	<div id="content">
	
		<?php include (TEMPLATEPATH . '/loops/profiles.php' ); ?>
	
	</div>
	
	<?php include (TEMPLATEPATH . '/includes/background-sidebar-left.php' ); ?>
	
	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>