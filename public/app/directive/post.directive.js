app.directive('addimagebutton', function(){
	// Runs during compile
	return {
		// name: '',
		// priority: 1,
		// terminal: true,
		// scope: {}, // {} = isolate, true = child, false/undefined = no change
		// controller: function($scope, $element, $attrs, $transclude) {},
		// require: 'ngModel', // Array = multiple requires, ? = optional, ^ = check parent elements
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		//template: 'Kuy',
		templateUrl: '{{Config::get('newportal.root_url')}}' + '/template/post/addImageButton.html',
		// replace: true,
		// transclude: true,
		// compile: function(tElement, tAttrs, function transclude(function(scope, cloneLinkingFn){ return function linking(scope, elm, attrs){}})),
		//link: function($scope, iElm, iAttrs, controller) {
			
		//}
	};
});

app.directive('addimages', function(){
	// Runs during compile
	return {
		// name: '',
		// priority: 1,
		// terminal: true,
		// scope: {}, // {} = isolate, true = child, false/undefined = no change
		// controller: function($scope, $element, $attrs, $transclude) {},
		// require: 'ngModel', // Array = multiple requires, ? = optional, ^ = check parent elements
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		//template: 'Kuy',
		templateUrl: '{{Config::get('newportal.root_url')}}' + '/template/post/uploadItem.html',
		// replace: true,
		// transclude: true,
		// compile: function(tElement, tAttrs, function transclude(function(scope, cloneLinkingFn){ return function linking(scope, elm, attrs){}})),
		//link: function($scope, iElm, iAttrs, controller) {
			
		//}
	};
});

app.directive('addimage',['$compile','$http',function($compile,$http){
	return function(scope, element, attrs){
		element.bind("click",function(){
			var x = document.querySelectorAll("[id='imagePath']");
			var y = document.querySelectorAll("[id='uploadBlock']");
			for(i=0;i<x.length;i++){
				if(y[i].style.display != 'none')
					alert(x[i].value);
			}
			var tpl = '{{Config::get('newportal.root_url')}}' + "/template/post/uploadItem.html";
			$http.get(tpl).then(function(response){
				angular.element(document.getElementById('chooseImageZone')).append($compile(response.data)(scope));
				//angular.element(document.getElementById('chooseImageZone')).append($compile("<div><button class='btn btn-default' data-alert="+scope.count+">Show alert #"+scope.count+"</button></div>")(scope));
			});
			
		});
	};
}]);