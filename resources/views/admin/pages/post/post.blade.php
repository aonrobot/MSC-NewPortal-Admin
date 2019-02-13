{{--*/ $em_info = Session::get('em_info')/*--}}
{{--*/ $user = App\Employee::where('EmpCode', '=', $em_info->EmpCode)->first() /*--}}

@extends('admin.admin_template') @section('content')

<div id="loader_create" class="loader"><div><img src="{{asset('loader.gif')}}"><h4>Creating....</h4></div></div>

<div id="loader_delete" class="loader"><div><img src="{{asset('loader.gif')}}"><h4>Deleting....</h4></div></div>

<div id="loader" class="loader"><div><img src="{{asset('loader.gif')}}"><h4>Loading....</h4></div></div>

<style>
div .dataTables_filter {
    text-align: left;
}
</style>
<div class="row">

    <div class="col-md-4">

        <!-- Statistic -->
        <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Post</span>
                  <span class="info-box-number">{{count($postList)}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-pencil"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Author</span>
                    <?php
$author = [];
foreach ($postList as $post) {
	array_push($author, $post->emid);
}
?>
                  <span class="info-box-number">{{count(array_count_values($author))}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

         <!-- Create Post -->
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus"></i> Create New Post</h3>
                </div>
                <div class="box-body">
                    <form data-toggle="validator" role="form" id="form">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Name</label><label-red> *</label-red>
                                    <input type="text" class="form-control" placeholder="Post Name" name="post_name" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Title</label><label-red> *</label-red>
                                    <input type="text" class="form-control" placeholder="Post Title" name="post_title" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Type</label><label-red> *</label-red>
                                    <select class="form-control" name="post_type" id="post_type" required>
                                        <option value="post">Post</option>
                                        <option value="news">News Post</option>

                                        @if(Session::get('trop_id') == 0)
                                        <option value="policy">Policy Post</option>
                                        @endif
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12" id="event_date_zone">
                                <div class="form-group">
                                    <label>Event Date</label><label-red> *</label-red>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="eventdate" name="post_event_date" required>
                                     </div>
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
                                <input type="submit" class="btn btn-success right" value="Create Post">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>

    <div class="col-md-8">
    <div class="col-md-12">
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
                            <th>Trop Name</th>
                            <th>Author</th>
                            <th style="width: 20px">Edit</th>
                            <th style="width: 20px">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($postList as $post)
                        
                        @if(!$user->can(['update-post-'.$post->pid]) && $post->post_permission == 1)
                            @continue
                        @endif

                        <tr @if(empty($post->trop_name)) style="background-color: #C5EFF7;" @endif>
                            <td>{{$post->pid}}</td>
                            <td>{{$post->post_name}}</td>
                            <td>{{empty($post->trop_name) ? 'NewPortal' : $post->trop_name . ' (' . $post->tid . ')'}}</td>
                            <td><span class="badge" style="background-color:{{App\Library\Tools::emid2color($post->emid)}}">{{App\MainEmployee::where('EmpCode', '=' ,App\Employee::where('emid' , '=' , $post->emid)->first()->EmpCode)->first()->FirstNameEng}}</span></td>
                            <td>
                                <a id="editPostBtn" href="{{asset('admin/post/edit/'.$post->pid)}}"  class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                            <td>
                                <a value="{{$post->pid}}" class="btn btn-danger removePostBtn"><i class="fa fa-trash"></i> Remove</a>
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

</div>
<div id="finish_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
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

    //Date Range
    $('#eventdate').daterangepicker({
        "autoUpdateInput": false,
        "timePicker": true,
        "timePicker24Hour": true,
        "locale": {
            "format": 'YYYY/MM/DD h:mm A',
            "cancelLabel": "ยกเลิก",
            "fromLabel": "จาก",
            "toLabel": "ถึง",
            "daysOfWeek": [
                "อา.",
                "จ.",
                "อ.",
                "พ.",
                "พฤ.",
                "ศ.",
                "ส."
            ],
            "monthNames": [
                "มกราคม",
                "กุมภาพันธ์",
                "มีนาคม",
                "เมษายน",
                "พฤษภาคม",
                "มิถุนายน",
                "กรกฎาคม",
                "สิงหาคม",
                "กันยายน",
                "ตุลาคม",
                "พฤศจิกายน",
                "ธันวาคม"
            ],
        },

    });

    $('#eventdate').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY/MM/DD h:mm A') + ' - ' + picker.endDate.format('YYYY/MM/DD h:mm A'));
    });

    $('#eventdate').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    //
    //
    $('#eventdate').val(moment().format('YYYY/MM/DD h:mm A') + ' - ' + moment().format('YYYY/MM/DD h:mm A'));
    $('#post_type').click(function(){
        if($(this).val() == 'news'){
            $('#eventdate').val('');
        }else{
            $('#eventdate').val(moment().format('YYYY/MM/DD h:mm A') + ' - ' + moment().format('YYYY/MM/DD h:mm A'));
        }
    });

    $("#postTable").DataTable({
        "paging": false,
        "order": [[ 0, "desc" ]]
    });

    var search_input = $('#postTable').closest('.dataTables_wrapper').find('.col-sm-6:nth-child(2n)');
    search_input.removeClass('col-sm-6');
    search_input.addClass('col-sm-12 text-center');

    // Create Post

    $('#form').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) {
        swal({

            title: "แย่จัง..ไม่สามารถสร้างโพสได้",
            text: "กรุณาใส่ข้อมูลให้ครบก่อนนะครับ",
            showConfirmButton: true,
            type: "error",
            confirmButtonText: "ปิด"

        });
      } else {

        $("#loader_create").fadeIn("slow"); // Loader animation

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var postData = {
            'post_name': $('input[name=post_name]').val(),
            'post_type' : $('select[name=post_type]').val(),
            'post_title' : $('input[name=post_title]').val(),
            'post_event_date' : $('input[name=post_event_date]').val(),
            //'tid' : $('select[name=tid]').val()
        };

        $.ajax({
            url: '{{Config::get('newportal.root_url')}}' + '/admin/post/create',
            data: postData,
            dataType: 'json',
            type: 'POST',
            success: function(data) {

                $("#loader_create").fadeOut("slow"); // Loader animation
                $('#finish_modal_edit_link').attr('href','post/edit/' + data['pid']);
                $('#finish_modal').modal('show');
            }
        });


      }
    });

    // Delete Post

    $('.removePostBtn').click(function() {

        var pid = $(this).attr('value');

        swal({
            title: "แน่ใจหรือไม่?",
            text: "ถ้าคุณลบโพสนี้จะไม่สามารถกู้คืนได้รวมถึงข้อมูลทุกอย่างจะหายไป",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "แน่ใจแล้ว, ลบเลย",
            cancelButtonText: "ไม่ดีกว่า, กรุณายกเลิกเดี๋ยวนี้",
            closeOnConfirm: false,
            closeOnCancel: false
        },
            function(isConfirm){
                if (isConfirm) {

                    swal("ลบโพสเรียบร้อย", "คุณจะไม่สามารถกู้คืนโพสนี้ได้อีกตลอดไป", "success");

                    $("#loader_delete").fadeIn("slow");

                    //Ajax to delete
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{Config::get('newportal.root_url')}}' + '/admin/post/destroy/' + pid,
                        type: 'GET',
                        success: function(data) {
                            location.reload();
                        }
                    });
                    /////////////////////

                } else {
                    swal("ยกเลิก", "โพสของคุณจะอยู่อย่างปลอดภัยเหมือนเดิม :)", "error");
            }
        });


    });

    //Edit Post

    $('#editPostBtn').click(function(){

        $("#loader").fadeIn("slow");
    });


});
</script>
@stop
