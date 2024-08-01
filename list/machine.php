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
        <div class="col-md-3">
            <button class="btn btn-primary" ng-click="exportData();">Exporter</button>
            <button class="btn btn-secondary" ng-click="importData();">Importer</button>
            
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12" ng-show="filteredItems > 0">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Numero Serie&nbsp;<a ng-click="sort_by('machine_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
                    <th>Marque&nbsp;<a ng-click="sort_by('marque');"><i class="glyphicon glyphicon-sort"></i></a></th>
                    <th>Compteur&nbsp;<a ng-click="sort_by('compteur');"><i class="glyphicon glyphicon-sort"></i></a></th>
                    <th>Type&nbsp;<a ng-click="sort_by('type');"><i class="glyphicon glyphicon-sort"></i></a></th>
                    <th>Débit&nbsp;<a ng-click="sort_by('debit');"><i class="glyphicon glyphicon-sort"></i></a></th>
                    <th>Garantie&nbsp;<a ng-click="sort_by('garantie');"><i class="glyphicon glyphicon-sort"></i></a></th>
                    <th>Contrat&nbsp;<a ng-click="sort_by('contrat');"><i class="glyphicon glyphicon-sort"></i></a></th>
                    <th>Localisation&nbsp;<a ng-click="sort_by('localisation');"><i class="glyphicon glyphicon-sort"></i></a></th>
                    <th>Customer ID&nbsp;<a ng-click="sort_by('cust_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
                </thead>
                <tbody>
                    <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                        <td>{{data.machine_id}}</td>
                        <td>{{data.marque}}</td>
                        <td>{{data.compteur}}</td>
                        <td>{{data.type}}</td>
                        <td>{{data.debit}}</td>
                        <td>{{data.garantie}}</td>
                        <td>{{data.contrat}}</td>
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
        </div>
    </div>
    <div class="col-md-12" ng-show="filteredItems > 0">    
        <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
    </div>
</div>
