<?php
	require_once('session.php');
    require_once('addNewMachine.php');
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
				
					<span id="message">
					<?php 
						echo $success; 
						echo $error;
					?>
					</span>
					<form class="form-4" action="" method="post"> <!-- Assurez-vous que l'action pointe vers le bon fichier PHP -->
						<h1>Adding a new machine: </h1>
						
						
						<input type="number" name="cust_id" placeholder="Customer ID" value="<?php echo $_POST['customer_id']; ?>" required> <!-- Champ pour l'ID du client associé -->
						<input type="text" name="machine_id" placeholder="Serial Number" required>
						<select name="type" required>
							<option value="">Select Type</option>
							<option value="B&W">Black & White</option>
							<option value="color">Color</option>
						</select>
						<input type="text" name="localisation" placeholder="Localization" required>
						<input type="number" name="compteur" placeholder="Counter" required>
						
						<input type="submit" name="submit" value="ADD NEW MACHINE">
					</form>
				</div> 
				<!-- END OF CUSTOMERS LIST-->	
		 </div> 
		<!-- END OF FULL WIDGET-->

		

		
		<!-- END OF MAIN-->
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE customer -->
		
		
	</body>
	
</html>
