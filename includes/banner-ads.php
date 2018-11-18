<!--<div class="ads aligncenter bannerslider">

	<span class="ad">Sponsored</span>

    <ul class="slides">

		<?php query_posts(array('showposts', 'posts_per_page'=> '-1', 'post_type'=> 'businesses', 'meta_key' => 'aba_membership', 'meta_value' => '1', 'orderby' => 'rand', 'order' => 'ASC')); while (have_posts()) { the_post(); ?>
		
			<?php while ( have_rows('promotions') ) : the_row(); ?>
			
				<?php if( get_sub_field('banner_ad') ) { ?>
				    <li data-track="ad-impression" data-ad="<?php the_sub_field('banner_ad'); ?>" data-link="<?php the_sub_field('link'); ?>">
						<?php if( get_sub_field('link') ) { ?><a href="<?php the_sub_field('link'); ?>" target="_blank" data-track="ad-click"><?php } ?>
							<img src="<?php the_sub_field('banner_ad'); ?>">
						<?php if( get_sub_field('link') ) { ?></a><?php } ?>
					</li>
				<?php } ?>
					
			<?php endwhile; ?>
			
		<?php } ?><?php wp_reset_query(); ?>
		
		<li data-track="ad-impression" data-ad="<?php echo ( get_theme_mod( 'ad_banner' ) ); ?>" data-link="<?php echo ( get_theme_mod( 'ad_banner_url' ) ); ?>">
			<a href="<?php echo ( get_theme_mod( 'ad_banner_url' ) ); ?>" target="_blank" data-track="ad-click">
				<img src="<?php echo ( get_theme_mod( 'ad_banner' ) ); ?>">
			</a>
		</li>
		
	</ul>
	
</div>-->

<section id="carousel" class="ads">
    <div id="block-ad-carousel" class="carousel fade" data-ride="carousel">
        
        <?php $adCounter = 0; ?>
    
        <?php query_posts(array('showposts', 'posts_per_page'=> '-1', 'post_type'=> 'businesses', 'meta_key' => 'aba_membership', 'meta_value' => '1', 'orderby' => 'rand', 'order' => 'ASC')); while (have_posts()) { the_post(); ?>
        
        	<?php while ( have_rows('promotions') ) : the_row(); ?>
        	
        		<?php if( get_sub_field('banner_ad') ) { ?>
        		    <div class="item <?php if( $adCounter == '0' ) { ?>active<?php } ?>" data-track="ad-impression" data-ad="<?php the_sub_field('banner_ad'); ?>" data-link="<?php the_sub_field('link'); ?>">
        		    	<?php if( get_sub_field('link') ) { ?><a href="<?php the_sub_field('link'); ?>" target="_blank" data-track="ad-click"><?php } ?>
        		    		<img src="<?php the_sub_field('banner_ad'); ?>">
        		    	<?php if( get_sub_field('link') ) { ?></a><?php } ?>
        		    </div>
        		    <?php $adCounter++; ?>
        		<?php } ?>
        			
        	<?php endwhile; ?>
        	
        <?php } ?><?php wp_reset_query(); ?>
        
        <div class="item <?php if( $adCounter == '0' ) { ?>active<?php } ?>" data-track="ad-impression" data-ad="<?php echo ( get_theme_mod( 'ad_banner' ) ); ?>" data-link="<?php echo ( get_theme_mod( 'ad_banner_url' ) ); ?>">
        	<a href="<?php echo ( get_theme_mod( 'ad_banner_url' ) ); ?>" target="_blank" data-track="ad-click">
        		<img src="<?php echo ( get_theme_mod( 'ad_banner' ) ); ?>">
        	</a>
        </div>
        <?php $adCounter++; ?>
    
    </div>
</section>