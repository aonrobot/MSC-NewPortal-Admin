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
