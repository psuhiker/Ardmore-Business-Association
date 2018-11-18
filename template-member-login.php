<?php /* 
Template Name: Member Login Page
*/ ?>

<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<body class="secondary page<?php the_ID(); ?> member-login">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>
	
	<div id="content">
	
		<?php include (TEMPLATEPATH . '/loops/member-login.php' ); ?>
	
	</div>
	
	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>