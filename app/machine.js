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
        alert('Exportation en cours...');
        window.location.href = '/RepairShop-master/import_export/export.php';
        };
        
        
        $scope.importData = function() {
            console.log('Importation en cours...');
            var fileInput = document.getElementById('fileInput');
            var file = fileInput.files[0];
    
            if (!file) {
                console.error('Aucun fichier sélectionné');
                return;
            }
    
            if (!file.name.endsWith('.csv')) {
                console.error('Le fichier n\'est pas un fichier CSV.');
                return;
            }
    
            var reader = new FileReader();
            reader.onload = function(e) {
                var csvData = e.target.result;
    
                console.log('Données CSV lues:', csvData.substring(0, 100)); // Log first 100 chars for debugging
    
                $http.post('RepairShop-master/import_export/import.php', { csv: csvData })
                    .then(function(response) {
                        console.log('Importation réussie:', response.data);
                    }, function(error) {
                        console.error('Erreur lors de l\'importation:', error);
                    });
            };
            reader.onerror = function(err) {
                console.error('Erreur de lecture du fichier:', err);
            };
            reader.readAsText(file);
        };
    });
});
