<?php
	require('session.php');
	require('search.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PC Solutions - Customer</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta charset="utf-8">
		<meta name="description" content="Lakeside Books">
		<meta name="keywords" content="books, lakeside, cork, shop, online">
		
		<link rel="shortcut icon" href="favicon.ico"> 
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/global.css">
		
		<link rel="stylesheet" href="css/menu.css" />
		<script src="js/modernizr.custom.js"></script>
		
		
		<style>@import url(http://fonts.googleapis.com/css?family=Raleway:400,700); </style>
		
	</head>
	
	<body id="top" style="font-size: 62.5%;">
		<?php
		include_once('includes/header.php');
		?>
			
			
			<!--Breadcrumb -->
			<div class="bread dash"><h3>Customer</h3></div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				
				<!-- Easy access links -->
				<div class="widget-content full-widget">
					<?php  echo $customer; ?>
					<?php  echo $error; ?>
				</div>
				<!-- Easy access links -->
				
			</div>
		</div>
		
		
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->
		
	</body>
	
</html> 				