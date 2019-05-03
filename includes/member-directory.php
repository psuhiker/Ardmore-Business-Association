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
    
    <table class="table searchable">
    
    	<thead>
    		<tr>
    			<th>Business Name</th>
    			<th>Member Name</th>
				<th>&nbsp;</th>
    		</tr>
    	</thead>
    
	    <?php foreach( $posts as $post ):setup_postdata( $post ) ?>
	    
	    	<?php 
	    		$member = get_field('member_id');
	    		$member_name = $member['display_name'];
	    		$member_email = $member['user_email'];
	    	?>
	    
	    <?php //if( get_field('member_id') ) { ?>
			<tr class="search-result">
				<td>
					<?php the_title(); ?>
					<div class="collapse" id="business<?php the_id(); ?>">
						<table>
							<?php //if( get_field('email') ) { ?>
								<tr>
									<td>
										Email:
									</td>
									<td>
										<a href="mailto:<?php echo $member_email; ?>">
											<?php echo $member_email; ?>
										</a>
										<!--<a href="mailto:<?php the_field('email'); ?>">
											<?php the_field('email'); ?>
										</a>-->
									</td>
								</tr>
							<?php //} ?>
							<?php if( get_field('website') ) { ?>
								<tr>
									<td>
										Website:
									</td>
									<td>
										<a href="<?php the_field('website'); ?>" target="_blank">
											<?php the_field('website'); ?>
										</a>
									</td>
								</tr>
							<?php } ?>
							<?php if( have_rows('numbers') ): ?>
								<tr>
									<td>
										Phone:
									</td>
									<td>
										<?php while ( have_rows('numbers') ) : the_row(); ?>
											<?php $numbers_type = get_sub_field('type'); if( $numbers_type === 'phone' ) { ?>
												<?php the_sub_field('number'); ?>
											<?php } ?>
										<?php endwhile; ?>
									</td>
								</tr>
							<?php else : endif; ?>
						</table>
					</div>
				</td>
				<td>
					<?php echo $member_name; ?>
				</td>
				<td>
					<a data-toggle="collapse" href="#business<?php the_id(); ?>">
						<i class="fa fa-plus" aria-hidden="true"></i>
						<i class="fa fa-minus" aria-hidden="true"></i>
					</a>
				</td>
			</tr>
	    <?php //} ?>
	    
	    <?php endforeach; ?>
	    <?php wp_reset_postdata(); ?>
    
    </table>
    
<?php else : ?>
<?php endif; ?>