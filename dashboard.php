<?php
	require('session.php');
	require('piechart.php');
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PC Solutions - Dashboard</title>
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
			<div class="bread dash"><h3>Home</h3></div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				
				<!-- Easy access links -->
				<div class="widget-content small-widget">
					<h1 class="center">Get Started</h1>
					<ul>
						
						<li>
							<a href="addCustomer.php">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
								<span>New Customer</span>
							</a>
						</li>
						
						<li>
							<a href="addRepair.php">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
								<span>New Repair</span>
							</a>
						</li>
						<li>
							<a href="addMachine.php">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
								<span>New Machine</span>
							</a>
						</li>
						<li>
							<a href="chooseProducts.php">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
								<span>New Estimate</span>
							</a>
						</li>
						
						<li>
							<a href="addInventory.php">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-plus"></i>
								</span>
								<span>New Stock Item</span>
							</a>
						</li>
						
					</ul>
				</div>
				<!-- Easy access links -->
				
				
				<!-- Repair Summary -->
				<div class="widget-content wide-widget">
					<h1 class="center">Repair Summary</h1>
					<!--Div that will hold the pie chart-->
					<div id="pie_chart" style="width: 100%; height: 362px;"></div>
				</div>
				<!-- Repair Summary -->
				
				
			</div>
		</div>
		
		
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->
		
	</body>
	
</html> 				