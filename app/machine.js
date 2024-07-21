var app = angular.module('myApp', ['ui.bootstrap']);

app.filter('startFrom', function() {
    return function(input, start) {
        if (input) {
            start = +start; // parse to int
            return input.slice(start);
        }
        return [];
    };
});
app.controller('machineCtrl', function ($scope, $http, $timeout) {
    // Récupération des machines depuis le serveur
    $http.get('ajax/getMachines.php').success(function(data){
        $scope.list = data;
        $scope.currentPage = 1; // page courante
        $scope.entryLimit = 5; // nombre maximum d'éléments à afficher par page
        $scope.filteredItems = $scope.list.length; // nombre d'éléments filtrés initialement
        $scope.totalItems = $scope.list.length; // nombre total d'éléments
        
        // Fonction pour définir la page courante
        $scope.setPage = function(pageNo) {
            $scope.currentPage = pageNo;
        };
        
        // Filtrage des éléments
        $scope.filter = function() {
            $timeout(function() { 
                $scope.filteredItems = $scope.filtered.length;
            }, 10);
        };
        
        // Fonction de tri
        $scope.sort_by = function(predicate) {
            $scope.predicate = predicate;
            $scope.reverse = !$scope.reverse;
        };
    });
});
