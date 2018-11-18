<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>

<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

if( strlen($query_string) > 0 ) {
	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} // foreach
} //if

$search = new WP_Query($search_query);
?>

</head>

<body class="secondary post businesses search fuelux">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>
	
	<div id="content">
		
		<section class="content" id="businesses">
			<div class="container">
			
				<div class="col-md-4 sidebar">
				
					<p class="results"><?php echo $wp_query->found_posts ?> <?php printf( __( ' Businesses found matching the term &#34;%s&#34;' ), get_search_query() ); ?></p>
					
					<?php include (TEMPLATEPATH . '/includes/businesses-search-fields.php' ); ?>
					
				</div>
				
				<div class="col-md-8 main">
				
					<?php $posts = query_posts($query_string . '&orderby=type&order=asc&showposts=10&meta_key=aba_membership&meta_value=1'); if (have_posts()) : ?>
				
						<div class="featured">
						
							<p class="title"><span>Featured Businesses</span></p>
						
							<?php while (have_posts()) : the_post(); ?>
							
								<?php include (TEMPLATEPATH . '/loops/display-business.php' ); ?>
							
							<?php endwhile; ?>
						
						</div>
						
						<?php else : ?>
					        
					<?php endif; ?>
					
					<?php $posts = query_posts($query_string . '&orderby=type&order=asc&showposts=10&meta_key=aba_membership&meta_value=0'); if (have_posts()) : ?>
					
						<div class="non-members">
						
							<?php while (have_posts()) : the_post(); ?>
							
								<?php include (TEMPLATEPATH . '/loops/display-business.php' ); ?>
							
							<?php endwhile; ?>
						
						</div>
						
						<?php else : ?>
						        
					<?php endif; ?>
					
					<div class="pagination">
					
						<?php echo paginate_links( ); ?>
						
					</div>
					
				</div>
			
			</div>
		</section>
	
	</div>
	
	<?php include (TEMPLATEPATH . '/includes/background-sidebar-left.php' ); ?>
	
	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>