<?php
	require('session.php');
	//require_once('update/searchupdate.php');
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
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			ul>li, a{cursor: pointer;}
		</style>
		
		<style>@import url(http://fonts.googleapis.com/css?family=Raleway:400,700); </style>
		
	</head>
	
	<body id="top" style="font-size: 62.5%;">
		<?php
		include_once('includes/header.php');
		?>
			<!--Breadcrumb -->
			<div class="bread">
				<div class="submenu">
					<ul>
						<li id="back"><a href="##" onClick="history.go(-1); return false;">Go Back</a></li>
						
					</ul>
				</div>
				<h3><a style="text-decoration: none;" href="repairs.php">Repairs</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Add Repair</span>
			</div>
			<!--Breadcrumb -->
			
			<div class="floats">
			
				<div class=" full-widget">
						<div ng-controller="machineCtrl">
							
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
									<p>Filtered {{ filtered.length }} of {{ totalItems}} total Machine</p>
								</div>
							</div>
							<br/>
							<div class="row">
							<div class="col-md-12" ng-show="filteredItems > 0">
								<table class="table table-striped table-bordered">
									<thead>
										<th>Numero Serie&nbsp;<a ng-click="sort_by('machine_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Compteur&nbsp;<a ng-click="sort_by('compteur');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Type&nbsp;<a ng-click="sort_by('type');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Localisation&nbsp;<a ng-click="sort_by('localisation');"><i class="glyphicon glyphicon-sort"></i></a></th>
										<th>Customer ID&nbsp;<a ng-click="sort_by('cust_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
									</thead>
									<tbody>
										<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
											<td>{{data.machine_id}}</td>
											<td>{{data.compteur}}</td>
											<td>{{data.type}}</td>
											<td>{{data.localisation}}</td>
											<td>{{data.cust_id}}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-12" ng-show="filteredItems == 0">
							<div class="col-md-12">
								<h4>No machine found</h4>

								<div class="submenu">
									<ul>
										<li id="add"><a href="addMachine.php">Add machine</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-12" ng-show="filteredItems > 0">    
							<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
							
							</div>
						</div>

							<div>
								<form class="form-4" method="post" action="addRepairForm.php">	
									<p>Enter machine's ID to Proceed with Repair:</p> <br>
									<input type="text" name="record" placeholder="Enter ID number e.g. 1" min="1" maxlength="10" required>
									<input type="submit" name="go" value="Go to repair form >>">	
								</form>
							</div>
					
					<!-- END OF CUSTOMERS LIST-->	
				</div> 
				 	
			</div> 
			<!-- END OF FLOATS-->
		
		<!-- END OF MAIN-->
		
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/menu.js"></script>
		<!-- SCRIPT FOR THE MENU -->
		<script src="js/angular.min.machine.js"></script>
		<script src="js/ui-bootstrap-tpls-0.10.0.min.machine.js"></script>
		<script src="app/machine.js"></script> 
		
	</body>
	
</html> 									