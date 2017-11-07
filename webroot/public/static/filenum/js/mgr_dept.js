var deptMgr = angular.module('deptMgr', []);
deptMgr.controller('deptList', function($scope, $http) {
    $scope.hello = 'hello';
    $http.get('/filenum/dept/list').then(
        function(response) {
            $scope.depts = response.data;
        }
    )
});
deptMgr.filter('showBossFilter', function() {
    return function(text) {
        if (text == 0) {
            return true;
        } else {
            return false;
        }
    }
});

$('.nav li').eq(1).addClass('active');