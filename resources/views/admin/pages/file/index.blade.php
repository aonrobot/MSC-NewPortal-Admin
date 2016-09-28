@extends('admin.admin_template') @section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-files-o"></i> Manage File</h3>
            </div>
            <div class="box-body" style="height: 600px;">

                  <iframe src="{{asset('plugins/fileman/index.html?integration=custom&type=files&txtFieldId=txtSelectedFile')}}" style="width:100%;height:100%" frameborder="0">
                  </iframe>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

</div>

<script>
$(function() {



});
</script>
@stop
