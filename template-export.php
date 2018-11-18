<?php /* 
Template Name: Export to CSV
*/ ?>

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
"First Name","Last Name","Business","Email Address"<br>
<?php foreach( $posts as $post ):setup_postdata( $post ) ?><?php $member = get_field('member_id'); $member_first_name = $member['display_name']; $member_last_name = $member['display_name']; ?>"<?php echo $member_first_name; ?>","<?php echo $member_last_name; ?>","<?php the_title(); ?>","<?php the_field('email'); ?>"<br><?php endforeach; ?><?php else : ?><?php endif; ?>