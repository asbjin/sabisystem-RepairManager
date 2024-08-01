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

								<thead>
                                    <tr>
                                        <th>ID&nbsp;<a ng-click="sort_by('rep_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
                                        <th>Nom entreprise&nbsp;<a ng-click="sort_by('nom_entreprise');"><i class="glyphicon glyphicon-sort"></i></a></th>
                                        <th>Nom Staff&nbsp;<a ng-click="sort_by('nom_staff');"><i class="glyphicon glyphicon-sort"></i></a></th>
                                        <!-- <th>Prénom Staff&nbsp;<a ng-click="sort_by('prenom_staff');"><i class="glyphicon glyphicon-sort"></i></a></th>-->
                                        <th>Contrat&nbsp;<a ng-click="sort_by('contrat');"><i class="glyphicon glyphicon-sort"></i></a></th>
                                        <th>Facture&nbsp;<a ng-click="sort_by('facture');"><i class="glyphicon glyphicon-sort"></i></a></th>
                                        <th>Description Produit&nbsp;<a ng-click="sort_by('description_P');"><i class="glyphicon glyphicon-sort"></i></a></th>
                                        <th>Description Réparation&nbsp;<a ng-click="sort_by('description_R');"><i class="glyphicon glyphicon-sort"></i></a></th>
                                        <th>Pièces Changées&nbsp;<a ng-click="sort_by('changed_pieces');"><i class="glyphicon glyphicon-sort"></i></a></th>
                                        <th>Pièces Recommandées&nbsp;<a ng-click="sort_by('recommended_pieces');"><i class="glyphicon glyphicon-sort"></i></a></th>
                                        <th>Date Ajoutée&nbsp;<a ng-click="sort_by('repairdate');"><i class="glyphicon glyphicon-sort"></i></a></th>
                                        <!-- <th>Date de Mise à Jour&nbsp;<a ng-click="sort_by('collectiondate');"><i class="glyphicon glyphicon-sort"></i></a></th>-->
                                        <!-- <th>Status&nbsp;<a ng-click="sort_by('status');"><i class="glyphicon glyphicon-sort"></i></a></th> -->
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr ng-repeat="data in filtered = (list | filter:search | orderBy:predicate:reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                                        <td>{{data.rep_id}}</td>
                                        <td>{{data.nom_entreprise}}</td>
                                        <td>{{data.nom_staff}}</td>
                                        <!-- <td>{{data.prenom_staff}}</td>-->
                                        <td>{{data.contrat}}</td>
                                        <td>{{data.facture}}</td>
                                        <td>{{data.description_P}}</td>
                                        <td>{{data.description_R}}</td>
                                        <td>{{data.changed_pieces}}</td>
                                        <td>{{data.recommended_pieces}}</td>
                                        <td>{{data.repairdate}}</td>
                                        <!-- <td>{{data.collectiondate}}</td>-->
                                        <!--<td>{{data.status}}</td> -->
                                    </tr>
                                </tbody>

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