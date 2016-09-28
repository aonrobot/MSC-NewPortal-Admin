app.controller('post.create', function($scope,$compile,$scope) {

    //for page script
    $(document).ready(function() {
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        $(".select2").select2();

    });

    $(".delete_file").on('click', function() {

        var id = $(".delete_file").val();
         alert(id);
         
    });

    $scope.header = 'Put here your header';
    $scope.body = function($compile){
        $compile("<addimages></addimages>");
    }
    $scope.footer = 'Put here your footer';
    
    $scope.myRightButton = function (bool) {
            alert('!!! first function call!');
    };

});

