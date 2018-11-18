<style><!--
		#wpadminbar { display: none; }
		#header {
			margin-top:  45px;
		}
	--></style>
	
	<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="window.location.reload()">×</button>
	    	<p>Edit Your Profile</p>
	  	</div>
	  	<div class="modal-body">
	    	<iframe src="<?php echo site_url(); ?>/wp-admin/profile.php" frameborder="0"></iframe>
	  	</div>
	</div>

	<div class="member-toolbar">
	
		<div class="toolbar-title">Welcome, <?php global $current_user; get_currentuserinfo(); echo $current_user->display_name; echo ' '; ?></div>
		
		<div class="btn-group navbar-right">
		
			<button type="button" class="btn btn-blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user margin-right" aria-hidden="true"></span> <span class="text">My Account</span> <span class="caret"></span></button>
			
			<ul class="dropdown-menu">
			
				<?php $user_id = get_current_user_id(); $page_id = get_the_id(); ?>
				
				<?php if( have_rows('businesses', 'user_'. $user_id ) ): ?>
				
					<li class="label"><strong>My Businesses</strong></li>
				
					<?php while( have_rows('businesses', 'user_'. $user_id ) ): the_row(); ?>
						
						<?php $post_object = get_sub_field('business'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
					
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								
							<?php wp_reset_postdata(); endif; ?>
						
					<?php endwhile; ?>
					<div class="divider"></div>
					
				<?php endif; ?>
				
				<li><a href="<?php echo site_url(); ?>/association/membership-dues/">Pay Membership Dues</a></li>
				<li><a href="<?php echo site_url(); ?>/wp-admin/profile.php" data-toggle="modal" data-target="#profileModal">Edit My Profile</a></li>
				<div class="divider"></div>
				<li><a href="<?php echo wp_logout_url(); ?>">Logout</a></li>
				
			</ul>
			
		</div>
		
		<?php $user_id = get_current_user_id(); $page_id = get_the_id(); ?>
		
		<?php if( have_rows('businesses', 'user_'. $user_id ) ): ?>
		
			<?php while( have_rows('businesses', 'user_'. $user_id ) ): the_row(); ?>
			
				<?php $post_object = get_sub_field('business'); if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
				
					<?php $business_id = get_the_id(); if ( $business_id == $page_id ) { ?>
					
						<div class="btn-group navbar-right">
					
							<a class="btn btn-red" data-toggle="modal" data-target="#editModal"><span class="glyphicon glyphicon-pencil margin-right" aria-hidden="true"></span> <span class="text">Edit Page</span></a>
						
						</div>
					
					<?php } ?>
			
				<?php wp_reset_postdata(); endif; ?>
			
			<?php endwhile; ?>
		
		<?php endif; ?>
		
		<div class="btn-group navbar-right">
			
			<button type="button" class="btn btn-blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="glyphicon glyphicon-dashboard margin-right" aria-hidden="true"></span> <span class="text margin-right">ABA Members <span class="caret"></span></span>
			</button>
			
			<ul class="dropdown-menu">
				
				<li><a href="<?php echo site_url(); ?>/member-dashboard/">Member Dashboard</a></li>
				<li><a href="<?php echo site_url(); ?>/networking-directory/">Networking Directory</a></li>
				
			</ul>
			
		</div>
		
		<?php if( current_user_can('administrator')) { ?>
		
			<div class="btn-group navbar-right">
				
				<button type="button" class="btn btn-blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="glyphicon glyphicon-cog margin-right" aria-hidden="true"></span> <span class="text margin-right">Administrators <span class="caret"></span></span>
				</button>
				
				<ul class="dropdown-menu">
					
					<li>
						<a href="<?php echo site_url(); ?>/member-dashboard/member-administration/">Member Administration</a>
					</li>
					
					<div class="divider"></div>
					
					<li>
						<a href="<?php echo site_url(); ?>/wp-admin/">Go to Dashboard</a>
					</li>
					
					<li>
						<a href="<?php echo site_url(); ?>/wp-admin/edit.php?post_type=businesses">Manage Businesses</a>
					</li>
					<li>
						<a href="<?php echo site_url(); ?>/wp-admin/edit.php?post_type=page">Manage Pages</a>
					</li>
					<li>
						<a href="<?php echo site_url(); ?>/wp-admin/edit.php?post_type=events">Manage Events</a>
					</li>
					<li>
						<a href="<?php echo site_url(); ?>/wp-admin/edit.php?post_type=profiles">Manage Focus on Member Series Profiles</a>
					</li>
					<li>
						<a href="<?php echo site_url(); ?>/wp-admin/edit.php?post_type=news">Manage News</a>
					</li>
					<li>
						<a href="<?php echo site_url(); ?>/wp-admin/edit.php?post_type=member_alerts">Manage Member Alerts</a>
					</li>
					
				</ul>
			
			</div>
			
			<div class="btn-group navbar-right">
				<?php edit_post_link('Edit Page', '', '', '', 'btn btn-red'); ?>
			</div>
			
		<?php } ?>
		
		<div class="clear"></div>
	
	</div>