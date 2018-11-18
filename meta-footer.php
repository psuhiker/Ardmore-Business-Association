<!-- Banner Ads -->
<script>
	$(window).load(function() {
	  $('.bannerslider').flexslider({
	    animation: "fade",
	    controlNav: false,
	    pauseOnHover: true,
	    slideshowSpeed: 10000
	  });
	});
</script>

<!-- Mobile Menu -->
<script>
	$(document).ready(function() {
		$('.toggle-open').click(function(){
			$('.nav-contents').addClass('open');
			$('body').addClass('modal-open');
		});
		$('.toggle-close').click(function(){
			$('.nav-contents').removeClass('open');
			$('body').removeClass('modal-open');
		});
    });
</script>

<!-- Even Height Thumbnails -->
<script>
	function equalHeight(group) {    
	    tallest = 0;    
	    group.each(function() {       
	        thisHeight = $(this).height();       
	        if(thisHeight > tallest) {          
	            tallest = thisHeight;       
	        }    
	    });    
	    group.each(function() { $(this).height(tallest); });
	} 
	
	$(document).ready(function() {   
	    equalHeight($(".thumbnail")); 
		equalHeight($(".thumbnail .image-bg"));
		equalHeight($(".thumbnail .image-bg .wrapper"));
		equalHeight($(".thumbnail .description"));
	});
</script>