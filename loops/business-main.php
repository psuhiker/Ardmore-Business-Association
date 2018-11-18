<section id="map">

	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12225.039332936814!2d-75.29489769121746!3d40.002643313502745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1463281288208" frameborder="0" style="border:0" allowfullscreen></iframe>
	
	<div class="coverup"></div>
	
	<div class="search">
	
		<h1>Shop Ardmore</h1>
	
		<div class="filter">
			<form id="myForm" onsubmit="return false;"><input id="filter" type="search" class="form-control business-page filter-business" placeholder="Filter by Business Name or Keyword..."></form>
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

</section>

<section class="businesses">
	<div class="container">
	
		<h2><span>Ardmore Businesses</span></h2>
		
		<?php 
		    $posts = get_posts(array(
		        'post_type' => 'businesses',
		        'posts_per_page' => -1,
		        'meta_key' => 'aba_membership',
		        'meta_value' => '1',
		        'orderby' => 'title',
		        'order' => 'ASC',
		    ));
		    if( $posts ): ?>
		    
		    	<div class="col-md-10 col-md-offset-1">
			    	<table class="table table-hover searchable">
			    	    <tbody>
				
							<?php foreach( $posts as $post ):setup_postdata( $post ) ?>
							
								<tr class="search-result">
									<td class="title">
										<?php if( get_field('aba_membership') ) { ?>
											<a href="<?php the_permalink(); ?>" data-track="view-listing">
												<?php the_title(); ?>
											</a>
										<?php } else { ?>
											<?php the_title(); ?>
										<?php } ?>
										<span class="tags">
											<?php
												$posttags = get_the_tags();
												if ($posttags) {
											  		foreach($posttags as $tag) {
											    		echo $tag->name. '<br />'; 
											  		}
												}
											?>
										</span>
										<span class="categories">
											<?php
												$terms = get_the_terms( $post->ID , 'businesses_categories' );
												foreach( $terms as $term ) {
													print $term->name . '<br />';
												unset($term);
											} ?>
										</span>
										<span class="address"><span class="divider"> | </span><?php the_field('street_address') ?><?php if(get_field('street_address_two' )) { ?>, <?php the_field('street_address_two') ?><?php } ?></span>
									</td>
									<td class="phone">
										<?php if( have_rows('numbers') ): ?>
											<?php while ( have_rows('numbers') ) : the_row(); ?>
											
												<?php $numbers_type = get_sub_field('type'); ?>
											
												<?php if( $numbers_type === 'phone' ) { ?>
													<?php the_sub_field('number'); ?>
												<?php } ?>
												
											<?php endwhile; ?>
										<?php else : endif; ?>
									</td>
								</tr>
						
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
					
					    </tbody>
					</table>
				</div>
				
			<?php else : ?>
			
			<?php endif; ?>
	
	</div>
</section>