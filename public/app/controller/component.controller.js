app.controller('component.cpVideo', function($scope) {

    $scope.video_blob = '';
    $scope.video_path = '';
    $scope.video_name = '';
    $scope.video_name_origin = '';

    $scope.add_video = function() {

        $("#loader_create").fadeIn("slow");

        //Update Component DB

        console.log("controller video");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/newportal/admin/component/create',
            data: { component: 'video', filename_origin: $scope.video_name_origin, filename: $scope.video_name, path: $('#post_path').val() },
            dataType: 'json',
            async: true,
            type: 'POST',
            success: function(data) {

                /*$('.dd > ol').append(
                    '<li class="dd-item dd3-item" data-component="cp_video" data-id="' + data['id'] + '" data-comid="' + data['comid'] + '" data-filename="' + data['filename'] + '"><div class="dd-handle dd3-handle">Drag</div><div class="dd3-content"><h4><i class="fa fa-video-camera"></i> ' + $scope.file_name + '</h4>' +
                    $scope.file_blob + ' <a class="btn btn-danger remove_component">Remove Video</a></div></li>');*/

                location.reload();

            },

        });

        /* ---------------------------------------------------------------------------------- */
    }
    
});

app.controller('component.cpImage', function($scope) {

    $scope.image_preview = '';
    $scope.image_path = '';
    $scope.image_name = '';
    $scope.image_name_origin = '';

    $scope.add_image = function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/newportal/admin/component/create',
            data: { component: 'image', filename_origin: $scope.image_name_origin, filename: $scope.image_name, path: $('#post_path').val() },
            dataType: 'json',
            async: true,
            type: 'POST',
            success: function(data) {
                location.reload();
            },

        });
    }
    
});

app.controller('component.cpContent', function($scope) {

    $scope.add_content = function() {

        $("#loader_create").fadeIn("slow");

        //Update Component DB
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: '/newportal/admin/component/create',
            data: { component: 'content', path: $('#post_path').val(), content: CKEDITOR.instances['content_area'].getData() },
            dataType: 'json',
            async: true,
            type: 'POST',
            success: function(data) {
                location.reload();
            },

        });

        /* ---------------------------------------------------------------------------------- */
    }
    
});

app.controller('component.cpGallery', function($scope) {

    $scope.gallery_path = [];
    $scope.gallery_name = [];
    $scope.gallery_name_origin = [];

    $scope.add_gallery = function() {

    	$("#loader_create").fadeIn("slow");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/newportal/admin/component/create',
            data: { component: 'gallery', filename_origin: $scope.gallery_name_origin, filename: $scope.gallery_name, path: $('#post_path').val() },
            dataType: 'json',
            async: true,
            type: 'POST',
            success: function(data) {
                location.reload();
            },
            error: function(data){
                location.reload();
            },

        });
    }
    
});

app.controller('component.cpFile', function($scope) {

    $scope.add_file = function() {

        $("#loader_create").fadeIn("slow");

        //Update Component DB
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: '/newportal/admin/component/create',
            data: { component: 'file', path: $('#post_path').val() },
            dataType: 'json',
            async: true,
            type: 'POST',
            success: function(data) {
                location.reload();
            },

        });

        /* ---------------------------------------------------------------------------------- */
    }
    
});

app.controller('component.cpRedirect', function($scope) {

    $scope.url = '';
    $scope.target = '';

    $scope.add_redirect = function() {

        $("#loader_create").fadeIn("slow");

        //Update Component DB
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: '/newportal/admin/component/create',
            data: { component: 'redirect', path: $('#post_path').val(), url: $scope.url, target: $scope.target },
            dataType: 'json',
            async: true,
            type: 'POST',
            success: function(data) {
                location.reload();
            },

        });

        /* ---------------------------------------------------------------------------------- */
    }
    
});

// *************************************
// 
// **************    Edit    *************
// 
// *************************************


app.controller('component.editContent', function($scope) {

    $scope.edit_content_id = 0;

    $scope.edit_content = function() {

        $("#loader_edit").fadeIn("slow");

        //Update Component DB
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: '/newportal/admin/component/update',
            data: { component: 'content', path: $('#post_path').val(), id : $scope.edit_content_id,  content: CKEDITOR.instances['edit_content_area'].getData() },
            async: true,
            type: 'POST',
            success: function(data) {
                location.reload();
            },

        });

        /* ---------------------------------------------------------------------------------- */
    }
    
});

app.controller('component.editRedirect', function($scope) {

    $scope.edit_redirect_id = 0;

    $scope.edit_url = '';
    $scope.edit_target = '';

    $scope.edit_redirect = function() {

        $("#loader_edit").fadeIn("slow");

        //Update Component DB
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: '/newportal/admin/component/update',
            data: { component: 'redirect', path: $('#post_path').val(), id : $scope.edit_redirect_id, url: $scope.edit_url, target: $scope.edit_target },
            async: true,
            type: 'POST',
            success: function(data) {
                location.reload();
            },

        });

        /* ---------------------------------------------------------------------------------- */
    }
    
});