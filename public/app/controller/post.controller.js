app.controller('post.create', function() {

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

});
