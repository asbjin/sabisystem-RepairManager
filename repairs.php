<?php
	require('session.php');
	require_once('addNewRepair.php');
?>

<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
	<head>
		<title>PC Solutions - Repairs</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta charset="utf-8">
		<meta name="description" content="Lakeside Books">
		<meta name="keywords" content="books, lakeside, cork, shop, online">
		
		<link rel="shortcut icon" href="favicon.ico"> 
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/global.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<link rel="stylesheet" href="css/menu.css" />
		<script src="js/modernizr.custom.js"></script>
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			ul>li, a{cursor: pointer;}
		</style>
		
		<style>@import url(http://fonts.googleapis.com/css?family=Raleway:400,700); </style>
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		
	</head>
	
	<body id="top" style="font-size: 62.5%;">
		
		<?php
		include_once('includes/header.php');
		?>
			
			<!--Breadcrumb -->
			<div class="bread">
				<div class="submenu">
					<ul>
						<li id="update" value="Update Repair" onclick="showUpdate()">Update Repair</li>
						<li id="add"><a href="addRepair.php">Add Repair</a></li>
						<li id="del" value="Delete Repair" onclick="showDelete()">Delete Repair </li>
					</ul>
				</div>
				<h3>Repairs</h3>
			</div>
			<!--Breadcrumb -->
			
			<!--Update box-->
			<div class="floats">

				<div class="full-widget" id="updateDiv" style="display:none;">
					<form class="form-4" method="post" action="updateRepair.php">	
						<p>Enter Repair's ID number:</p> <br>
						<input type="number" name="rep_update" placeholder="Enter ID number e.g. 1" min="1" maxlength="10" autofocus required>
						<input type="submit" name="go" value="Go to update >>">	
					</form>
					
				</div>
				<!--Delete box-->
				<div class="full-widget" id="deleteDiv" style="display:none;">
					<form class="form-4" method="post" action="delete/repairDelete.php">	
						<p>Enter the Rep ID you want to delete: </p> <br>
						<input type="number" name="rep_delete" placeholder="Enter stock number e.g. 1" min="1" maxlength="10" required>
						<input type="submit" name="delete" value="Click to Delete" >	
					</form>
					
				</div>
			
				
		<div class="full-widget">
				<?php
				include_once('list/rep.php');
				?>
		</div> 
		<!-- END OF FULL WIDGET-->

		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/angular.min.repair.js"></script>
		<script src="js/ui-bootstrap-tpls-0.10.0.min.repair.js"></script>
		<script src="app/repair.js"></script>  
		
		<script>	
			function showUpdate() {
				document.getElementById('updateDiv').style.display = "block";
				document.getElementById('deleteDiv').style.display = "none";
				document.getElementById('msg').style.display = "none";
			}
			
			function showDelete() {
				document.getElementById('deleteDiv').style.display = "block";
				document.getElementById('msg').style.display = "block";
				document.getElementById('updateDiv').style.display = "none";
			}
		</script>
		
	</body>
	
</html> 								