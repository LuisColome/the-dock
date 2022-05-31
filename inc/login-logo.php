<?php
/**
 * Login Logo
 *
 * @package      TheDock
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Login Logo URL
 *
 */
function ea_login_header_url( $url ) {
    return esc_url( home_url() );
}
add_filter( 'login_headerurl', 'ea_login_header_url' );
add_filter( 'login_headertext', '__return_empty_string' );

/**
 * Login Logo
 *
 */
function ea_login_logo() {

	$logo_path = '/assets/images/logo.svg';
	if( ! file_exists( get_stylesheet_directory() . $logo_path ) )
		return;

	$logo = get_stylesheet_directory_uri() . $logo_path;
    ?>
    <style type="text/css">
    body.login {
        display: grid;
        place-items: center;
        background: hsl(212, 100%, 91%);
        background-image: linear-gradient(
            180deg,
            hsl(212, 100%, 92%) 11%,
            hsl(212, 66%, 82%) 100%
        );
        height: 100vh;
        overflow: hidden;
    }
    body.login::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        background-color: hsla(240, 3%, 94%, 1);
        width: 200%;
        height: 200%;
        transform: rotate(16deg) translateX(-95%) translateY(-15%);
        z-index: 0;
        -webkit-box-shadow: 5px 0px 0px 8px rgba(240, 240, 241, 0.5);
        box-shadow: 5px 0px 0px 8px rgba(240, 240, 241, 0.5);
    }
    @media (min-width:400px) {
        body.login::before {
            transform: rotate(16deg) translateX(-90%) translateY(-15%);
        }
    }
    @media (min-width:660px) {
        body.login::before {
            transform: rotate(16deg) translateX(-80%) translateY(-15%);
        }
    }
    #login {
        position: relative;
        z-index: 9;
    }
    .login form {
        border: none;
        border-radius: 10px;
    }
    .login .message, .login .success, .login form {
        box-shadow: 0px 1px 8px rgba(0,0,0,.15);
    }
    .login h1 a {
        background-image: url(<?php echo $logo;?>);
        background-size: contain;
        background-repeat: no-repeat;
	    background-position: center center;
        display: block;
        overflow: hidden;
        text-indent: -9999em;
        width: 312px;
        height: 100px;
    }
    
    </style>
    <?php
}
add_action( 'login_head', 'ea_login_logo' );