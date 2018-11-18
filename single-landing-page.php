<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<body class="secondary landing-page page<?php the_ID(); ?>">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>
	
	<div id="content">
	
	    <?php include (TEMPLATEPATH . '/loops/customized.php' ); ?>
	    
	    <!--<?php if( have_rows('xadd_businesses') ): ?>
	    
	        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	    
	        <section id="businesses" style="background-color: #f3f7eb;">
	        	<div class="container">
	        		
	        		<div class="row row-eq-height">
	    
            	        <?php while ( have_rows('add_businesses') ) : the_row(); ?>
            	        
            	            <?php if( get_row_layout() == 'individual_business' ) { ?>
            	            
            	                <?php 
            	                    $post_object = get_sub_field('individual_business_business');
            	                    if( $post_object ): 
            	                    $post = $post_object;
            	                	setup_postdata( $post ); 
            	                ?>
            	                    <?php include (TEMPLATEPATH . '/includes/landing-page-business.php' ); ?>
            	                    <?php wp_reset_postdata(); ?>
            	                <?php endif; ?>
            	            
            	            <?php } ?>
            	        
            	        <?php endwhile; ?>
        	        
	        		</div>
	        
	        	</div>
	        </section>
	    
	    <?php else : endif; ?>-->
	
	</div>
	
	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>