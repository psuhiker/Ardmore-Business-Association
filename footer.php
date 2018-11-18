<footer id="footer">
	<div class="container">
	
		<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'footer' ) ); ?>
		
		<p><?php echo ( get_theme_mod( 'footer_text' ) ); ?></p>
				
		<div class="col-sm-2 col-sm-offset-2 col-xs-6 logo">
			<div class="wrapper">
		
				<a href="<?php echo ( get_theme_mod( 'footer_link_one' ) ); ?>" target="_blank" data-track="footer-link"><img src="<?php echo ( get_theme_mod( 'footer_logo_one' ) ); ?>"></a>
		
			</div>
		</div>
		
		<div class="col-sm-2 col-xs-6 logo">
			<div class="wrapper">
		
				<a href="<?php echo ( get_theme_mod( 'footer_link_two' ) ); ?>" target="_blank" data-track="footer-link"><img src="<?php echo ( get_theme_mod( 'footer_logo_two' ) ); ?>"></a>
		
			</div>
		</div>
		
		<div class="col-sm-2 col-xs-6 logo">
			<div class="wrapper">
		
				<a href="<?php echo ( get_theme_mod( 'footer_link_three' ) ); ?>" target="_blank" data-track="footer-link"><img src="<?php echo ( get_theme_mod( 'footer_logo_three' ) ); ?>"></a>
		
			</div>
		</div>
		
		<div class="col-sm-2 col-xs-6 logo">
			<div class="wrapper">
		
				<a href="<?php echo ( get_theme_mod( 'footer_link_four' ) ); ?>" target="_blank" data-track="footer-link"><img src="<?php echo ( get_theme_mod( 'footer_logo_four' ) ); ?>"></a>
		
			</div>
		</div>
		
		<div class="clear"></div>
		
		<div class="col-md-12" style="text-align: center;">
			<p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></p>
		</div>
		
	</div>
</footer>

<?php wp_footer(); ?>