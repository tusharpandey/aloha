<?php
	require 'Constants.php';
	require 'BaseClass.php';
	
	$res = new Response();
	
	$res -> response = array ( 
								"state_name" => STATE_NAME ,
								"primary_color" => PRIMARY_COLOR , 
								"secondary_color" => SECONDARY_COLOR ,
								"splash_image" => SPLASH_IMAGE ,
								"application_logo" => APPLICATION_LOGO 
							 );
							 
	echo json_encode($res) ;
							 
?>