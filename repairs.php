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
						<input type="number" name="record" placeholder="Enter ID number e.g. 1" min="1" maxlength="10" autofocus required>
						<input type="submit" name="go" value="Go to update >>">	
					</form>
					
				</div>
				<!--Delete box-->
				<div class="full-widget" id="deleteDiv" style="display:none;">
					<form class="form-4" method="post" action="delete/repairDelete.php">	
						<p>Enter the Stock ID you want to delete: </p> <br>
						<input type="number" name="rep_id" placeholder="Enter stock number e.g. 1" min="1" maxlength="10" required>
						<input type="submit" name="delete" value="Click to Delete" >	
					</form>
					
				</div>
			
				
				<div class=" full-widget">
					<div ng-controller="repairsCrtl">
						
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
								<br><br><p>Filtered {{ filtered.length }} of {{ totalItems}} total repairs</p>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12" ng-show="filteredItems > 0">
								<table class="table table-striped table-bordered">
								<thead>

								<th>ID&nbsp;<a ng-click="sort_by('rep_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
								<th>Nom entreprise&nbsp;<a ng-click="sort_by('nom_entreprise');"><i class="glyphicon glyphicon-sort"></i></a></th>
								<th>Nom Staff&nbsp;<a ng-click="sort_by('nom_staff');"><i class="glyphicon glyphicon-sort"></i></a></th>
								<th>Prénom Staff&nbsp;<a ng-click="sort_by('prenom_staff');"><i class="glyphicon glyphicon-sort"></i></a></th>
								<th>Description&nbsp;<a ng-click="sort_by('description');"><i class="glyphicon glyphicon-sort"></i></a></th>
								<th>Model&nbsp;<a ng-click="sort_by('model');"><i class="glyphicon glyphicon-sort"></i></a></th>
								<th>Date Added&nbsp;<a ng-click="sort_by('repairdate');"><i class="glyphicon glyphicon-sort"></i></a></th>
								<th>Update Date&nbsp;<a ng-click="sort_by('collectiondate');"><i class="glyphicon glyphicon-sort"></i></a></th>
								<th>Status&nbsp;<a ng-click="sort_by('status');"><i class="glyphicon glyphicon-sort"></i></a></th>
								</thead>

								<tbody>
								<tr ng-repeat="data in filtered = (list | filter:search | orderBy:predicate:reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
									
									<td>{{data.rep_id}}</td>
									<td>{{data.nom_entreprise}}</td>
									
									<td>{{data.nom_staff}}</td>
									<td>{{data.prenom_staff}}</td>
									<td>{{data.description}}</td>
									<td>{{data.model}}</td>
									<td>{{data.repairdate}}</td>
									<td>{{data.collectiondate}}</td>
									<td>{{data.status}}</td>
								</tr>
								</tbody>
								</table>
							</div>
							<div class="col-md-12" ng-show="filteredItems == 0">
								<div class="col-md-12">
									<h4>No repairs found</h4>
								</div>
							</div>
							<div class="col-md-12" ng-show="filteredItems > 0">    
								<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
								
							</div>
						</div>
						<span id="msg">
							<?php
							if (isset($_GET['success'])) {
								echo "<p style='color: green;'>" . htmlspecialchars($_GET['success']) . "</p>";
							}
							if (isset($_GET['error'])) {
								echo "<p style='color: red;'>" . htmlspecialchars($_GET['error']) . "</p>";
							}
						?>
						</span>
					</div> 
					<!-- END OF RepairS LIST-->	
				</div> 
				<!-- END OF FULL WIDGET-->
				
			</div> 
			<!-- END OF FLOATS-->
		</div>
		<!-- END OF MAIN-->
		
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