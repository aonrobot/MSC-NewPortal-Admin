@extends('front_template')
@section('head_image')
<header class="intro-header-empty">
</header>
@stop
@section('content')

{{--*/ $em_info = Session::get('em_info')/*--}}
{{--*/ $user = App\Employee::where('EmpCode', '=', $em_info->EmpCode)->first() /*--}}

<link rel="stylesheet" href="{{asset('plugins/monthly/css/monthly.css')}}">

<style>
    h4.menu_name{
        font-size: 16px;
        height: 32.5px;
        overflow: hidden;
    }

    /* Table */
    .monthly-day, .monthly-day-blank{
        box-shadow: 0 0 0 1.5px #eaeaea;
    }

    .monthly-day-event > .monthly-day-number{
        font-weight: bold;
        font-size: 17px;
    }
    .monthly-today .monthly-day-number{
        width: 22px;
        height: 22px;
        line-height: 23px;
    }

    .monthly-header-title a:last-of-type{
        padding-top: 4px;
        font-size: 14px;
        font-weight: bold;
    }
    .monthly-header-title a:link, .monthly-header-title a:visited{
        padding-top: 4px;
        font-size: 14px;
        font-weight: bold;
    }
    .monthly-next:after, .monthly-prev:after{
        width: 14px;
        height: 14px;
    }
    .monthly-day-title-wrap div{
        font-size: 17px;
    }

    /* When Click Event */

    .monthly-event-list-date{
        font-size: 16px;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center" style="font-size:72px">{{$trop->trop_title}}
            <small>{{$trop->trop_subtitle}}</small>
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
                <li><a href="{{asset($slide_item->slide_item_content_link)}}" target="_blank"><img class="img-responsive" src="{{asset(str_replace('', ' ', $slide_item->slide_item_img_url))}}" /></a></li>
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
    @if($menu->menu_status != 'noTemplate')
        @foreach($menu->menu_item as $menu_item)

        @if($menu_item->item_type == 'template' && ($menu_item->item_link == '' || empty($menu_item->item_link) || is_null($menu_item->item_link)))
            <div class="col-md-3 col-sm-6" style="-webkit-filter: opacity(25%);">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                                      <img src="{{asset(str_replace('', ' ', $menu_item->item_image))}}" class="fa-stack-3x img-circle" height="160px" width="160px">
                                </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="menu_name">{{$menu_item->item_name}}</h4>
                        <p>{{$menu_item->item_description}}</p>
                        <a class="btn">-</a>
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
                                <a href="{{asset($menu_item->item_link)}}">
                                    <img src="{{asset(str_replace('', ' ', $menu_item->item_image))}}" class="fa-stack-3x img-circle" height="160px" width="160px">
                                </a>
                            </span>
                </div>
                <div class="panel-body">
                    <h4 class="menu_name">{{$menu_item->item_name}}</h4>
                    <p>{{$menu_item->item_description}}</p>
                    <a href="{{asset($menu_item->item_link)}}" class="btn btn-primary">More</a>
                </div>
            </div>
        </div>
        @endif

        @endforeach
    @endif

		@foreach($menu->menu_item as $menu_item)
        @if($menu_item->item_type != 'template' && ($menu_item->item_link == '' || empty($menu_item->item_link) || is_null($menu_item->item_link)))
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                                    <a href="{{asset($menu_item->item_link)}}">
                                      <img src="{{asset(str_replace('', ' ', $menu_item->item_image))}}" class="fa-stack-3x img-circle" height="160px" width="160px">
                                    </a>
                                </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="menu_name">{{$menu_item->item_name}}</h4>
                        <p>{{$menu_item->item_description}}</p>
                        <a href="{{asset($menu_item->item_link)}}" class="btn btn-primary">More</a>
                    </div>
                </div>
            </div>
            @continue;
        @endif
        @if($menu_item->item_type != 'template')

        @if(!$user->can(['view-menu_item-'.$menu_item->mtid]) and $trop->trop_type == 'meeting')
            @continue
        @endif

        <div class="col-md-3 col-sm-6">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <span class="fa-stack fa-5x">
                                <a href="{{asset($menu_item->item_link)}}">
                                  <img src="{{asset(str_replace('', ' ', $menu_item->item_image))}}" class="fa-stack-3x img-circle" height="160px" width="160px">
                                </a>
                            </span>
                </div>
                <div class="panel-body">
                    <h4 class="menu_name">{{$menu_item->item_name}}</h4>
                    <p>{{$menu_item->item_description}}</p>
                    <a href="{{asset($menu_item->item_link)}}" class="btn btn-primary">More</a>
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

@if($trop->trop_type == "meeting")
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Schedule Meeting</h2>
    </div>
    <div class="col-lg-12">
        <div id="calendar" class="monthly">
            
        </div>
    </div>
</div>
@endif

<!-- Service Tabs
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Service Tabs</h2>
    </div>
    <div class="col-lg-12">
        <ul id="myTab" class="nav nav-tabs nav-justified">
            <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i> Service One</a>
            </li>
            <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-car"></i> Service Two</a>
            </li>
            <li class=""><a href="#service-three" data-toggle="tab"><i class="fa fa-support"></i> Service Three</a>
            </li>
            <li class=""><a href="#service-four" data-toggle="tab"><i class="fa fa-database"></i> Service Four</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="service-one">
                <h4>Service One</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
            </div>
            <div class="tab-pane fade" id="service-two">
                <h4>Service Two</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
            </div>
            <div class="tab-pane fade" id="service-three">
                <h4>Service Three</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
            </div>
            <div class="tab-pane fade" id="service-four">
                <h4>Service Four</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
            </div>
        </div>
    </div>
</div>
<!-- Service List -->
<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<!--<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Service List</h2>
    </div>
    <div class="col-md-4">
        <div class="media">
            <div class="pull-left">
                <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Service One</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
            </div>
        </div>
        <div class="media">
            <div class="pull-left">
                <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                        </span>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Service Two</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
            </div>
        </div>
        <div class="media">
            <div class="pull-left">
                <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                        </span>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Service Three</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="media">
            <div class="pull-left">
                <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                        </span>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Service Four</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
            </div>
        </div>
        <div class="media">
            <div class="pull-left">
                <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-bomb fa-stack-1x fa-inverse"></i>
                        </span>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Service Five</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
            </div>
        </div>
        <div class="media">
            <div class="pull-left">
                <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-bank fa-stack-1x fa-inverse"></i>
                        </span>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Service Six</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="media">
            <div class="pull-left">
                <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>
                        </span>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Service Seven</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
            </div>
        </div>
        <div class="media">
            <div class="pull-left">
                <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-space-shuttle fa-stack-1x fa-inverse"></i>
                        </span>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Service Eight</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
            </div>
        </div>
        <div class="media">
            <div class="pull-left">
                <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-recycle fa-stack-1x fa-inverse"></i>
                        </span>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Service Nine</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
            </div>
        </div>
    </div>
</div>-->
<!-- /.row -->

<script src="{{asset('plugins/monthly/js/monthly.js')}}"></script>

<script>
@if(isset($slide_setting[0]))
jQuery(document).ready(function($) {
    $('.trop-slider').unslider({
        autoplay: true,
        arrows: false,
        speed: {{$slide_setting[0]->slide_speed}},
        delay: {{$slide_setting[0]->slide_delay}},
    });

    @if($trop->trop_type == "meeting")

        $('#calendar').monthly({
            mode: 'event',
            jsonUrl: '/newportal/plugins/monthly/events.json',
            dataType: 'json'
            //xmlUrl: '/newportal/plugins/monthly/events.xml'
        });

        $("a.monthly-today").trigger('click');
        
    @endif

});
@endif
</script>
@stop
