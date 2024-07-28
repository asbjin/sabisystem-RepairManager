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
					<form class="form-4" action="" method="post">
					<h1>Ajouter une nouvelle machine :</h1>
					<input type="number" name="cust_id" placeholder="ID Client" value="<?php echo isset($_POST['customer_id']) ? $_POST['customer_id'] : ''; ?>" required>
					<input type="text" name="machine_id" placeholder="Numéro de série" required>
					<select name="marque" required>
						<option value="">Sélectionner la marque</option>
						<option value="Canon">Canon</option>
						<option value="Océ">Océ</option>
						<option value="autre">Autre</option>
					</select>
					<select name="type" required>
						<option value="">Sélectionner le type</option>
						<option value="B&W">Noir et Blanc</option>
						<option value="color">Couleur</option>
					</select>
					<select name="debit" required>
						<option value="">Sélectionner le débit</option>
						<option value="Haut volume">Haut volume</option>
						<option value="volume moyen">Volume moyen</option>
						<option value="petit volume">Petit volume</option>
						<option value="presse impression">Presse impression</option>
					</select>
					<select name="garantie" required>
						<option value="">Sous garantie</option>
						<option value="Oui">Oui</option>
						<option value="Non">Non</option>
					</select>
					<select name="contrat" required>
						<option value="">Sous contrat</option>
						<option value="Oui">Oui</option>
						<option value="Non">Non</option>
					</select>
					<input type="text" name="localisation" placeholder="Localisation" required>
					<input type="number" name="compteur" placeholder="Compteur" required>
					<input type="submit" name="submit" value="AJOUTER NOUVELLE MACHINE">
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
