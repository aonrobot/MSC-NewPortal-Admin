var app = angular.module('frontPortalApp',[

        ],

        function($interpolateProvider) {
			$interpolateProvider.startSymbol('<%');
			$interpolateProvider.endSymbol('%>');
		}
);
