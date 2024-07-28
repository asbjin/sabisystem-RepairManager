var app = angular.module('myApp', ['ui.bootstrap']);

app.filter('startFrom', function() {
    return function(input, start) {
        if (input) {
            start = +start; 
            return input.slice(start);
        }
        return [];
    };
});

app.controller('machineCtrl', function ($scope, $http, $timeout) {
    $http.get('ajax/getMachines.php').success(function(data){
        $scope.list = data;
        $scope.currentPage = 1;
        $scope.entryLimit = 5;
        $scope.filteredItems = $scope.list.length;
        $scope.totalItems = $scope.list.length;
        
        $scope.setPage = function(pageNo) {
            $scope.currentPage = pageNo;
        };
        
        $scope.filter = function() {
            $timeout(function() { 
                $scope.filteredItems = $scope.filtered.length;
            }, 10);
        };
        
        $scope.sort_by = function(predicate) {
            $scope.predicate = predicate;
            $scope.reverse = !$scope.reverse;
        };
        
        $scope.exportData = function() {
            console.log('Exportation en cours...');
        
        window.location.href = '/RepairShop-master/import_export/export.php';
        };
        
        
        $scope.importData = function() {
            var fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = '.csv';
            fileInput.onchange = function(event) {
                var file = event.target.files[0];
                var formData = new FormData();
                formData.append('file', file);

                $http.post('import_export/import.php', formData, {
                    headers: {'Content-Type': undefined}
                }).then(function(response) {
                    alert(response.data);
                }, function(error) {
                    alert('Erreur lors de l\'importation des données.');
                });
            };
            fileInput.click();
        };
    });
});
