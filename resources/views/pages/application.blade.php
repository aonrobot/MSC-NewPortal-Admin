@extends('front_template') @section('head_image')
<header class="intro-header-empty">
</header>
@stop
@section('content')

{{--*/ $em_info = Session::get('em_info')/*--}}
{{--*/ $user = App\Employee::where('EmpCode', '=', $em_info->EmpCode)->first() /*--}}

<br>
<style>
.application {
    padding: 2% 2% 0;
    text-align: justify;
    font-size: 0.1px;
    -webkit-backface-visibility: hidden;
}

.application:after {
    content: '';
    display: inline-block;
    width: 100%;
}

.application .mix,
.application .gap {
    display: inline-block;
    width: 32%;
}

.application .mix {
    text-align: left;
    margin-bottom: 2%;
    display: none;
    margin-right: 11px;
}

.application .mix:after {
    content: attr(data-myorder);
    color: white;
    font-size: 16px;
    display: inline-block;
    vertical-align: top;
    padding: 4% 1%;
    font-weight: 700;
}

.application .mix:before {
    content: '';
    display: inline-block;
    padding-top: 1%;
}

.app-title {
    color: #FFF;
}

.app-title>small {
    color: rgba(255, 255, 255, 0.65);
}

.mix i {
    color: #FFF;
}

#filter {
    font-size: 48px;
    height: 80px;
}

.btn {
    font-family: 'cloud_bold';
}

.star, .starActive {
    float: right;
}

.star i {
    color: rgba(0, 0, 0, 0.4);
}
.star i:hover {
    color: rgb(228, 206, 34);
}
.starActive i {
    color: rgb(228, 206, 34);
}
.starActive i:hover {
    color: rgba(228, 206, 34, 0.74);
}

.app-title a{
  color:#FFF;
}
.app-title a:hover{
  color:#E0E0E0;
}

</style>
<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">  <a href="#"> 
          <i class="fa fa-desktop"></i> </a>  Application<small> แอพพลิเคชั่น</small>
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <div class="controls">
            <h3>คลิกเพื่อเลือกหมวดหมู่แอพพลิเคชั่น :</h3>
             <button class="btn btn-primary filter" data-filter="all" style="margin-top:15px;">
              <span data-toggle="tooltip" data-placement="left" title="กรองทุกหมวดหมู่" style="">All</span>
            </button> 
            @foreach($group as $g)
                @if(!$user->can(['view-app_group-'.$g->group_id]))
                    @continue
                @endif
            <button class="btn btn-primary filter" data-filter=".{{$g->group_name}}" style="margin-top:15px; background: {{$g->group_color}};">
              <span data-toggle="tooltip" data-placement="top" title="กรองตามหมวดหมู่ {{$g->group_title}}">{{$g->group_title}}</span>
            </button>
            @endforeach
            <hr>
            <div class="input-group input-group-lg" style="margin-top:15px;z-index:0" data-toggle="tooltip" data-placement="bottom" title="ค้นหา Application ทั้งหมด">
                <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" id="filter" placeholder="Search" aria-describedby="sizing-addon1">
            </div>
        </div>
        <hr>
        <div id="application" class="application">
            <div class="row">
                {{--*/ $i = 0 /*--}}
                @foreach($app_group as $app)
                {{--*/ //Check Favorite App /*--}}
                {{--*/

                  $emid = intval(Session::get('em_info')->EmpCode);

                  $fid = App\Favorite::where('emid', $emid)->first()->fid;

                  $fav_count = DB::select('select * from favorite_app where app_id = ? and fid = ?',[$app->app_id, $fid])

                /*--}}
                @if(!$user->can(['view-app_group-'.$app->group_id]))
                    @continue
                @endif
                <div class="col-md-3  mix {{$app->group_name}}" data-group-name="{{$app->group_name}}" data-app-name="{{$app->app_name}}" style="background: {{$app->group_color}};">
                    <h4 class="app-title">
                    <a href="{{$app->app_link}}" target="_blank">
                      {{$app->app_name}} <br><br>
                      <small style="color:#FFF;">{{$app->app_description}}</small>
                    </a>
                    <div id="{{$app->app_id}}" class="favBtn {{count($fav_count)>0 ? 'starActive' : 'star'}}">
                          <i class="fa fa-star fa-2x" data-toggle="tooltip" data-placement="left" {{count($fav_count)>0 ? 'title=ไม่ชื่นชอบ' : 'title=ชื่นชอบ'}}></i>
                    </div>
                  </h4>
                </div>
                {{--*/ $i++ /*--}}
                @endforeach
            </div>
            <div class="gap"></div>
            <div class="gap"></div>
        </div>
    </div>
</div>
<script>
$(function() {
    // Instantiate MixItUp:
    $container = $('#application')
    $container.mixItUp();
    $('#filter').keyup(function() {
        var val = $(this).val();
        var state = $container.mixItUp('getState');
        var $filtered = state.$targets.filter(function(index, element) {
            return $(this).text().toString().toLowerCase().indexOf(val.trim()) >= 0;
        });

        $container.mixItUp('filter', $filtered);
    });

    //$('ul.fav_app_list').append('<li>5555</li>');

    $('.favBtn').click(function() {
        var id = $(this).attr('id');
        var class_name = $(this).attr('class').split(' ');

        if(class_name[1] == 'star'){
          $.ajax({
              url: '{{Config::get('newportal.root_url')}}' + '/favorite/add_application/' + id,
              processData: false,
              contentType: false,
              async: true,
              cache: false,
              type: 'GET',
              success: function(data) {

                  swal({

                    title: "เพิ่มเรียบร้อย ^^",
                    text: "เพิ่มเป็นแอพพลิเคชั่นที่ชื่นชอบเรียบร้อย",
                    showConfirmButton: true,
                    timer: 3500,
                    type: "success",
                    confirmButtonText: "ปิด"

                  });

                  $('div[id="'+ id +'"]').removeClass('star').addClass('starActive');

                  console.log(data);

                  //location.reload();
              },
              error: function(error) {
                  swal({

                    title: "แย่จัง T-T",
                    text: "ไม่เพิ่มเป็นแอพพลิเคชั่นที่ชื่นชอบได้เลย",
                    showConfirmButton: true,
                    timer: 3500,
                    type: "error",
                    confirmButtonText: "ปิด"

                  });
              }
          });
        }else{
          $.ajax({
              url: '{{Config::get('newportal.root_url')}}' + '/favorite/remove_application/' + id,
              processData: false,
              contentType: false,
              async: true,
              cache: false,
              type: 'GET',
              success: function(data) {
                  swal({

                    title: "ลบเรียบร้อย ^^",
                    text: "ลบแอพพลิเคชั่นออกจากที่ชื่นชอบเรียบร้อย",
                    showConfirmButton: true,
                    timer: 3500,
                    type: "success",
                    confirmButtonText: "ปิด"

                  });
                  $('div[id="'+ id +'"]').removeClass('starActive').addClass('star');

                  //location.reload();
              },
              error: function(error) {
                  swal({

                    title: "แย่จัง T-T",
                    text: "ไม่ลบแอพพลิเคชั่นออกจากที่ชื่นชอบได้เลย",
                    showConfirmButton: true,
                    timer: 3500,
                    type: "error",
                    confirmButtonText: "ปิด"

                  });
              }
          });
        }

    });

});
</script>
@stop
