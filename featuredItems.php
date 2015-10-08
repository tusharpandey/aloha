<?php
    
    require 'Constants.php';
	require 'BaseClass.php';
	require 'Errors.php';
	require 'Success.php';
    
	$con = mysqli_connect('localhost', 'tharr8ql_myState', 'uttrakhand', 'tharr8ql_Uttrakhand');
	
	if (mysqli_connect_errno()){
		$statusOfQuery = false ;
	  	$message = "failure" ;
	}else{
		$statusOfQuery = true ;
	  	$message = "success" ;
	}
	
	$res = new FeaturedItems();
	if($statusOfQuery){
		$query_to_execute = "Select * from  featuredItems";
		$result = mysqli_query($con, $query_to_execute) or die('Error querying database.');
		$i = -1 ;
		
		while ($row = mysqli_fetch_array($result)) {
			
			$i++;
			
			$book_title_ 			   = $row["product_id"];
			$product_name_ 			   = $row["product_name"];
			$product_price_ 		   = $row["product_price"];
			$product_shipping_price_   = $row["product_shipping_price"];
			$product_description_ 	   = $row["product_description"];
			$product_featured_image_   = $row["product_featured_image"];
			$product_image_1_ 		   = $row["product_image_1"];
			$product_image_2_ 		   = $row["product_image_2"];
			$product_image_3_ 		   = $row["product_image_3"];
			$product_image_4_ 		   = $row["product_image_4"];
			$product_uploader_name_    = $row["product_uploader_name"];
			$product_uploader_city_    = $row["product_uploader_city"];
			$product_uploader_image_   = $row["product_uploader_image"];
			$product_uploader_address_ = $row["product_uploader_address"];
				
			$res -> listArray[$i] = array(
											"book_title" 			   => $book_title_, 
											"product_name" 			   => $product_name_, 
											"product_price" 		   => $product_price_, 
											"product_shipping_price"   => $product_shipping_price_, 
											"product_description" 	   => $product_description_, 
											"product_featured_image"   => $product_featured_image_, 
											"product_image_1" 		   => $product_image_1_, 
											"product_image_2" 		   => $product_image_2_, 
											"product_image_3"          => $product_image_3_, 
											"product_image_4"          => $product_image_4_,
											"product_uploader_name"    => $product_uploader_name_, 
											"product_uploader_city"    => $product_uploader_city_,
											"product_uploader_image"   => $product_uploader_image_,
											"product_uploader_address" => $product_uploader_address_
										);
		}
		
	}

	$res -> response = array ( 
								"status" =>  $statusOfQuery,
								"response" => $message , 
							 );
							 
	$res -> $news = array ( 
								"news_title" =>  "Tasty Pahaadi food is ready to Supply",
								"news_description" => "Hi all we are tasty pahaadi food is ready to supply, we have Gehat daal, Gaderi, Neembu to share." , 
							 );

	echo json_encode($res) ;
		
?>