<?php /* 
Template Name: Payment Page
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
	    $redirect_url = site_url() . '/association/join/create-an-account/?payment=true&firstName=' . $firstName . '&lastName=' . $lastName . '&businessName=' . $business . '&address=' . $address . '&email=' . $email . '&phone=' . $phone . '&cell=' . $cell . '&website=' . $website . '&typeOfBusiness=' . $typeOfBusiness . '&yearsInBusiness=' . $yearsInBusiness . '&applicationCode=' . $applicationCode . '';
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
				
					<div class="membership-summary">
				
						<h3>ABA Membership</h3>
					
						<p><?php echo $firstName; ?> <?php echo $lastName; ?>, <?php echo $business; ?></p>
						
						<p><?php echo $address; ?></p>
						<p>Phone: <?php echo $phone; ?></p>
						<p>Cell Phone: <?php echo $cell; ?></p>
					
					</div>
					
					<div class="paypal-button-wrapper">
				        		
						<div id="paypal-button"></div>
						
					</div>
					
					<p class="fine-print">By clicking this button, you verified your information and agree to pay the stated amount.</p>
				        		
				    <?php include (TEMPLATEPATH . '/includes/paypal.php' ); ?>
				    
				</div>
					    
				<div class="col-md-4 col-md-offset-1">
				
					<div class="well">
				
					    <p>
							<strong>Need to Pay by Check?</strong>
						</p>
						<p>You can pay your ABA dues by check by mailing a check for $165.00 payable to:</p>
						<p>
							Ardmore Business Association<br>
							RE: Membership Dues<br>
							P.O. Box 624<br>
							Ardmore, PA 19003
						</p>
					
					</div>
					    	
				</div>
				
				<div class="clear"></div>
			
			</div>
		</section>
	
	</div>
	
	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>