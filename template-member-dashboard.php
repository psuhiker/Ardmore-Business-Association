<?php /* 
Template Name: Member Dashboard Page
*/ ?>

<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<body class="secondary page<?php the_ID(); ?> member-dashboard">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>
	
	<div id="content">
    	
    	<?php if ( is_user_logged_in() ) { ?>
    	
    		<?php include (TEMPLATEPATH . '/loops/member-dashboard.php' ); ?>
    		
    	<?php } else { ?>
    	
    	    <div class="member-login" style="margin-top: -50px">
    		
    		    <?php include (TEMPLATEPATH . '/loops/member-login.php' ); ?>
    		
    	    </div>
    		
    	<?php } ?>
    	
    </div>
	
	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>