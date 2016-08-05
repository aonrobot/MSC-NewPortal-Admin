app.controller('portalCtrl', function($scope,$location){
	$scope.page_title = 'Welcome To New Portal';
	$scope.page_icon = "fa-medium";
	$scope.$on('$routeChangeStart', function(){
		$scope.page_title = '';
		$scope.page_icon = "fa-plus-circle";
	});
});