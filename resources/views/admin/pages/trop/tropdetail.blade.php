@extends('admin.admin_template')
@section('content')
<?php $trop_tid = Session::get('trop_id');?>
<head>
    <title>New Portal | Metro Systems Corporation Public Company Limited</title>


    <link href="<?=asset('css/metrop-component.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?=asset('plugins/unslider/unslider.css')?>">
    <link rel="stylesheet" href="<?=asset('plugins/unslider/unslider-dots.css')?>">
</head>

<body>

    <div class="portal-loader"><div><img src="{{asset('loader.gif')}}"><h4>New Portal</h4></div></div>
    <hr>
    <!-- Component JS -->
    <script type="text/javascript" src="<?=asset('plugins/moment/moment.min.js')?>"></script>
    <script src="<?=asset('plugins/imagesloaded/imagesloaded.pkgd.min.js')?>"></script>
    <script src="<?=asset('plugins/unslider/unslider.js')?>"></script>
    <script>
        jQuery(window).load(function () {
            $(".portal-loader").fadeOut("slow");
        });
    </script>



<center>
<?php $em_info = Session::get('em_info');?>
<?php 
	$user = App\Employee::where('EmpCode', '=', $em_info->EmpCode)->first();
	$can_access = ['admin','owner'];
	
?>

@if($trop_tid)
<div class="row">
    <div class="col-lg-12">
        <?php
$big_name = $trop->trop_title;
$name = explode('||', $big_name);
?>
        <h1 class="page-header text-center" style="font-size:72px">{{$name[0]}}
                    @if(count($name)>=2)
                        <small>{{$name[1]}}</small>
                    @endif
        </h1>
    </div>
</div>
<!-- /.row -->
<!-- Image Header -->
<div class="row">
    <header class="intro-header">
        <div class="trop-slider">
            <ul>
                @forelse($slide_items as $slide_item)
                <li><img class="img-responsive" src="{{asset(str_replace('', ' ', $slide_item->slide_item_img_url))}}" /></li>
                @empty
                <div class="col-lg-12">
                    <div class="metrop-news-group-content text-center" style="margin:20px 0px 35px;">
                        <h3>Slide isn't set<br>
                            <small>Please contact your admin or call 78451 (aon@MIS)</small>
                        </h3>
                    </div>
                </div>
                @endforelse
            </ul>
        </div>
    </header>
</div>
<!-- /.row -->
<!-- Service Panels -->
<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">{{isset($menu->menu_title) ? $menu->menu_title : 'Menu | '}}</h2>
    </div>
    @if(isset($menu->menu_item))
    <div class="col-lg-12">

        @foreach($menu->menu_item as $menu_item)
        @if($menu_item->item_type == 'template' && ($menu_item->item_link == '' || empty($menu_item->item_link) || is_null($menu_item->item_link)))
            <div class="col-md-3 col-sm-6" style="-webkit-filter: opacity(25%);">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                                      <img src="{{asset(str_replace('', ' ', $menu_item->item_image))}}" class="fa-stack-3x img-circle" height="130px" width="130px">
                                </span>
                    </div>
                    <div class="panel-body">
                        <h4>{{$menu_item->item_name}}</h4>
                        <p>{{$menu_item->item_description}}</p>
                        <a class="btn">Enter</a>
                    </div>
                </div>
            </div>
            @continue;
        @endif
        @if($menu_item->item_type == 'template')
        <div class="col-md-3 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="fa-stack fa-5x">
                                  <img src="{{asset(str_replace('', ' ', $menu_item->item_image))}}" class="fa-stack-3x img-circle" height="130px" width="130px">
                            </span>
                </div>
                <div class="panel-body">
                    <h4>{{$menu_item->item_name}}</h4>
                    <p>{{$menu_item->item_description}}</p>
                    <a href="{{asset($menu_item->item_link)}}" class="btn btn-primary">Enter</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
		
		@foreach($menu->menu_item as $menu_item)
        @if($menu_item->item_type != 'template' && ($menu_item->item_link == '' || empty($menu_item->item_link) || is_null($menu_item->item_link)))
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                                      <img src="{{asset(str_replace('', ' ', $menu_item->item_image))}}" class="fa-stack-3x img-circle" height="130px" width="130px">
                                </span>
                    </div>
                    <div class="panel-body">
                        <h4>{{$menu_item->item_name}}</h4>
                        <p>{{$menu_item->item_description}}</p>
                        <a href="{{asset($menu_item->item_link)}}" class="btn btn-primary">Enter</a>
                    </div>
                </div>
            </div>
            @continue;
        @endif
        @if($menu_item->item_type != 'template')
        <div class="col-md-3 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="fa-stack fa-5x">
                                  <img src="{{asset(str_replace('', ' ', $menu_item->item_image))}}" class="fa-stack-3x img-circle" height="130px" width="130px">
                            </span>
                </div>
                <div class="panel-body">
                    <h4>{{$menu_item->item_name}}</h4>
                    <p>{{$menu_item->item_description}}</p>
                    <a href="{{asset($menu_item->item_link)}}" class="btn btn-primary">Enter</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    <div class="col-lg-12">
        
    </div>

    @else
    <div class="col-lg-12">
        <div class="metrop-news-group-content text-center" style="margin:20px 0px 35px;">
            <h3>Menu isn't set<br>
                <small>Please contact your admin or call 78451 (aon@mis)</small>
            </h3>
        </div>
    </div>
    @endif
</div>
@endif
@if($trop_tid==0)
<font size="30">Welcome Newportal</font>
@endif
{{$user = Auth::user()}}

@role('owner')
    <p>This is visible to users with the admin role. Gets translated to
    \Entrust::role('admin')</p>
@endrole

</body>
<script>
@if(isset($slide_setting[0]))
jQuery(document).ready(function($) {
    $('.trop-slider').unslider({
        autoplay: true,
        arrows: false,
        speed: {{$slide_setting[0]->slide_speed}},
        delay: {{$slide_setting[0]->slide_delay}},
    });
});
@endif
</script>


@stop
