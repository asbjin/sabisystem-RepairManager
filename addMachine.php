<?php
	require_once('session.php');
    
?>

<!DOCTYPE html>
<html ng-app="myApp" lang="en">
	<head>
		<title>PC Solutions - Machine</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta charset="utf-8">
		<meta name="description" content="Repair shop">
		<meta name="keywords" content="books, lakeside, cork, shop, online">
		
		<link rel="shortcut icon" href="favicon.ico"> 
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/global.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
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
					<li id="add"><a href="addMachine.php">Add Machine</a></li> <!-- Lien vers l'ajout de machine -->
				</ul>
			</div>
			<h3><a style="text-decoration: none;" href="machine.php">Machines</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Add Machine</span>
		</div>
		<!--Breadcrumb -->
		
		<div class="floats">
    	
			<div class=" full-widget">
				<?php
					include_once('list/cust.php');
				?>	
					<span id="message">
					<?php 
						echo $success; 
						echo $error;
					?>
					</span>
					<div>
						<form class="form-4" method="post" action="addMachineForm.php">	
							<p>Enter customer ID to Proceed with Repair:</p> <br>
							<input type="number" name="customer_id" placeholder="Enter ID number e.g. 1" min="1" maxlength="10" required>
							<input type="submit" name="go" value="Go to machine form >>">	
						</form>
					</div>
				</div> 
				<!-- END OF CUSTOMERS LIST-->	
		 </div> 
		<!-- END OF FULL WIDGET-->

		

		
		<!-- END OF MAIN-->
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE customer -->
		<script src="js/angular.min.customer.js"></script>
		<script src="js/ui-bootstrap-tpls-0.10.0.min.customer.js"></script>
		<script src="app/customer.js"></script> 
		
	</body>
	
</html>
