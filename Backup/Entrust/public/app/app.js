var app = angular.module('portalApp',[
            'ngResource',
            'ngRoute',
            'ngTouch',
            'ngAnimate',
            'ui.bootstrap'

        ],

        function($interpolateProvider) {
			$interpolateProvider.startSymbol('<%');
			$interpolateProvider.endSymbol('%>');
		}
);

app.config(function($routeProvider){
	$routeProvider
    .when('/',{
        templateUrl : "pages/dashboard.php"
    })
    .when('/content/create',{
		templateUrl : "pages/content/content.create.php"
	})
    .when('/employee/create',{
        templateUrl : "pages/employee/employee.create.php"
    });
});