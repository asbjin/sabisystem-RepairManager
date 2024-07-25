<?php
	require_once('session.php');
	require_once('update/repairUpdated.php');
	require_once('update/functions.php');
	
	
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PC Solutions - Update Repair</title>
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
						<li id="add"><a href="addRepair.php">Add Repair</a></li>
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="repairs.php">Repairs</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Update Repair</span>
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
					
					<input type="hidden" name="ud_id" value="<?php echo $_POST['rep_update']; ?>" readonly>
					
					
					<label for="ud_device">Device Type:</label>
					<?php echo enumDropdown("repairs", "DeviceType", "ud_device"); ?>
					
					<label for="ud_brand">Brand:</label>
					<input type="text" id="ud_brand" name="ud_brand" value="" required placeholder="Enter brand">
					
					<label for="ud_model">Model:</label>
					<input type="text" id="ud_model" name="ud_model" value="" required placeholder="Enter model">
					
					<label for="ud_os">Operating System:</label>
					<?php echo enumDropdown("repairs", "OS", "ud_os"); ?>
					
					<label for="ud_description">Description:</label>
					<textarea id="ud_description" name="ud_description" rows="5" required placeholder="Enter description"></textarea>
					
					<label for="ud_status">Status:</label>
					<?php echo enumDropdown("repairs", "Status", "ud_status"); ?>
					
					<input type="submit" name="submit" value="Update Repair Details">
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