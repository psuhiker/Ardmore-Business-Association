<style><!--

.splash {
    background-size: cover;
    background-repeat: no-repeat;
}

    .splash #container-logged-out {
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0px;
        top: 0px;
        display: table;
    }
    
        .splash #container-logged-out p {
            width:  80%;
            margin:  0px 10%;
        }
    
        .splash #container-logged-out #layout {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }
        
            .splash #container-logged-out #layout .wrapper {
                width: 50%;
                margin:  0px auto;
            }
        
                @media all and (min-width: 481px) and (max-width: 1023px) {
                    .splash #container-logged-out #layout .wrapper {
                        width: 80%;
                    }
                }
                
                @media all and (max-width: 480px) {
                    .splash #container-logged-out #layout .wrapper {
                        width: 94%;
                    }
                }
                
                .splash #container-logged-out #layout .wrapper .logo {
                    padding:  0px 0px 20px 0px;
                }
                
                    .splash #container-logged-out #layout .wrapper .logo img {
                        max-height: 100px;
                        width: auto;
                    }
                
--></style>

<body class="splash">
    <div id="container-logged-out">
    	
    	<div id="layout">
    	    <div class="wrapper">
    	    
    	        <div class="logo">
    	            <img src='<?php echo esc_url( get_theme_mod( 'themesimages_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
    	        </div>
    	        
    	        <p>Coming Soon</p>
    	
    	    </div>
    	</div>
    
    </div>
</body>