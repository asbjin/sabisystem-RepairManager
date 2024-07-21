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
				<div ng-controller="customerCrtl">
					
					<div class="row">
						<div class="col-md-2">PageSize:
							<select ng-model="entryLimit" class="form-control">
								<option>5</option>
								<option>10</option>
								<option>20</option>
								<option>50</option>
								<option>100</option>
							</select>
						</div>
						<div class="col-md-3">Filter:
							<input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
						</div>
						<div class="col-md-4">
							<p>Filtered {{ filtered.length }} of {{ totalItems}} total customers</p>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-12" ng-show="filteredItems > 0">
							<table class="table table-striped table-bordered">
								<thead>
									<th>ID&nbsp;<a ng-click="sort_by('cust_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
									<th>nom_entreprise&nbsp;<a ng-click="sort_by('nom_entreprise');"><i class="glyphicon glyphicon-sort"></i></a></th>
									<th>adresse&nbsp;<a ng-click="sort_by('adresse');"><i class="glyphicon glyphicon-sort"></i></a></th>
									<th>number_register&nbsp;<a ng-click="sort_by('number_register');"><i class="glyphicon glyphicon-sort"></i></a></th>
									<th>nom_contact&nbsp;<a ng-click="sort_by('nom_contact');"><i class="glyphicon glyphicon-sort"></i></a></th>
									<th>Telephone&nbsp;<a ng-click="sort_by('tel');"><i class="glyphicon glyphicon-sort"></i></a></th>
								</thead>
								<tbody>
									<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
										<td>{{data.cust_id}}</td>
										<td>{{data.nom_entreprise}}</td>
										<td>{{data.adresse}}</td>
										<td>{{data.number_register}}</td>
										<td>{{data.nom_contact}}</td>
										<td>{{data.tel}}</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-12" ng-show="filteredItems == 0">
							<div class="col-md-12">
								<h4>No customers found</h4>

									<div class="submenu">
										<ul>
											<li id="add"><a href="addCustomer.php">Add customer</a></li>
										</ul>
									</div>
							</div>
						</div>
						<div class="col-md-12" ng-show="filteredItems > 0">    
							<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
							
						</div>
					</div>
					
					<form class="form-4" action="" method="post"> <!-- Assurez-vous que l'action pointe vers le bon fichier PHP -->
						<h1>Adding a new machine: </h1>
						<span id="msg">
							<?php 
								echo $success; 
								echo $error;
							?>
						</span>
						<input type="number" name="cust_id" placeholder="Customer ID" required> <!-- Champ pour l'ID du client associé -->
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
		<script src="js/angular.min.customer.js"></script>
		<script src="js/ui-bootstrap-tpls-0.10.0.min.customer.js"></script>
		<script src="app/customer.js"></script> 
		
	</body>
	
</html>
