app.controller('portalCtrl', function($scope,$location){

	$scope.page_title = 'Welcome To New Portal';
	$scope.page_icon = "fa-medium";
	$scope.$on('$routeChangeStart', function(){
		$scope.page_title = '';
		$scope.page_icon = "fa-plus-circle";
	});

});

app.controller('sideBarCtrl', function($scope,$location){

	$scope.getClass = function (path) {
		return ($location.path().substr(0, path.length) === path) ? 'active' : '';
	}
});

