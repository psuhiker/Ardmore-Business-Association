<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5XW6G3H"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="bg left"></div>
<div class="bg right"></div>

<?php $user = wp_get_current_user(); ?>

<?php if ( in_array( 'member', (array) $user->roles ) ) { ?>

	<?php include (TEMPLATEPATH . '/includes/member-toolbar.php' ); ?>
	
<?php } elseif ( in_array( 'administrator', (array) $user->roles ) ) { ?>

	<?php include (TEMPLATEPATH . '/includes/member-toolbar.php' ); ?>

<?php } ?>

<header id="header">
	<div class="container">
	
		<div class="logo">
			<?php if ( is_front_page() ) { ?>
				<a href="<?php echo site_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo-white.png"></a>
			<?php } else { ?>
				<a href="<?php echo site_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png"></a>
			<?php } ?>
		</div>
		
		<div id="nav">
			<div class="toggle toggle-open">
				<span class="glyphicon glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
			</div>
			<div class="nav-contents">
				<div class="toggle toggle-close">
					<span class="glyphicon glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
				</div>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div>
		</div>
		
		<div class="clear"></div>
	
	</div>
</header>