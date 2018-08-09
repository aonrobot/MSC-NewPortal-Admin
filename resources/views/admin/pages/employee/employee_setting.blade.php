@extends('admin.admin_template')
@section('content')
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
      <h1>{{$employee->EmpCode}} | {{$employee->Login}}</h1>
      <hr>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Add New Role</h2>

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Select <b>Role</b></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="GET" action="{{asset('admin/employee/role/add/')}}">
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Role Name</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="role_item" name="role_id">
                              <option value="">---ไม่มี---</option>
                              @foreach($roles_can_select as $role)
                                <option value="{{$role->id}}">{{$role->display_name}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="emid" value="{{Request::segment(4)}}">

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button id="addRoleBtn" style="float:right;" type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add
                    </button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>

    <div class="col-md-8 col-sm-6 col-xs-12">
        <h2><i class="fa fa-list-alt" aria-hidden="true"></i> Role List</h2>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="roleTable" class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th style="width: 10px">#</th>
                          <th>Role Name</th>
                          <th style="width: 20px">Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($roles as $role)
                          <tr>
                              <td>{{$role->id}}</td>
                              <td>{{$role->display_name}}</td>
                              <td>
                                <a href="{{asset('admin/employee/role/delete/' . Request::segment(4) . '/' . $role->id)}}" value="{{$role->id}}" class="btn btn-danger confirm">
                                    <i class="fa fa-trash"></i> Remove
                                </a>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
        </div>
    </div>

</div>

<script>
    $('#form').validator();
    $('#roleTable').DataTable();
    $(".confirm").confirm();

    $('#addRoleBtn').hide();

    $('#role_item').change(function(){
      if($(this).val() == ""){
        $('#addRoleBtn').hide('500');
      }else{
        $('#addRoleBtn').show('500');
      }
    });
</script>

@stop