<?php
	require_once('session.php');
	require_once('addNewCustomer.php');
?>

<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
	<head>
		<title>PC Solutions - Customer</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta charset="utf-8">
		<meta name="description" content="Repair shop">
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
			<div class="bread dash">
				<div class="submenu">
					<ul>
						<li><a href="##" onClick="history.go(-1); return false;">Go Back</a></li>
						<li id="add"><a href="addCustomer.php">Add Customer</a></li>
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="customer.php">Customers</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Add Customer</span>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				<div class="full-widget">		
					
					<form class="form-4" action="" method="post">
						<h1>Adding a new customer: </h1>
						<span id="msg">
							<?php 
								echo $success; 
								echo $error;
							?>
						</span>
						<input type="text" name="nom_entreprise" placeholder="nom_entreprise" required>
						
						<input type="text" name="adresse" placeholder="adresse" required>
						
						<input type="text" name="number_register" placeholder="number_register" required>
						
						<input type="text" name="nom_contact" placeholder="nom_contact" required>
						
						<input type="text" name="tel" placeholder="Telephone/Mobile" required>
						<input type="submit" name="submit" value="ADD NEW CUSTOMER">
					</form>
					
				</div>
				
			</div> 
			<!-- END OF FLOATS-->
		</div>
		<!-- END OF MAIN-->
		
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->
		
	</body>
	
</html> 								