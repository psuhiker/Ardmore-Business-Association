<?php /* 
Template Name: Create Account
*/ ?>

<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
<?php include (TEMPLATEPATH . '/includes/script-query.php' ); ?>
</head>

<body class="secondary page<?php the_ID(); ?>">

	

	<?php 
	    $firstName = $_GET['firstName'];
	    $lastName = $_GET['lastName'];
	    $business = $_GET['business'];
	    $address = $_GET['address'];
	    $email = $_GET['email'];
	    $phone = $_GET['phone'];
	    $cell = $_GET['cell'];
	    $website = $_GET['website'];
	    $typeOfBusiness = $_GET['typeOfBusiness'];
	    $yearsInBusiness = $_GET['yearsInBusiness'];
	    $applicationCode = $_GET['applicationCode'];
	    $postsPending = get_posts(
	    	array(
	    		'post_type'	=> 'pending',
	    		'posts_per_page' => 1,
	    		'orderby' => 'title',
	    		'order' => ASC,
	    		'meta_query' => array( 
	    			array(
	    			    'key' => 'application_code',
	    			    'value' => $applicationCode
	    			)
	    		)
	    	));
	    if( $postsPending ) { 
	    foreach( $postsPending as $post ) { setup_postdata( $post );
	    	$applicationCodeID = get_the_id();
	    } wp_reset_postdata(); };
	    // Updates the Record as Paid
	    //echo $applicationCodeID;
	    update_post_meta( $applicationCodeID, 'status', 'pendingPaid' );
	    //$redirect_url = site_url() . '/association/join/create-an-account/?payment=true&firstname=' . $firstName . '&lastname=' . $lastName . '&business=' . $business . '&address=' . $address . '&email=' . $email . '&phone=' . $phone . '&cell=' . $cell . '&website=' . $website . '&typeOfBusiness=' . $typeOfBusiness . '&yearsInBusiness=' . $yearsInBusiness . '&applicationCode=' . $applicationCode . '';
	?>
	

	<?php include (TEMPLATEPATH . '/header.php' ); ?>
	
	<div id="content">
	
		<section class="content section-one-full" style="background-color: #f3f7eb;">
			<div class="container">
			
				<div class="col-md-8">
				
					<?php the_content(); ?>
					
				</div>
				
				<div class="clear"></div>
				
				<br>
				
				<div class="col-md-6 text-left">
				
					<?php ninja_forms_display_form( 3 ); ?>
				    
				</div>
					    
				<div class="col-md-4 col-md-offset-1">
				
					
					    	
				</div>
				
				<div class="clear"></div>
			
			</div>
		</section>
	
	</div>
	
	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>