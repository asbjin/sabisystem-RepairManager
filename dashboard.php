<?php
	require('session.php');
	require('piechart.php');
	
?>
<!DOCTYPE html>
<html>
<head>
    <title>PC Solutions - Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="Lakeside Books">
    <meta name="keywords" content="books, lakeside, cork, shop, online">

    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <style>@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');</style>
	
</head>
<body id="top" style="font-size: 62.5%;">
    <?php include_once('includes/header.php'); ?>

    <!-- Breadcrumb -->
    <div class="bread dash"><h3>Home</h3></div>
    <!-- Breadcrumb -->

    <div class=" mt-4">
        <div class="row">
            <!-- Easy access links -->
            <div class="col-md-4 mb-4 ">
                <div class="card">
                    <div class="card-header text-center">
                        Get Started
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled ">
                            <li>
                                <a href="addCustomer.php" class="btn btn-primary btn-block mb-2">
                                    <i aria-hidden="true" class="icon-plus"></i> New Customer
                                </a>
                            </li>
                            <li>
                                <a href="addRepair.php" class="btn btn-primary btn-block mb-2">
                                    <i aria-hidden="true" class="icon-plus"></i> New Repair
                                </a>
                            </li>
                            <li>
                                <a href="addMachine.php" class="btn btn-primary btn-block mb-2">
                                    <i aria-hidden="true" class="icon-plus"></i> New Machine
                                </a>
                            </li>
                            <!-- 
                            <li>
                                <a href="chooseProducts.php" class="btn btn-primary btn-block mb-2">
                                    <i aria-hidden="true" class="icon-plus"></i> New Estimate
                                </a>
                            </li>
                            <li>
                                <a href="addInventory.php" class="btn btn-primary btn-block">
                                    <i aria-hidden="true" class="icon-plus"></i> New Stock Item
                                </a>
                            </li>
                            -->
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Easy access links -->

            <!-- Repair Summary -->
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-header text-center">
                        Repair Summary
                    </div>
                    <div class="card-body">
                        <!--Div that will hold the pie chart-->
                        <div id="pie_chart" style="width: 100%; height: 362px;"></div>
                    </div>
                </div>
            </div>
            <!-- Repair Summary -->
        </div>
    </div>

    <!-- SCRIPT FOR THE MENU -->
    <script src="js/menu.js"></script>
    <!-- SCRIPT FOR THE MENU -->
</body>
</html>
