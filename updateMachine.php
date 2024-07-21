<?php
    require_once('session.php');
    require_once('update/machineUpdated.php');
?>

<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
<head>
    <title>PC Solutions - Machine</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta charset="utf-8">
    <meta name="description" content="Repair shop">
    <meta name="keywords" content="repair, machines, shop, online">
    
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
                <li id="add"><a href="addMachine.php">Add Machine</a></li>
            </ul>
        </div>
        <h3><a style="text-decoration: none;" href="machine.php">Machines</a></h3> 
        <span style="font-size: 1.2em; font-weight: 500">\ Update Machine</span>
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
            Serial Number: <input type="text" name="machine_id" id="machine_id" value="<?php echo $_POST['record']; ?>" readonly><br/>
          
            Type: 
            <select name="type" id="type">
                <option value="B&W" >Black & White</option>
                <option value="color" >Color</option>
            </select><br />
            Localization: <input type="text" name="localisation" id="localisation" ><br />
            Customer ID: <input type="text" name="cust_id" id="cust_id" ><br />
            Compteur: <input type="text" name="compteur" id="compteur" ><br />
            <input type="submit" name="submit" value="Update Machine Details">
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
