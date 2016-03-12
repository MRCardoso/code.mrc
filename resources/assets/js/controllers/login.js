angular.module('app.controllers')
    .controller('LoginController', ['$scope', '$location', 'OAuth', function($scope, $location, OAuth)
    {
        $scope.user = {
            username: '',
            password: ''
        };

        $scope.error = {
            message: '',
            status: false
        };

        $scope.login = function()
        {
            if( $scope.form.$valid )
            {
                OAuth.getAccessToken($scope.user).then(function()
                {
                    $location.path('/home');
                }, function(reason)
                {
                    $scope.error = {
                        message: reason.data.error_description,
                        status: true
                    };
                });
            }
        }
    }]);
