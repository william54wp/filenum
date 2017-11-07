var user_reg = angular.module('user_reg', []);

user_reg.controller('dept_list', function($scope, $http) {
    $http.get('/filenum/dept/list').then(
        function(response) {
            $scope.depts = response.data;
        }
    )
});