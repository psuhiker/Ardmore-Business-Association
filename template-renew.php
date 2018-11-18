<?php /*
Template Name: Renew Membership
*/ ?>

<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<body class="secondary page<?php the_ID(); ?>">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>

	<div id="content">

		<?php include (TEMPLATEPATH . '/loops/renew.php' ); ?>

	</div>

	<?php get_footer(); ?>

	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>
