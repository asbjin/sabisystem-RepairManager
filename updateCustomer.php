<?php
	require_once('session.php');
	//require_once('update/customerForm.php');
	require_once('update/customerUpdated.php');	
	
?>

<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
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
			<div class="bread dash">
				<div class="submenu">
					<ul>
						<li><a href="##" onClick="history.go(-1); return false;">Go Back</a></li>
						<li id="add"><a href="addCustomer.php">Add Customer</a></li>
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="customer.php">Customers</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Update Customer</span>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				<div class="full-widget">		
					<span id="msg">
						<?php 
							echo $success; 
							echo $error;
						?>
					</span>
					<form class="form-4" action="" method="post">
					Customer ID: <input type="number" name="ud_id" id="ud_id" value="<?php echo $_POST['record']; ?>" readonly>
					Nom Entreprise: <input type="text" name="ud_nom_entreprise" id="ud_nom_entreprise"><br />
					Adresse Entreprise: <input type="text" name="ud_adresse" id="ud_adresse"><br />
					Numero registre commerce: <input type="text" name="ud_number_register" id="ud_number_register"><br />
					Nom contact: <input type="text" name="ud_nom_contact" id="ud_nom_contact"><br />
					Telephone du contact: <input type="number" name="ud_tel" id="ud_tel"><br />
					<input type="submit" name="submit" value="Update Customer Details">
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