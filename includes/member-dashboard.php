<!-- Processes Account Creation -->
<?php include (TEMPLATEPATH . '/includes/script-query.php' ); ?>
<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
<?php
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $business = $_GET['business'];
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
    update_post_meta( $applicationCodeID, 'status', 'paidPending' );
?>
<?php if (false !== strpos($url,'newAccount=true' )) { ?>
	<div class="alert alert-success" id="success">
	    <a class="close float--right font-size--default" data-dismiss="alert" aria-label="Close">
	        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
	    </a>
		<p>Your account has been created.</p>
		<p><strong>We are currently reviewing your application and a board member will assign privileges to manage <?php echo $business; ?> in 1-2 days.</strong></p>
		<p>When privileges have been added to your account, you will receive an email notifying you of that update. Additionally, your business will be listed under 'My Account' in the toolbar above, and you will see a 'Edit Page' button when you view your business page.</p>
	</div>
	<script>
	    //$("#success").delay(4000).slideUp(200, function() {
	    //    $(this).alert('close');
	    //});
	</script>
<?php } ?>

<?php if (false !== strpos($url,'?membership=renewed' )) { ?>
    <div class="alert alert-success" id="renewed">
	    <a class="close float--right font-size--default" data-dismiss="alert" aria-label="Close">
	        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
	    </a>
		<p class="sm-margin--top">Your membership has been successfully renewed</p>
	</div>
	<script>
	    //$("#renewed").delay(4000).slideUp(200, function() {
	    //    $(this).alert('close');
	    //});
	</script>
<?php } ?>


<!-- Member Renewal -->
<?php
    $user_id = get_current_user_id();
    $current_date = date(Y);
    //echo $current_date;
    $next_year = date(Y) + 1;
    //echo $next_year;
    $dues_request_start = 274;
    //echo $dues_request_start;
    $current_day = date(z) + 1; //274
    //echo $current_day;
?>
<?php if( have_rows('businesses', 'user_'. $user_id ) ): ?>
    <?php while( have_rows('businesses', 'user_'. $user_id ) ): the_row(); ?>
        <?php $post_object = get_sub_field('business'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>

            <?php
                $current_expiration = get_field('expiration');
                //echo $current_expiration;
            ?>

            <?php if ($current_expiration <= $current_date) { ?>

                <?php //if ($current_day > $dues_request_start) { ?>

                    <div class="well lg-margin--bottom">

                        <h2>Attention<?php global $current_user; get_currentuserinfo(); echo ' '; echo $current_user->first_name; ?>,</h2>

                        <p>Membership dues for the current year are now being collected. Please renew your membership dues in order to continue with your Ardmore Business Association benefits, including access to your online listing.</p>

                        <p><a href="<?php echo site_url(); ?>/association/join/confirmation/?renewal=true&firstName=<?php echo $current_user->first_name; ?>&lastName=<?php echo $current_user->last_name; ?>&business=<?php the_title(); ?>&businessID=<?php the_id(); ?>" class="btn buttn btn-red">Pay Dues Online</a></p>

                    </div>

                <?php //} else { ?><?php //} ?>

            <?php } else { ?><?php } ?>

            <?php wp_reset_postdata(); endif; ?>
    <?php endwhile; ?>
<?php endif; ?>



<!-- Member Announcements -->
<?php
    $posts = get_posts(array(
	    'post_type' => 'member_alerts',
	    'meta_key' => 'sticky',
	    'meta_value' => '1'
    ));
if( $posts ): ?>
	<?php foreach( $posts as $post ):setup_postdata( $post ) ?>

		<h3 class="title"><?php the_title(); ?></h3>
		<!--<p class="date">Posted <?php the_time('F j, Y'); ?></p>-->
		<hr>
		<?php the_content(); ?>

		<div class="clear"></div><br>

    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>

<?php endif; ?>

<?php
    $posts = get_posts(array(
	    'post_type' => 'member_alerts',
	    'meta_key' => 'sticky',
	    'meta_value' => '0'
    ));
if( $posts ): ?>
	<?php foreach( $posts as $post ):setup_postdata( $post ) ?>

		<h3 class="title"><?php the_title(); ?></h3>
		<p class="date">Posted <?php the_time('F j, Y'); ?></p>
		<hr>
		<?php the_content(); ?>

		<div class="clear"></div><br>

    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>

<?php endif; ?>

<div class="clear"></div>
