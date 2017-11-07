$('.nav li').eq(2).addClass('active');
var user_mgr = angular.module('user_mgr', []);
user_mgr.controller('user-list', function($scope, $http) {
    $http.get(url_get_user_list).then(
        function(response) {
            $scope.users = response.data;
        }
    );
});

user_mgr.filter('showdept', function() {
    return function(text) {
        return text;
    }
});