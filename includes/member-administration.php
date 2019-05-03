<style><!--
	.modal {
		background-color: transparent;
	}
	.modal .modal-body {
		position: relative;
		top: 0;
	}
--></style>

<?php 
	$current_user = wp_get_current_user(); 
	$adminURL = get_the_permalink();
?>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/queryString.js"></script>

<div class="member-administration">
	<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
	<?php if (false !== strpos($url,'?membership=renewed' )) { ?>
		<?php include (TEMPLATEPATH . '/includes/script-query.php' ); ?>
		<?php
		    $businessID = $_GET['businessID'];
		?>
	    <div class="alert alert-success" id="renewed">
		    <a class="close float--right font-size--default" data-dismiss="alert" aria-label="Close">
		        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		    </a>
			<p class="sm-margin--top"><?php echo get_the_title( $businessID ); ?>'s membership has been successfully renewed</p>
		</div>
		<script>
		    //$("#renewed").delay(4000).slideUp(200, function() {
		    //    $(this).alert('close');
		    //});
		</script>
	<?php } ?>
	<?php if (false !== strpos($url,'?payment=applied' )) { ?>
		<?php include (TEMPLATEPATH . '/includes/script-query.php' ); ?>
		<?php
		    $applicantID = $_GET['applicantID'];
		?>
	    <div class="alert alert-success" id="renewed">
		    <a class="close float--right font-size--default" data-dismiss="alert" aria-label="Close">
		        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		    </a>
			<p class="sm-margin--top">You have successfully applied membership dues payment to <?php the_field('first_name', $applicantID); ?> <?php the_field('last_name', $applicantID); ?>'s account. They have now been sent an email to continue with the registration process.</p>
		</div>
		<script>
		    //$("#paymentApplied").delay(4000).slideUp(200, function() {
		    //    $(this).alert('close');
		    //});
		</script>
	<?php } ?>
	<?php if (false !== strpos($url,'?account=processed' )) { ?>
		<?php include (TEMPLATEPATH . '/includes/script-query.php' ); ?>
		<?php
		    $businessID = $_GET['businessID'];
		?>
		<div class="alert alert-success" id="success">
		    <a class="close float--right font-size--default" data-dismiss="alert" aria-label="Close">
		        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		    </a>
			<p><strong>The user's account has been updated.</strong></p>
			<div class="small">
				<p style="margin-bottom: 5px;">Next Steps:</p>
				<ul>
					<li><a href="#" data-toggle="modal" data-target="#userModal">Add Business to User Account</a></li>
					<li><a href="#" data-toggle="modal" data-target="#businessModal">Add User to Business Page</a></li>
				</ul>
			</div>
		</div>
		<div id="businessModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg" style="height: 80vh;">
				<div class="modal-content" style="height: 100%;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add User to Business Page as Contact</h4>
					</div>
					<div class="modal-body" style="height: 80%;">
						<iframe src="/wp-admin/post.php?post=<?php echo $businessID; ?>&action=edit" frameborder="0"></iframe>
					</div>
				</div>
			</div>
		</div>
		<div id="userModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg" style="height: 80vh;">
				<div class="modal-content" style="height: 100%;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Business to User's Profile</h4>
					</div>
					<div class="modal-body" style="height: 80%;">
						<iframe src="/wp-admin/users.php" frameborder="0"></iframe>
					</div>
				</div>
			</div>
		</div>
		<script>
		    //$("#success").delay(4000).slideUp(200, function() {
		    //    $(this).alert('close');
		    //});
		</script>
	<?php } ?>

	<ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" class="active"><a href="#active" aria-controls="active" role="tab" data-toggle="tab">Active Members</a></li>
		<li role="presentation"><a href="#pending" aria-controls="pending" role="tab" data-toggle="tab">Processing & Pending</a></li>
	    <!--<li role="presentation"><a href="#lapsed" aria-controls="lapsed" role="tab" data-toggle="tab">Lapsed Members</a></li>-->
		<li role="presentation"><a href="#manual" aria-controls="pending" role="tab" data-toggle="tab">Manually Input an Application</a></li>
	</ul>

	<div class="tab-content">

		<div role="tabpanel" class="tab-pane active" id="active">
			<div class="searchableActive">

				<?php
					$postsPaidPending = get_posts(array(
						'post_type'	=> 'pending',
						'posts_per_page' => -1,
						'orderby' => 'title',
						'order' => ASC,
						'meta_key' => 'status',
						'meta_value' => 'paidPending',
					));
					if($postsPaidPending):
				?>

					<div class="well">

						<h1>Members That Need Privileges</h1>
						<p>The following business owners are members and have set up their log in. You will need to manually assign privileges so they can manage their business page.</p>

						<table class="table searchablePending">

						    <thead>
						    	<tr>
						    		<td class="text-nowrap">
						    			<br>Name
						    		</td>
						    		<td class="text-nowrap">
						    			<br>Business
						    		</td>
						    		<td class="text-nowrap">
						    			<br>Email
						    		</td>
						    		<td>

									</td>
						    	</tr>
						    </thead>

							<tbody>

								<?php foreach($postsPaidPending as $post): setup_postdata($post); ?>

								<tr>
									<td>
										<?php the_field('first_name'); ?> <?php the_field('last_name'); ?>
									</td>
									<td>
										<?php the_field('business'); ?>
									</td>
									<td>
										<?php the_field('email_address'); ?>
									</td>
									<td>
										<a class="btn btn-blue param" onclick="updateURL<?php the_id(); ?>();">Assign Privileges</a>
										<!-- data-toggle="modal" data-target="#paidPendingModal<?php the_id(); ?>"-->
									</td>
								</tr>

								<script type="text/javascript">
								    function updateURL<?php the_id(); ?>() {
								        if (history.pushState) {
								            reloadWithQueryStringVars({
								                "redirect": "<?php the_id(); ?>",
								                "memberName": "<?php the_field('first_name'); ?> <?php the_field('last_name'); ?>",
								                "memberEmail": "<?php the_field('email_address'); ?>",
												"memberID": "<?php the_id(); ?>",
												"business": "<?php the_field('business'); ?>",
												"businessID": "",
												"permissions": "<?php echo $current_user->user_login; ?>",
												"expiration": "<?php the_time(Y); ?>",
								            });
								        }
								    }
								</script>

								<div id="paidPendingModal<?php the_id(); ?>" class="modal fade" role="dialog">
								    <div class="modal-dialog modal-lg">
								        <div class="modal-content">
								            <div class="modal-header">
								                <a href="<?php echo $adminURL; ?>" type="button" class="close">&times;</a>
								                <h4 class="modal-title">Assign Privileges: <?php the_field('first_name'); ?> <?php the_field('last_name'); ?>, <?php the_field('business'); ?></h4>
								            </div>
								            <div class="modal-body">
												<div class="col-md-8 col-md-offset-2 text-center">
													<p>You are about to assign business privileges to <strong><?php the_field('first_name'); ?> <?php the_field('last_name'); ?></strong>, who has applied to control <strong><?php the_field('business'); ?>'s</strong> page.</p>
													<p>If you would like to assign these privledges, verify this request by selecting the appropriate business below.</p>
													<br>
												</div>
												<p class="text-center">
													<?php
													    $businesses = get_posts(array(
													        'post_type' => 'businesses',
													        'posts_per_page' => -1,
													        //'meta_key' => 'aba_membership',
													        //'meta_value' => '1',
													        'orderby' => 'title',
													        'order' => 'ASC',
													    ));
														if( $businesses ) {
													?>
														<select id="selectBusiness">
															<option>Choose a Business</option>

															<?php foreach( $businesses as $post ) { setup_postdata( $post ); ?>
																<option value="<?php the_id(); ?>"><?php the_title(); ?></option>
															<?php } wp_reset_postdata(); } ?>

														</select>
												</p>
												<!--<p class="text-center">
													<br>
													<input type="submit" class="btn btn-blue" value="Assign Privileges" onclick="document.getElementById('nf-field-30', 'nf-field-31').click();">
												</p>-->
								                <div class="clearfix"><br></div>
												<?php ninja_forms_display_form( 4 ); ?>
												<style><!--
													.modal .nf-field-container  {
													    display: none;
													}
													.modal .submit-container {
													    display: block;
													}
												--></style>
												<script>
												    // Syncs Textareas
												    var a = document.getElementById("selectBusiness");
												    a.oninput = function(e) {
												        jQuery( '#nf-field-35' ).val( a.value ).trigger( 'change' );
												    }
												</script>
												<div class="clearfix"></div>
								            </div>
								        </div>
								    </div>
								</div>

								<?php endforeach; ?>

							</tbody>

						</table>

					</div>
					
				<?php wp_reset_postdata(); endif; ?>

				<h1>Active ABA Members</h1>
				<p>The following are active members. If you need to apply a dues payment made by check, you can do so below.</p>

				<div class="col-sm-8 col-md-9">

					<div class="filter">
						<div class="col-md-6" style="padding-left: 0px; padding-bottom: 25px;">
						    <form id="myForm" onsubmit="return false;"><input id="filter" type="search" class="form-control business-page filter-business" placeholder="Search for a Name or Business..."></form>
						    <div class="reset" style="display: none;">
						        <a id="resetBtn"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a>
						    </div>
						</div>

						<!-- Reset Button -->
						<script>
						    $('#resetBtn').click(function(){
						        $('#filter').val('');
						        var rex = new RegExp($(this).val(), 'i');
						        $('.searchable .search-result').hide();
						        $('.reset').hide();
						        $('.searchable .search-result').filter(function () {
						            return rex.test($(this).text());
						        }).show();
						    });
						</script>

						<!-- Filter Dropdown -->
						<script type="text/javascript">
							$(function () {
							    $('.value').on('click', function () {
							    	$('#filter').val('');
							        var text = $('#filter');
							        text.val(text.val() + this.getAttribute('data-value'));

							        $("#filter").keyup() {

								        //var rex = this.getAttribute('date-value');

								        //var rex = new RegExp($(this).val(), 'i');
								        $('.searchable .search-result').hide();
								        $('.reset').hide();
								        $('.searchable .search-result').filter(function () {
								            return rex.test($(this).text());
								        }).show();

								    )};

							    });
							});
						</script>

						<!-- Table Filtering -->
						<script>
						    $(document).ready(function () {

						        (function ($) {

						            $('#filter').keyup(function () {

						                var rex = new RegExp($(this).val(), 'i');
						                $('.searchable .search-result').hide();
						                $('.reset').show();
						                $('.searchable .search-result').filter(function () {
						                    return rex.test($(this).text());
						                }).show();

						            })

						        }(jQuery));

						    });
						</script>
					</div>

				</div>

				<div class="col-sm-4 col-md-3 text-right export">
					<a href="<?php echo site_url(); ?>/member-dashboard/member-administration/export/" target="_blank" class="btn btn-red"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Export to CSV</a>
				</div>

				<?php
				    $posts = get_posts(array(
					    'post_type' => 'businesses',
					    'posts_per_page' => -1,
					    'meta_key' => 'aba_membership',
					    'meta_value' => '1',
					    'orderby' => 'title',
					    'order' => 'ASC',
				    ));
				    if( $posts ):
				?>

					<table class="table searchable">

						<thead>
							<tr>
								<td class="text-nowrap">
									<br>Business
								</td>
								<td class="text-nowrap">
									<br>Contact
								</td>
								<td class="text-nowrap">
									<br>Email
								</td>
								<td>
								</td>
							</tr>
						</thead>

						<tbody>

							<?php
								$current_date = date(Y);
								$next_year = date(Y) + 1;
								$dues_request_start = 274;
								$current_day = date(z) + 1; //274
							?>

					    	<?php foreach( $posts as $post ):setup_postdata( $post ) ?>

					    		<?php
					    			$member = get_field('member_id');
					    			$member_name = $member['display_name'];
									$member_firstName = $member['first_name'];
									$member_lastName = $member['last_name'];
									$current_expiration = get_field('expiration');
									$member_email = $member['user_email'];
					    		?>

								<?php //if( get_field('member_id') ) { ?>

								    <tr class="member item search-result">
										<td data-label="Business">
											<?php the_title(); ?>
										</td>
										<td data-label="Name" class="text-nowrap">
											<?php echo $member_name; ?>
										</td>
										<td data-label="Email" class="text-nowrap">
											<a href="mailto:<?php echo $member_email; ?>">
												<?php echo $member_email; ?>
											</a>
											<!--<?php if( get_field('email') ) { ?>
												<a href="mailto:<?php the_field('email'); ?>">
													<?php the_field('email'); ?>
												</a>
											<?php } ?>-->
										</td>
										<td>

											<?php if ($current_expiration < $current_date) { ?>

												<?php //if ($current_day > $dues_request_start) { ?>
												

<?php
	//echo 'date:';
	//echo $current_date;
	//echo 'exp';
	//echo $current_expiration;
?>


													<a class="btn btn-blue" data-toggle="modal" data-target="#applyPaymentModal<?php the_id(); ?>">Apply Payment</a>

													<div id="applyPaymentModal<?php the_id(); ?>" class="modal fade" role="dialog">
													    <div class="modal-dialog modal-lg">
													        <div class="modal-content">
													            <div class="modal-header">
													                <button type="button" class="close" data-dismiss="modal">&times;</button>
													                <h4 class="modal-title">Apply Payment: <?php echo $member_name; ?>, <?php the_title(); ?></h4>
													            </div>
													            <div class="modal-body">
													                <p class="text-center">Are you sure you want to apply a payment to this member? This action cannot be undone.</p>
													                <div class="clearfix"><br></div>
													                <div class="col-sm-6 text-right">
													                	<p>
													                		<a type="button" class="btn btn-blue" href="<?php echo site_url(); ?>/member-administration/processing/?adminRenewalPayment=true&firstName=<?php echo $member_firstName; ?>&lastName=<?php echo $member_lastName; ?>&businessName=<?php the_title(); ?>&businessID=<?php the_id(); ?>&expiration=<?php echo $next_year; ?>"><i class="fa fa-check sm-margin--right" aria-hidden="true"></i> Yes, They Submitted a Check</a>
													                	</p>
													                </div>
													                <div class="col-sm-6">
													                	<p>
													                	    <a href="#" data-dismiss="modal">Close this Window</a>
													                	</p>
													                </div>
													                <div class="clearfix"></div>
													            </div>
													        </div>
													    </div>
													</div>

												<?php //} else { ?>&nbsp;<?php //} ?>

											<?php } else { ?>
												<small>Paid Through <?php the_field('expiration'); ?></small>
											<?php } ?>

										</td>
									</tr>

								<?php //} ?>


							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>

						</tbody>

					</table>

				<?php else : ?>
				<?php endif; ?>

				<div class="clearfix"></div>

			</div>
		</div>

		<div role="tabpanel" class="tab-pane" id="pending">
		
			<div id="none">
				<p><em>There are currently no pending applications</em></p>
			</div> 
			
			<?php
				$postsPending = get_posts(array(
					'post_type'	=> 'pending',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order' => ASC,
					'meta_key' => 'status',
					'meta_value' => 'pending',
				));
				if($postsPending):
			?>
			
				<style><!--
					#none { display: none !important; }
				--></style>
	
				<h1>Pending Members</h1>
				<p>The following business owners have submitted their application, but have not yet paid their dues. When an online payment is made, they will automatically be moved into active status.</p>
				<p>If a member pays by check, you can mark them as paid here.</p>

				<table class="table searchablePending">

				    <thead>
				    	<tr>
				    		<td class="text-nowrap">
				    			<br>Name
				    		</td>
				    		<td class="text-nowrap">
				    			<br>Business
				    		</td>
				    		<td class="text-nowrap">
				    			<br>Email
				    		</td>
				    		<td class="text-nowrap">
				    			Date<br> Applied
				    		</td>
				    		<td>&nbsp;</td>
				    		<td>&nbsp;</td>
				    	</tr>
				    </thead>

					<tbody>

						<?php foreach($postsPending as $post): setup_postdata($post); ?>

						<tr>
							<td>
								<?php the_field('first_name'); ?> <?php the_field('last_name'); ?>
							</td>
							<td>
								<?php the_field('business'); ?>
							</td>
							<td>
								<?php the_field('email_address'); ?>
							</td>
							<td>
								<?php the_time('n/j/y'); ?>
							</td>
							<td>
								<!--<a class="btn btn-blue sm-margin--bottom" data-toggle="modal" data-target="#pendingModal<?php the_id(); ?>">-->
								<a class="btn btn-blue sm-margin--bottom" onclick="updateURLTwo<?php the_id(); ?>();">Apply Payment</a>
								<a class="btn btn-blue sm-margin--bottom" data-toggle="modal" data-target="#pendingModalView<?php the_id(); ?>">View Details</a>
							</td>
						</tr>

						<div id="pendingModal<?php the_id(); ?>" class="modal fade" role="dialog">
						    <div class="modal-dialog modal-lg">
						        <div class="modal-content">
						            <div class="modal-header">
						                <a href="<?php echo $adminURL; ?>" type="button" class="close">&times;</a>
						                <h4 class="modal-title">Pending Member: <?php the_field('first_name'); ?> <?php the_field('last_name'); ?>, <?php the_field('business'); ?></h4>
						            </div>
						            <div class="modal-body">
						                <p class="text-center">test Are you sure you want to apply a payment to this member? This action cannot be undone.</p>
						                <div class="clearfix"><br></div>
										<div class="col-sm-6 text-right">
											<p>
												<!--<a type="button" class="btn btn-blue" href="<?php echo site_url(); ?>y<?php the_id(); ?>">
												<a class="btn btn-blue param" onclick="updateURL<?php the_id(); ?>();"><i class="fa fa-check sm-margin--right" aria-hidden="true"></i> Yes, They Submitted a Check</a>-->
											</p>
										</div>
										<div class="col-sm-6">
											<p>
											    <a href="#" data-dismiss="modal">Close this Window</a>
											</p>
										</div>
										<div class="clearfix"></div>
										<?php ninja_forms_display_form( 7 ); ?>
										<style><!--
											.modal .nf-field-container  {
												display: block !important;
											}
											.modal .submit-container {
												display: block;
											}
										--></style>
										<script type="text/javascript">
										    function updateURLTwo<?php the_id(); ?>() {
										        if (history.pushState) {
										            reloadWithQueryStringVars({
										                "redirectTwo": "<?php the_id(); ?>",
										                "firstName": "<?php the_field('first_name'); ?>",
										                "lastName": "<?php the_field('last_name'); ?>",
										                "email": "<?php the_field('email'); ?>",
														"business": "<?php the_field('business'); ?>",
														"businessID": "",
														"applicantID": "<?php the_id(); ?>",
										            });
										        }
										    }
										</script>
										<div class="clearfix"></div>
						            </div>
						        </div>
						    </div>
						</div>

						<div id="pendingModalView<?php the_id(); ?>" class="modal fade" role="dialog">
						    <div class="modal-dialog modal-lg">
						        <div class="modal-content">
						            <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal">&times;</button>
						                <h4 class="modal-title">Pending Member: <?php the_field('first_name'); ?> <?php the_field('last_name'); ?>, <?php the_field('business'); ?></h4>
						            </div>
						            <div class="modal-body">
						                <?php include (TEMPLATEPATH . '/includes/member-administration-applicant-details.php' ); ?>
						                <div class="clearfix"><br></div>
										<div class="col-sm-12 text-center">
											<p>
											    <a href="#" data-dismiss="modal">Close this Window</a>
											</p>
										</div>
										<div class="clearfix"></div>
						            </div>
						        </div>
						    </div>
						</div>

						<?php endforeach; ?>

					</tbody>

				</table>

			<?php wp_reset_postdata(); endif; ?>

			<?php
				$postsPendingPaid = get_posts(array(
					'post_type'	=> 'pending',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order' => ASC,
					'meta_key' => 'status',
					'meta_value' => 'pendingPaid',
				));
				if($postsPendingPaid):
			?>
			
				<style><!--
					#none { display: none !important; }
				--></style>

				<h1>Paid Members</h1>
				<p>The following business owners have applied and paid their membership dues. They have been sent an email to set up their log in.</p>
				<p>When their log in is created, they will be removed from this list.</p>

				<table class="table searchablePending">

				    <thead>
				    	<tr>
				    		<td class="text-nowrap">
				    			<br>Name
				    		</td>
				    		<td class="text-nowrap">
				    			<br>Business
				    		</td>
				    		<td class="text-nowrap">
				    			<br>Email
				    		</td>
				    		<td class="text-nowrap">
				    			Date<br> Applied
				    		</td>
							<td>&nbsp;</td>
				    	</tr>
				    </thead>

					<tbody>

						<?php foreach($postsPendingPaid as $post): setup_postdata($post); ?>

						<tr>
							<td>
								<?php the_field('first_name'); ?> <?php the_field('last_name'); ?>
							</td>
							<td>
								<?php the_field('business'); ?>
							</td>
							<td>
								<?php the_field('email_address'); ?>
							</td>
							<td>
								<?php the_time('n/j/y'); ?>
							</td>
							<td>
								<a class="btn btn-blue" data-toggle="modal" data-target="#pendingPaidView<?php the_id(); ?>">View Details</a>
							</td>
						</tr>

						<div id="pendingPaidView<?php the_id(); ?>" class="modal fade" role="dialog">
						    <div class="modal-dialog modal-lg">
						        <div class="modal-content">
						            <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal">&times;</button>
						                <h4 class="modal-title">Pending Member: <?php the_field('first_name'); ?> <?php the_field('last_name'); ?>, <?php the_field('business'); ?></h4>
						            </div>
						            <div class="modal-body">
						                <?php include (TEMPLATEPATH . '/includes/member-administration-applicant-details.php' ); ?>
						                <div class="clearfix"><br></div>
										<div class="col-sm-12 text-center">
											<p>
											    <a href="#" data-dismiss="modal">Close this Window</a>
											</p>
										</div>
										<div class="clearfix"></div>
						            </div>
						        </div>
						    </div>
						</div>

						<?php endforeach; ?>

					</tbody>

				</table>
				
			<?php wp_reset_postdata(); endif; ?>

		</div>

		<div role="tabpanel" class="tab-pane" id="manual">

			<h1>Manually Submitted Application</h1>
			<p>Use the following form to manually upload a member's application that has been submitted in written form.</p>
			<p>You will first have to select if the member has included payment or not.</p>

			<div class="text-center">
				<div class="btn-group" role="group">
					<button type="button" class="btn button btn-blue" id="paid">
						<span class="glyphicon glyphicon-ok" aria-hidden="true" style="margin-right: 10px;"></span>
						Payment Has Been Made
					</button>
					<button type="button" class="btn button btn-red" id="notPaid">
						<span class="glyphicon glyphicon-remove" aria-hidden="true" style="margin-right: 10px;"></span>
						Payment Is Due
					</button>
				</div>
			</div>

			<div class="col-xs-12 hidden" id="paidContent">
				<h2>Paid Application</h2>
				<?php ninja_forms_display_form( 5 ); ?>
				<div class="clearfix"></div>
			</div>

			<div class="col-xs-12 hidden" id="notPaidContent">
				<h2>Application (Payment Needed)</h2>
				<?php ninja_forms_display_form( 6 ); ?>
				<div class="clearfix"></div>
			</div>

			<div class="clearfix"></div>

			<script>
				$(document).ready(function() {
					$('#paid').click(function(){
						$('#paid').toggleClass('active');
						$('#notPaid').toggleClass('inactive');
						$('#paidContent').toggleClass('hidden');
						$('#notPaidContent').addClass('hidden');
					});
					$('#notPaid').click(function(){
						$('#notPaid').toggleClass('active');
						$('#paid').toggleClass('inactive');
						$('#notPaidContent').toggleClass('hidden');
						$('#paidContent').addClass('hidden');
					});
			    });
			</script>

		</div>

	</div>

</div>

<!-- LOOK HERE -->
<?php include (TEMPLATEPATH . '/includes/script-query.php' ); ?>
<?php if (false !== strpos($url,'?redirect=' )) { ?>
	<?php
    	$redirect = $_GET['redirect'];
	?>
	<script>
		$("#paidPendingModal<?php echo $redirect; ?>").modal("show")
	</script>
<?php } elseif (false !== strpos($url,'?redirectTwo=' )) { ?>
	<?php
    	$redirect = $_GET['redirectTwo'];
	?>
	<script>
		$("#pendingModal<?php echo $redirect; ?>").modal("show")
	</script>
<?php } ?>
