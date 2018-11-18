<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>
</head>

<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>

<?php if ( is_front_page() ) { ?>

    <?php include (TEMPLATEPATH . '/home-page.php' ); ?>
    
<?php get_post_type( $post ) ?>
<?php } elseif ( 'businesses' == get_post_type() ) { ?>

	<?php include (TEMPLATEPATH . '/businesses.php' ); ?>
    
<?php } elseif ( is_home() ) { ?>

    <?php include (TEMPLATEPATH . '/blog.php' ); ?>

<?php } else { ?>

    <?php include (TEMPLATEPATH . '/default-page.php' ); ?>

<?php } ?>

</html>