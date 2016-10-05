app.directive('cpVideoModal', function(){
	return {
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		templateUrl: '/newportal/app/view/component/cp_video.modal.html',
		controller: 'component.cpVideo'
	};
});

app.directive('cpImageModal', function(){
	return {
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		templateUrl: '/newportal/app/view/component/cp_image.modal.html',
		controller: 'component.cpImage'
	};
});

app.directive('cpContentModal', function(){
	return {
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		templateUrl: '/newportal/app/view/component/cp_content.modal.html',
		controller: 'component.cpContent'
	};
});

app.directive('cpGalleryModal', function(){
	return {
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		templateUrl: '/newportal/app/view/component/cp_gallery.modal.html',
		controller: 'component.cpGallery'
	};
});

app.directive('cpFileModal', function(){
	return {
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		templateUrl: '/newportal/app/view/component/cp_file.modal.html',
		controller: 'component.cpFile'
	};
});

//Edit
app.directive('editContentModal', function(){
	return {
		restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
		templateUrl: '/newportal/app/view/component/edit/edit_content.modal.html',
		controller: 'component.editContent'
	};
});