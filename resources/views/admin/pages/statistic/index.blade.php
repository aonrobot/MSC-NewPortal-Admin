@extends('admin.admin_template')
@section('content')
<div class="row">

    <div class="col-md-4">
      <div class="col-md-12">
          <h2><i class="fa fa-bar-chart-o" aria-hidden="true"></i> New User Active Today</h2>
          <!-- interactive chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Test Data</h3>
            </div>
            <div class="box-body">

            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->

      </div>
      <!-- /.col -->
    </div>

    <div class="col-md-8">
      <div class="col-md-12">
          <h2><i class="fa fa-bar-chart-o" aria-hidden="true"></i> New User Active Today</h2>
          <!-- interactive chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Real time active user</h3>

              <div class="box-tools pull-right">
                Real time
                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-xs active" data-toggle="on">On</button>
                  <button type="button" class="btn btn-default btn-xs" data-toggle="off">Off</button>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div id="interactive" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->

      </div>
      <!-- /.col -->
    </div>

</div>

<script>

    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [];
    var count_data = [];
    var temp;
    var updateInterval = 1000;
    var totalPoints = 100;
    var now = new Date().getTime();

    var realtime = "on"; //If == to on then fetch data every x seconds. else stop fetching

    function initData() {
        for (var i = totalPoints; i > 0; i--) {
            var temp = [now, 0];
            data.push(temp);
        }
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === "on") {
      initData();
      GetData();
    }

    function update(data_y){

      data_y = parseInt(data_y);

      data.shift();

      count_data.push(data_y);

      temp = [now += updateInterval, data_y];
      data.push(temp);

      $.plot("#interactive", [data], {
        grid: {
          borderColor: "#f3f3f3",
          borderWidth: 1,
          tickColor: "#f3f3f3",
          hoverable: true,
          clickable: true
        },
        series: {
          shadowSize: 0, // Drawing is faster without shadows
          color: "#3c8dbc",
          lines: {
            fill: true, //Converts the line chart to area chart
            color: "#3c8dbc",
            lineWidth: 1.2,
          }
        },
        yaxis: {
          min: 0,
          max: Math.max.apply(Math,count_data) + 20,
          show: true
        },
        xaxis: {
            mode: "time",
            tickSize: [2, "second"],
            tickFormatter: function (v, axis){
                var date = new Date(v);

                if (date.getSeconds() % 20 == 0) {
                    var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
                    var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
                    var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();

                    return hours + ":" + minutes + ":" + seconds;
                } else {
                    return "";
                }
            }
        }
      });

      if(realtime === "on")
        setTimeout(GetData, updateInterval);

    }

    function GetData(){
      $.ajaxSetup({ cache: false });
      $.ajax({
        url: '{{Config::get('newportal.root_url')}}' + '/admin/statistic/countLoginToday',
        async: true,
        type: 'GET',
        success: update,
        error: function(){
          setTimeout(GetData, updateInterval);
        }

      });
    }

    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: "absolute",
      display: "none",
      opacity: 0.8
    }).appendTo("body");
    $("#interactive").bind("plothover", function (event, pos, item) {

      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2);

        $("#line-chart-tooltip").html("Total login user today " + " = " + y)
            .css({top: item.pageY + 5, left: item.pageX + 5})
            .fadeIn(200);
      } else {
        $("#line-chart-tooltip").hide();
      }

    });

    //REALTIME TOGGLE
    $("#realtime .btn").click(function () {
      if ($(this).data("toggle") === "on") {
        realtime = "on";
      }
      else {
        realtime = "off";
      }
      GetData();
    });
    /*
     * END INTERACTIVE CHART
     */
</script>

@stop