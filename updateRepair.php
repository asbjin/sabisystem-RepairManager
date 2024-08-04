<?php
	require_once('session.php');
	require_once('update/repairForm.php');
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
						<input type="hidden" name="rep_id" value="<?php echo $_POST['rep_update']; ?>" readonly>

						<label for="cust_id">Customer ID:</label>
						<input type="number" id="cust_id" name="cust_id" value="<?php echo $cust_id; ?>" required placeholder="Enter customer ID">

						<label for="machine_id">Machine ID:</label>
						<input type="text" id="machine_id" name="machine_id" value="<?php echo $machine_id; ?>" required placeholder="Enter machine ID">

						<label for="contrat">Contract:</label>
						<select id="contrat" name="contrat" required>
							<option value="Oui" <?php if ($contrat == 'Oui') echo 'selected'; ?>>Oui</option>
							<option value="Non" <?php if ($contrat == 'Non') echo 'selected'; ?>>Non</option>
						</select>

						<label for="facturer">A facturer:</label>
						<select id="facturer" name="facturer" required>
							<option value="Oui" <?php if ($facturer == 'Oui') echo 'selected'; ?>>Oui</option>
							<option value="Non" <?php if ($facturer == 'Non') echo 'selected'; ?>>Non</option>
						</select>

						<label for="description_P">Problem Description:</label>
						<textarea id="description_P" name="description_P" rows="5" required placeholder="Enter problem description"><?php echo $description_P; ?></textarea>

						<label for="description_R">Repair Description:</label>
						<textarea id="description_R" name="description_R" rows="5" required placeholder="Enter repair description"><?php echo $description_R; ?></textarea>

						<label for="changed_pieces">Changed Pieces:</label>
						<textarea id="changed_pieces" name="changed_pieces" rows="3" placeholder="Enter changed pieces"><?php echo $changed_pieces; ?></textarea>

						<label for="recommended_pieces">Recommended Pieces:</label>
						<textarea id="recommended_pieces" name="recommended_pieces" rows="3" placeholder="Enter recommended pieces"><?php echo $recommended_pieces; ?></textarea>

						<label for="status">Status:</label>
						<?php echo enumDropdown("repairs", "Status", "status"); ?> 

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