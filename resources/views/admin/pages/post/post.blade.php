@extends('admin.admin_template') @section('content')

<style>
div .dataTables_filter {
    text-align: left;
}
</style>
<div class="row">
    <div class="col-md-4">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i> Create New Post</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Post Name" name="post_name">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Post Title" name="post_title">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" name="post_type">
                                <option value="post">Post</option>
                                <option value="news">News Post</option>
                            </select>
                        </div>
                    </div>
                    <!--<div class="col-xs-12">
                        <div class="form-group">
                            <label>Trop</label>
                            <select class="form-control" name="tid">

                            </select>
                        </div>
                    </div>-->
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button id="createPostBtn" class="btn btn-success right"><i class="fa fa-plus"></i> Create Post</button>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-list-ol"></i> Your Post</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="postTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Post Name</th>
                            <th>Author</th>
                            <th style="width: 20px">Edit</th>
                            <th style="width: 20px">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($postList as $post)
                        <tr>
                            <td>{{$post->pid}}</td>
                            <td>{{$post->post_name}}</td>
                            <td><span class="badge" style="background-color:{{App\Library\Tools::emid2color($post->emid)}}">{{App\MainEmployee::where('EmpCode', '=' ,App\Employee::where('emid' , '=' , $post->emid)->first()->EmpCode)->first()->FirstNameEng}}</span></td>
                            <td>
                                <a id="editPostBtn" href="{{asset('admin/post/edit/'.$post->pid)}}"  class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                            <td>
                                <a id="removePostBtn" href="{{asset('admin/post/destroy/'.$post->pid)}}" value="{{$post->pid}}" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div id="finish_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><i class="fa fa-plus"></i> Create Post Finish</h3>
            </div>
            <div class="modal-body">
                <h3>Finish Create Post</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="location.reload()">All Post</button>
                <a id="finish_modal_edit_link" href="#">
                    <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit Post</button>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {


    $("#postTable").DataTable({
        "paging": false,
        "order": [[ 0, "desc" ]]
    });

    var search_input = $('#postTable').closest('.dataTables_wrapper').find('.col-sm-6:nth-child(2n)');
    search_input.removeClass('col-sm-6');
    search_input.addClass('col-sm-12 text-center');

    $('#createPostBtn').click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var postData = {
          'post_name': $('input[name=post_name]').val(),
          'post_type' : $('select[name=post_type]').val(),
          'post_title' : $('input[name=post_title]').val(),
          //'tid' : $('select[name=tid]').val()
        };

        $.ajax({
            url: '{{Config::get('newportal.root_url')}}' + '/admin/post/create',
            data: postData,
            dataType: 'json',
            type: 'POST',
            success: function(data) {
              $('#finish_modal_edit_link').attr('href','post/edit/' + data['pid']);
              $('#finish_modal').modal('show');
            }
        });
    });

    $('#removePostBtn').click(function() {

        if(confirm("Do you want to delete?")){

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          var pid = $(this).attr('value');

          console.log(pid);

          $.ajax({
              url: '{{Config::get('newportal.root_url')}}' + '/admin/post/destroy/' + pid,
              type: 'GET',
              success: function(data) {
                toastr["success"]("Delete Post Success");
              }
          });
        }

    });


});
</script>
@stop
