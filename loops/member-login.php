<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section class="content">
		<div class="container">
		
			<br><br>
			
			<div class="col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0 main">
				
				<h1><?php the_field('title', 877); ?></h1>
					
				<p><?php echo get_post_field('post_content', 877); ?></p>
				
				<br>
				
				<div class="form col-md-6 col-md-offset-3">
			
					<form action="<?php echo site_url(); ?>/wp-login.php" method="post">
					
						<div>
					
						    <label class="sr-only">Email Address:</label>
						    <input type="text" name="log" id="log" tabindex="1" value="" size="20" placeholder="email address" />
						    
						    <div class="clear gap"></div>
						    
						    <label class="sr-only">Password:</label>
						    <input type="password" name="pwd" tabindex="110" id="pwd" size="20" placeholder="password" />
					    
					    </div>
					    
					    <div class="col-md-6 remember">
					    	<p><label id="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Remember me</label></p>
					    </div>
					    
					    <div class="col-md-6 lost-password">
					    	<p class="lost-password"><a href="/wp-login.php?action=lostpassword">Lost your password?</a></p>
					    </div>
					    
					    <div class="login-button">
					    
						    <input id="submit" type="submit" name="submit" tabindex="120" value="Login" class="btn btn-blue" />
						    
						    <input type="hidden" name="redirect_to" value="/member-dashboard/?content-announcements" />
					    
					    </div>
					    
					    <div class="clear"></div>
					    
					</form>
				
				</div>
			
			</div>
			
		</div>
	</section>

<?php endwhile; ?>

	<?php else : ?>

<?php endif; ?>