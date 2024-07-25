<?php
	require_once('session.php');
	require_once('update/functions.php');
	require_once('addNewRepair.php');
	//require_once('update/repairForm.php');

include 'dbconnect.php'; 
if (isset($_POST['go'])) {
    // Récupérer l'ID de la machine depuis le formulaire
    $machine_id = mysqli_real_escape_string($conn, $_POST['record']);

    
    $sql = "SELECT cust_id FROM machines WHERE machine_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Lier le paramètre et exécuter la requête
        mysqli_stmt_bind_param($stmt, 's', $machine_id);
        mysqli_stmt_execute($stmt);

        // Obtenir le résultat de la requête
        $result = mysqli_stmt_get_result($stmt);

        // Vérifier si un résultat a été trouvé
        if ($row = mysqli_fetch_assoc($result)) {
            $cust_id = $row['cust_id'];
			
        } else {
			header("Location: addRepair.php");
        }

        // Fermer le statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare the statement.";
    }

    // Fermer la connexion
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
	<head>
		<title>PC Solutions - Add Repair</title>
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
						<li id="back"><a href="javascript:void(0);" onClick="history.go(-1); return false;">Go Back</a></li>
						
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="repairs.php">Repairs</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Add Repair</span>
			</div>
			<!--Breadcrumb -->
			
			
			<div class="floats">
				<div class="full-widget">		
					
					
					<form class="form-4" action="" method="post">
						<h1>Adding a new repair: </h1>
						<span id="msg">
							<?php 
								echo $success; 
								echo $notFound;
							?>
						</span>
						
						Customer ID: <input type="text" name="cust_id" placeholder=" ID"  value="<?php echo htmlspecialchars($cust_id); ?>" readonly>
						<input type="hidden" name="staff_id" value="<?php echo $login_id; ?>" readonly>
						<?php echo enumDropdown("repairs", "DeviceType", "device"); ?>
						<input type="text" name="brand" placeholder="Brand" required>
						<input type="text" name="model" placeholder="Model" required>
						<?php echo enumDropdown("repairs", "OS", "os"); ?>
						<textarea rows="5" name="description" placeholder="Description" required></textarea>
						<input type="submit" name="submit" value="ADD NEW REPAIR">
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