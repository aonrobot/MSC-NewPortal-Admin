@extends('admin.admin_template')
@section('content')
{{--*/$trop_name = DB::table('calendar')->join('trop','calendar.tid','=','trop.tid')->get();/*--}}
<h1><i class="fa fa-calendar"></i> Schedule Meeting | {{$trop_name[0]->trop_title}}</h1>
<hr>
<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <h3><i class="fa fa-calendar" aria-hidden="true"></i> Create New Event</h3>

        <div class="box box-success">
            <!-- form start -->
            <form class="form-horizontal" method="GET" action="/newportal/admin/calendar/event_store">
                <br>
                <div class="box-body">
                    <div class="form-group">
                        <label for="action_select" class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="action_select" class="col-sm-3 control-label">Date and Time</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="datetime" type="text" name="datetime">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="action_select" class="col-sm-3 control-label">Place</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="place">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="action_select" class="col-sm-3 control-label">Detail</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="detail">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input class="form-control" type="hidden" value="{{Request::segment(4)}}" name="calendar_id">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"> </i> Add</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>

    <div class="col-md-8 col-sm-6 col-xs-12">
        <h3><i class="fa fa-list-alt" aria-hidden="true"></i> Event List</h3>
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
                          <th>Title</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Place</th>
                          <th>Detail</th>
                          <th style="width: 20px">Edit</th>
                          <th style="width: 20px">Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                          @foreach($events as $event)
                          <tr>
                              <td>{{$event->event_id}}</td>
                              <td>{{$event->event_title}}</td>
                              <td>{{date('l, d F Y', strtotime($event->event_start_date))}}</td>
                              <td>{{$event->event_end_date}}</td>
                              <td>{{$event->event_place}}</td>
                              <td>{{$event->event_detail}}</td>
                              <td><a href="{{asset('admin/calendar/edit_event/'.$event->event_id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a></td>
                              <td><a href="{{asset('admin/calendar/destroy_event/'.$event->event_id)}}" class="btn btn-danger"><i class="fa fa-recycle"></i> Delete</a></td>
                          </tr>
                          @endforeach
                  </tbody>
              </table>
            </div>
        </div>
    </div>

</div>

<script>

    //Date Range
    $('#datetime').daterangepicker({
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

    $('#datetime').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY/MM/DD h:mm A') + ' - ' + picker.endDate.format('YYYY/MM/DD h:mm A'));
    });

    $('#datetime').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    //
    //
    $('#datetime').val(moment().format('YYYY/MM/DD h:mm A') + ' - ' + moment().format('YYYY/MM/DD h:mm A'));

</script>

@stop