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