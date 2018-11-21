<?php /*
Template Name: Processing Page
*/ ?>

<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
<?php include (TEMPLATEPATH . '/includes/script-query.php' ); ?>
</head>

<body class="secondary processing">

    <?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
    <?php $query = $_SERVER['QUERY_STRING']; ?>



    <?php if ( is_page('member-dashboard/member-administration/processing') ) { // Member Privileges Processing ?>

        <?php if (false !== strpos($url,'?renewalPayment=true' )) { // Member Initiated Dues Renewal ?>

            <div class="inner">

    	    	<p>Processing Account</p>
    	    	<p><img src="<?php bloginfo('template_directory'); ?>/images/loading.gif" width="100"></p>

    	    </div>

            <?php
    		    $businessID = $_GET['businessID'];
    		    //$expiration = $_GET['expiration'];
    		    $currentExpiration = get_field('expiration', $businessID);
    		    $currentYear = date('Y');
    		    $currentDay = date(z) + 1;
	    		$nextYearTrigger = 335;
    		    if ($currentExpiration < $currentYear) {
    		    	if ($currentDay > $nextYearTrigger) {
    		    		$expiration = $currentYear + 1;
    		    	} else {
    		    		$expiration = $currentYear;
    		    	};
    		    } else {
    		    	$expiration = $currentExpiration + 1;
    		    }
    		    $redirect_url = site_url() . '/member-dashboard/?membership=renewed&businessID=' . $businessID . '';
    		    update_post_meta( $businessID, 'aba_membership', '1' );
    		    update_post_meta( $businessID, 'expiration', $expiration );
    		?>

            <meta http-equiv="refresh" content="0;URL='<?php echo $redirect_url; ?>'" />
            
        <?php } elseif (false !== strpos($url,'?adminRenewalPayment=true' )) { // Admin Initated Dues Renewal ?>

                <div class="inner">

        	    	<p>Processing Account</p>
        	    	<p><img src="<?php bloginfo('template_directory'); ?>/images/loading.gif" width="100"></p>

        	    </div>

                <?php
        		    $businessID = $_GET['businessID'];
        		    //$expiration = $_GET['expiration'];
        		    $currentExpiration = get_field('expiration', $businessID);
	    		    $currentYear = date('Y');
	    		    $currentDay = date(z) + 1;
		    		$nextYearTrigger = 335;
	    		    if ($currentExpiration < $currentYear) {
	    		    	if ($currentDay > $nextYearTrigger) {
	    		    		$expiration = $currentYear + 1;
	    		    	} else {
	    		    		$expiration = $currentYear;
	    		    	};
	    		    } else {
	    		    	$expiration = $currentExpiration + 1;
	    		    }
        		    $redirect_url = site_url() . '/member-dashboard//member-administration/?membership=renewed&businessID=' . $businessID . '';
        		    update_post_meta( $businessID, 'aba_membership', '1' );
        		    update_post_meta( $businessID, 'expiration', $expiration );
        		?>

                <meta http-equiv="refresh" content="0;URL='<?php echo $redirect_url; ?>'" />

        <?php } elseif (false !== strpos($url,'?adminApplyPayment=true' )) { // Admin Initated New Applicant Payment ?>

                <div class="inner">

        	    	<p>Processing Account</p>
        	    	<p><img src="<?php bloginfo('template_directory'); ?>/images/loading.gif" width="100"></p>

        	    </div>

                <?php
        		    $applicantID = $_GET['applicantID'];
        		    $redirect_url = site_url() . '/member-dashboard/member-administration/?payment=applied&applicantID=' . $applicantID . '';
        		    update_post_meta( $applicantID, 'status', 'pendingPaid' );
        		?>

                <meta http-equiv="refresh" content="0;URL='<?php echo $redirect_url; ?>'" />

        <?php } else { // Fallback: Member Privileges Processing  ?>

    	    <div class="inner">

    	    	<p>Processing Account</p>
    	    	<p><img src="<?php bloginfo('template_directory'); ?>/images/loading.gif" width="100"></p>

    	    </div>

    		<?php
    		    $memberName = $_GET['memberName'];
    		    $memberID = $_GET['memberID'];
    		    $business = $_GET['business'];
    		    $businessID = $_GET['businessID'];
    		    //$expiration = $_GET['expiration'];
    		    $currentYear = date('Y');
    		    $currentDay = date(z) + 1;
	    		$nextYearTrigger = 244;
    		    if ($currentDay > $nextYearTrigger) {
    		    	$expiration = $currentYear + 1;
    		    } else {
    		    	$expiration = $currentYear;
    		    };
    		    $redirect_url = site_url() . '/member-dashboard/member-administration/?account=processed&memberID=' . $memberID . '&businessID=' . $businessID . '';
    		    update_post_meta( $memberID, 'status', 'completed' );
    		    update_post_meta( $businessID, 'aba_membership', '1' );
    		    update_post_meta( $businessID, 'expiration', $expiration );
    		?>

    		<meta http-equiv="refresh" content="0;URL='<?php echo $redirect_url; ?>'" />

        <?php } ?>

	<?php } ?>

	<?php wp_footer(); ?>

</body>
