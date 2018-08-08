@extends('admin.admin_template')
@section('content')
<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <h2><i class="fa fa-slack" aria-hidden="true"></i> Create New Permissions</h2>

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">This <b>Permissions Can</b></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="GET" action="store">
                <div class="box-body">
                    <div class="form-group">
                        <label for="action_select" class="col-sm-3 control-label">Action</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="action_select" name="action">
                              <option value="view">View</option>
                              <option value="create">Create</option>
                              <option value="update">Update</option>
                              <option value="delete">Delete</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Object</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="object" name="object">
                              <option value="menu">Menu</option>
                              <option value="menu_item"> - Menu Item</option>
                              <option value="trop">Trop</option>
                              <option value="category">Category</option>
                              <option value="post">Post</option>
                              <option value="file">File</option>
                              <option value="app_group">Application Group</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Object Name</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="object_id" name="object_id">
                              <option value="">---ไม่มี---</option>

                              {{--*/ $menus = DB::table('menu')->get() /*--}}
                              @foreach($menus as $menu)
                                <option value="menu_{{$menu->mid}}" class="menu_item">{{$menu->menu_name}}</option>
                              @endforeach

                              @foreach($menus as $menu)
                                <option value="{{$menu->mid}}:{{$menu->menu_name}}" class="menu">{{$menu->menu_name}}</option>
                              @endforeach

                              {{--*/ $trops = DB::table('trop')->get() /*--}}
                              @foreach($trops as $trop)
                                <option value="{{$trop->tid}}:{{$trop->trop_name}}" class="trop">{{$trop->trop_name}} ( {{$trop->trop_title}} )</option>
                              @endforeach

                              {{--*/ $cats = DB::table('category')->get() /*--}}
                              @foreach($cats as $cat)
                                <option value="{{$cat->catid}}:{{$cat->cat_name}}" class="category">{{$cat->cat_name}}</option>
                              @endforeach

                              {{--*/ $posts = DB::table('post')->get() /*--}}
                              @foreach($posts as $post)
                                <option value="{{$post->pid}}:{{$post->post_name}}" class="post">{{$post->post_name}}</option>
                              @endforeach

                              {{--*/ $app_groups = DB::table('application_group')->get() /*--}}
                              @foreach($app_groups as $appg)
                                <option value="{{$appg->group_id}}:{{$appg->group_name}}" class="app_group">{{$appg->group_name}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Object Item</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="object_item" name="object_item_id">
                              <option value="">---ไม่มี---</option>
                              {{--*/ $menu_items = DB::table('menu_rela')->join('menu_item','menu_rela.mtid','=','menu_item.mtid')->get() /*--}}
                              @foreach($menu_items as $menu_item)
                                <option value="{{$menu_item->mtid}}:{{$menu_item->item_name}}" class="menu_{{$menu_item->mid}}">{{$menu_item->item_name}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"> </i> Create</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>

    <div class="col-md-8 col-sm-6 col-xs-12">
        <h2><i class="fa fa-list-alt" aria-hidden="true"></i> Permissions List</h2>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="permissionTable" class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th style="width: 10px">#</th>
                          <th>Permission Name</th>
                          <th style="width: 20px">Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($lists as $list)
                          <tr>
                              <td>{{$list->id}}</td>
                              <td>{{$list->display_name}} ({{$list->name}})</td>
                              <td><a id="removePermissionBtn" href="{{asset('admin/permission/destroy/'.$list->id)}}" value="{{$list->id}}" class="btn btn-danger confirm"><i class="fa fa-trash"></i> Remove</a></td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
        </div>
    </div>

</div>

<script>
    $("#object_id").chained("#object");
    $("#object_item").chained("#object_id");
    $('#form').validator();
    $('#permissionTable').DataTable();
    $(".confirm").confirm();
</script>

@stop