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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="js/modernizr.custom.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>@import url(http://fonts.googleapis.com/css?family=Raleway:400,700); </style>
    
</head>

<body id="top" style="font-size: 62.5%;">
    <?php
    include_once('includes/header.php');
    ?>
    
    <!-- Breadcrumb -->
    <div class="bread dash">
        <div class="submenu">
            <ul>
                <li><a href="##" onClick="history.go(-1); return false;">Go Back</a></li>
                <li id="add"><a href="addMachine.php">Add Machine</a></li> <!-- Lien vers l'ajout de machine -->
            </ul>
        </div>
        <h3><a style="text-decoration: none;" href="machine.php">Machines</a></h3> 
        <span style="font-size: 1.2em; font-weight: 500"> \ Add Machine</span>
    </div>
    <!-- End of Breadcrumb -->
    
    <div class="floats">
    
        <div class="full-widget">
            <span id="message">
            <?php 
                if (!empty($success)) {
                    echo "<div class='alert alert-success'>" . htmlspecialchars($success) . "</div>";
                }
                if (!empty($error)) {
                    echo "<div class='alert alert-danger'>" . htmlspecialchars($error) . "</div>";
                }
            ?>
            </span>
            <form class="form-4" action="" method="post" id="machineform">
                <h1>Ajouter une nouvelle machine :</h1>
                <input type="number" name="customer_id" placeholder="ID Client" value="<?php echo isset($_POST['customer_id']) ? htmlspecialchars($_POST['customer_id']) : ''; ?>" readonly>
                <input type="text" name="machine_id" id="machine_idd" placeholder="Numéro de série" value="<?php echo isset($_POST['numeroserie']) ? htmlspecialchars($_POST['numeroserie']) : ''; ?>" required>
                <select name="marque" required>
                    <option value="">Sélectionner la marque</option>
                    <option value="Canon" <?php echo (isset($_POST['marque']) && $_POST['marque'] == 'Canon') ? 'selected' : ''; ?>>Canon</option>
                    <option value="Océ" <?php echo (isset($_POST['marque']) && $_POST['marque'] == 'Océ') ? 'selected' : ''; ?>>Oc&eacute;</option>
                    <option value="autre" <?php echo (isset($_POST['marque']) && $_POST['marque'] == 'autre') ? 'selected' : ''; ?>>Autre</option>
                </select>
                <select name="type" required>
                    <option value="">Sélectionner le type</option>
                    <option value="B&W" <?php echo (isset($_POST['type']) && $_POST['type'] == 'B&W') ? 'selected' : ''; ?>>Noir et Blanc</option>
                    <option value="color" <?php echo (isset($_POST['type']) && $_POST['type'] == 'color') ? 'selected' : ''; ?>>Couleur</option>
                </select>
                <select name="debit" required>
                    <option value="">Sélectionner le débit</option>
                    <option value="Haut volume" <?php echo (isset($_POST['debit']) && $_POST['debit'] == 'Haut volume') ? 'selected' : ''; ?>>Haut volume</option>
                    <option value="volume moyen" <?php echo (isset($_POST['debit']) && $_POST['debit'] == 'volume moyen') ? 'selected' : ''; ?>>Volume moyen</option>
                    <option value="petit volume" <?php echo (isset($_POST['debit']) && $_POST['debit'] == 'petit volume') ? 'selected' : ''; ?>>Petit volume</option>
                    <option value="presse impression" <?php echo (isset($_POST['debit']) && $_POST['debit'] == 'presse impression') ? 'selected' : ''; ?>>Presse impression</option>
                </select>
                <select name="garantie" required>
                    <option value="">Sous garantie</option>
                    <option value="Oui" <?php echo (isset($_POST['garantie']) && $_POST['garantie'] == 'Oui') ? 'selected' : ''; ?>>Oui</option>
                    <option value="Non" <?php echo (isset($_POST['garantie']) && $_POST['garantie'] == 'Non') ? 'selected' : ''; ?>>Non</option>
                </select>
                <select name="contrat" required>
                    <option value="">Sous contrat</option>
                    <option value="Oui" <?php echo (isset($_POST['contrat']) && $_POST['contrat'] == 'Oui') ? 'selected' : ''; ?>>Oui</option>
                    <option value="Non" <?php echo (isset($_POST['contrat']) && $_POST['contrat'] == 'Non') ? 'selected' : ''; ?>>Non</option>
                </select>
                <input type="text" name="localisation" placeholder="Localisation" value="<?php echo isset($_POST['localisation']) ? htmlspecialchars($_POST['localisation']) : ''; ?>" required>
                <input type="number" name="compteur" placeholder="Compteur" value="<?php echo isset($_POST['compteur']) ? htmlspecialchars($_POST['compteur']) : ''; ?>" required>
                <input type="submit" name="submit" value="AJOUTER NOUVELLE MACHINE">
            </form>
            <div id="errorMessage" style="color: red;"></div>
        </div> 
        <!-- END OF CUSTOMERS LIST-->    
    </div> 
    <!-- END OF FULL WIDGET-->

    <!-- END OF MAIN-->
    <!-- SCRIPT FOR THE MENU -->
    <script src="js/menu.js"></script>
    <!-- SCRIPT FOR THE customer -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</body>

</html>
