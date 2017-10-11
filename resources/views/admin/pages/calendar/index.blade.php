@extends('admin.admin_template')
@section('content')
<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <h2><i class="fa fa-calendar" aria-hidden="true"></i> Create New Calendar</h2>

        <div class="box box-success">
            <!-- form start -->
            <form class="form-horizontal" method="GET" action="calendar/store">
                <br>
                <div class="box-body">
                    <div class="form-group">
                        <label for="action_select" class="col-sm-3 control-label">Calendar Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Select Trop</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="tid">
                              {{--*/ $trops = DB::select("SELECT * FROM trop t WHERE t.trop_type = 'meeting' AND t.tid NOT IN (SELECT tid FROM calendar) ") /*--}}
                              @foreach($trops as $trop)
                                <option value="{{$trop->tid}}" class="trop">{{$trop->trop_name}} ( {{$trop->trop_title}} )</option>
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
        <h2><i class="fa fa-list-alt" aria-hidden="true"></i> Calendar List</h2>
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
                          <th>Calendar Name</th>
                          <th>Trop Name</th>
                          <th style="width: 20px">Edit</th>
                          <th style="width: 20px">Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                          @foreach($calendars as $calendar)
                          <tr>
                              <td>{{$calendar->calendar_id}}</td>
                              <td>{{$calendar->calendar_name}}</td>
                              <td>{{$calendar->trop_name}} ( {{$calendar->trop_title}} )</td>
                              <td><a href="{{asset('admin/calendar/edit/'.$calendar->calendar_id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a></td>
                              <td><a href="{{asset('admin/calendar/destroy/'.$calendar->calendar_id)}}" class="btn btn-danger"><i class="fa fa-recycle"></i> Delete</a></td>
                          </tr>
                          @endforeach
                  </tbody>
              </table>
            </div>
        </div>
    </div>

</div>

<script>

</script>

@stop