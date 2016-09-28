@extends('front_template')
@section('head_image')
<header class="intro-header-empty">
</header>
@stop
@section('content')
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
                                      <img src="{{asset(str_replace('', ' ', $menu_item->item_image))}}" class="fa-stack-3x img-circle" height="160px" width="160px">
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
                                  <img src="{{asset(str_replace('', ' ', $menu_item->item_image))}}" class="fa-stack-3x img-circle" height="160px" width="160px">
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
                                      <img src="{{asset(str_replace('', ' ', $menu_item->item_image))}}" class="fa-stack-3x img-circle" height="160px" width="160px">
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
                                  <img src="{{asset(str_replace('', ' ', $menu_item->item_image))}}" class="fa-stack-3x img-circle" height="160px" width="160px">
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
<!-- Service Tabs -->
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
</div>
<!-- /.row -->
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
