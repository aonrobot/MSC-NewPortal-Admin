@inject('categoryController', 'App\Http\Controllers\FrontCategoryController')
@extends('front_template') @section('head_image')
<!-- Page Header -->
@if(!empty($slide_heads))
<header class="intro-header">
    <div class="header-slider">
        <ul>
            @foreach($slide_heads as $slide_head)
            <li><img class="img-responsive" src="{{asset($slide_head->slide_item_img_url)}}"></li>
            @endforeach
        </ul>
    </div>
</header>
@else
<header class="intro-header-empty">
</header>
@endif @stop @section('content')
<!-- content 1 | info -->
<!--<div class="row" id="em_info">
    <div class="col-lg-12">
        <div class="panel panel-default metrop-news-group-content" style="margin:10px 0px 80px 0px">
            <div class="pull-left">
                <h1>Welcome Back<small> | to NewPortal <i class="fa fa-heart" style="color:#E26A6A"></i></small></h1>
            </div>
            <div class="pull-right">
            <a href="#" data-toggle="collapse" data-target="#collapseEmpInfo" aria-expanded="true" aria-controls="collapseEmpInfo" >
                    <h1 data-toggle="tooltip" title="คลิกเพื่อ เปิด/ปิด"><i id="collapseIcon" class="fa fa-chevron-circle-up"></i></h1>
            </a>
            </div>
            <div class="panel-body" style="padding:0px;">
                <div class="col-md-12">
                    <div class="panel-heading collapse in" id="collapseEmpInfo" style="padding:0px;">
                        <div class="fa-stack-img-right fa-4x" style="float:left;margin-right:25px">
                            <a href="{{asset('http://appmsc.metrosystems.co.th/epages/Employeepic/' . intval(Session::get('em_info')->EmpCode) . '.jpg')}}" data-toggle="lightbox" data-title="{{Session::get('em_info')->FullNameEng}} ({{Session::get('em_info')->EmpCode}})">
                            <img src="{{asset('http://appmsc.metrosystems.co.th/epages/Employeepic/' . intval(Session::get('em_info')->EmpCode) . '.jpg')}}" height="100%" style="" />
                            </a>
                        </div>
                        <p>
                            <h3> {{Session::get('em_info')->FullName}} <br>
                            <small>{{Session::get('em_info')->FullNameEng}}</small><br>
                            <small>Employee Code : {{Session::get('em_info')->EmpCode}}</small><br>
                            <small>({{Session::get('em_info')->PositionName}})</small></h3>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12
</div> -->
<!-- /.row -->

<!-- content 2 | slide -->
<div class="row">
    <div class="metrop-text-head">
        <h2>ข่าวสารที่กำลังจะเกิดขึ้น</h2>
    </div>
    <div class="news-slider home_slide">
        <ul>
            @foreach($slides as $slide)
            <li>
                {{-- check if $slide not have image --}} @if(!is_null($slide->slide_item_img_url) and $slide->slide_item_img_url != '')
                <div class="col-md-5">
                    <img class="img-responsive img-rounded" src="{{asset($slide->slide_item_img_url)}}" width="900" height="350" alt="">
                </div>
                @endif
                <!-- /.col-md-8 -->
                {{-- check if $slide not have image --}}
                <div class="{{(is_null($slide->slide_item_img_url) or $slide->slide_item_img_url == '') ? 'col-md-12' : 'col-md-7'}}">
                    <h2>{{$slide->slide_item_title}}<small><h3>{{$slide->slide_item_subtitle}}</h3></small></h2>
                    <ul>
                        <li>
                            {!!$slide->slide_item_content!!}
                        </li>
                    </ul>
                    <br> @if(!is_null($slide->slide_item_content_link))
                    <a class="btn btn-primary btn-lg" href="{{asset($slide->slide_item_content_link)}}" style=" margin-bottom: 35px;">อ่านข่าวต่อ</a><br>
                @endif
                </div>
                <!-- /.col-md-4 -->
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- /.row -->
<hr>

<!-- content 2 | news -->
<div class="row">
    <div class="metrop-text-head">
        <h2>{{empty($news_category['cat_title']->cat_title)? 'ข่าวสาร' : $news_category['cat_title']->cat_title}}</h2>
    </div>
    @foreach($news_category['posts'] as $news)
    <div class="col-md-4 col-sm-6">
        <div class="metrop-thumbnail">
            <img class="img-responsive" src="{{ asset($news['post_thumbnail']) }}" alt="">
        </div>
        <div class="metrop-news-group-content">
            <div class="metrop-news-label">
                <!--<span class="label label-primary">
                                <i class="fa fa-envelope"></i>
                                New</span>-->
            </div>
            <h3 class="metrop-news-head">{{$news['post_title']}}</h3>
            <p class="metrop-news-content">{{$news['post_detail']}}</p>
            <div class="metrop-news-group-footer">
                <a class="btn btn-default" href="{{ asset('post/'. $news['pid']) }}">อ่านข่าวต่อ</a>
                <span>
                                <i class="fa fa-clock-o"></i>
                                {{App\Library\Tools::postTime($news['created_at'])}}</span>
            </div>
        </div>
    </div>
    <!-- /.col-md-4 -->
    @endforeach
    @if(count($news_category['posts']) == 3 || count($news_category['posts']) == 0)
    <div class="col-md-12 col-sm-12 text-center" style="margin:120px 0 120px 0;">
        <h3 class="metrop-news-head">สนใจอ่านข่าวอื่นๆเพิ่มเติมหรือไม่?</h3>
        <p>ถ้าคุณสนใจอ่านข่าวสารอื่นๆเพิ่มเติมสามารถ Click ได้ที่ปุ่มด้านล่างนี้</p>
        <a class="btn btn-primary" target="_blank" href="{{ asset('category/'. $news_category['cat_title']->catid) }}">อ่านเพิ่มเติม</a>
    </div>
    <!-- /.col-md-4 -->
    @else
    <div class="col-md-4 col-sm-6">
        <h3 class="metrop-news-head center-y">สนใจอ่านข่าวอื่นๆเพิ่มเติมหรือไม่?</h3>
        <p>ถ้าคุณสนใจอ่านข่าวสารอื่นๆเพิ่มเติมสามารถ Click ได้ที่ปุ่มด้านล่างนี้</p>
        <a class="btn btn-primary" target="_blank" href="{{ asset('category/'. $news_category['cat_title']->catid) }}">อ่านเพิ่มเติม</a>
    </div>
    <!-- /.col-md-4 -->
    @endif
</div>
<!-- /.row -->
<hr>
<!-- content 3 | Calendar -->
<div class="row disible-sm">
    <div class="metrop-text-head">
        <h2>ปฏิทินกิจกรรมประจำปี</h2>
    </div>
    <div class="col-md-12">
        <div class="list-group">
            <div class="metrop-card-gray">
                <div style="overflow:hidden;">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                    <script>
                    function editEvent(event) {
                        $('#event-modal input[name="event-index"]').val(event ? event.id : '');
                        $('#event-modal input[name="event-name"]').val(event ? event.name : '');
                        $('#event-modal input[name="event-location"]').val(event ? event.location : '');
                        $('#event-modal input[name="event-start-date"]').datepicker('update', event ? event.startDate : '');
                        $('#event-modal input[name="event-end-date"]').datepicker('update', event ? event.endDate : '');
                        $('#event-modal').modal();
                    }

                    function deleteEvent(event) {
                        var dataSource = $('#calendar').data('calendar').getDataSource();

                        for (var i in dataSource) {
                            if (dataSource[i].id == event.id) {
                                dataSource.splice(i, 1);
                                break;
                            }
                        }

                        $('#calendar').data('calendar').setDataSource(dataSource);
                    }

                    function saveEvent() {
                        var event = {
                            id: $('#event-modal input[name="event-index"]').val(),
                            name: $('#event-modal input[name="event-name"]').val(),
                            location: $('#event-modal input[name="event-location"]').val(),
                            startDate: $('#event-modal input[name="event-start-date"]').datepicker('getDate'),
                            endDate: $('#event-modal input[name="event-end-date"]').datepicker('getDate')
                        }

                        var dataSource = $('#calendar').data('calendar').getDataSource();

                        if (event.id) {
                            for (var i in dataSource) {
                                if (dataSource[i].id == event.id) {
                                    dataSource[i].name = event.name;
                                    dataSource[i].location = event.location;
                                    dataSource[i].startDate = event.startDate;
                                    dataSource[i].endDate = event.endDate;
                                }
                            }
                        } else {
                            var newId = 0;
                            for (var i in dataSource) {
                                if (dataSource[i].id > newId) {
                                    newId = dataSource[i].id;
                                }
                            }

                            newId++;
                            event.id = newId;

                            dataSource.push(event);
                        }

                        $('#calendar').data('calendar').setDataSource(dataSource);
                        $('#event-modal').modal('hide');
                    }

                    function redirect(url) {
                        window.open(url, "_self");
                    }

                    $(function() {
                        var currentYear = new Date().getFullYear();
                        var d = new Date();
                        $('#calendar').calendar({
                            enableContextMenu: true,
                            enableRangeSelection: true,
                            minDate: new Date(currentYear, d.getMonth(), d.getDate()),
                            contextMenuItems: [{
                                text: 'Update',
                                click: editEvent
                            }, {
                                text: 'Delete',
                                click: deleteEvent
                            }],
                            selectRange: function(e) {
                                //editEvent({ startDate: e.startDate, endDate: e.endDate });
                            },
                            clickDay: function(e) {
                                if (e.events.length > 0) {
                                    if (e.events[0].linkUrl) {
                                        redirect(e.events[0].linkUrl);
                                    }
                                }

                            },
                            mouseOnDay: function(e) {
                                if (e.events.length > 0) {
                                    var content = '';

                                    for (var i in e.events) {
                                        content += '<div class="event-tooltip-content">' +
                                            '<div class="event-name" style=""><a href="event.html" style="font-size: 18px;color:' + e.events[i].color + '">' + e.events[i].name + "</a>" + '</div>' +
                                            '<div class="event-location">' + e.events[i].location + '</div>' +
                                            '</div>';
                                    }

                                    $(e.element).popover({
                                        trigger: 'manual',
                                        container: 'body',
                                        html: true,
                                        content: content
                                    });

                                    $(e.element).popover('show');
                                }
                            },
                            mouseOutDay: function(e) {
                                if (e.events.length > 0) {
                                    $(e.element).popover('hide');
                                }
                            },
                            dayContextMenu: function(e) {
                                $(e.element).popover('hide');
                            },
                            dataSource: [{
                                id: 0,
                                name: 'Google I/O',
                                location: 'San Francisco, CA',
                                startDate: new Date(currentYear, 4, 28),
                                endDate: new Date(currentYear, 4, 29)
                            }, {
                                id: 1,
                                name: 'Microsoft Convergence',
                                location: 'New Orleans, LA',
                                startDate: new Date(currentYear, 2, 16),
                                endDate: new Date(currentYear, 2, 19)
                            }, {
                                id: 2,
                                name: 'Microsoft Build Developer Conference',
                                location: 'San Francisco, CA',
                                startDate: new Date(currentYear, 3, 29),
                                endDate: new Date(currentYear, 4, 1)
                            }, {
                                id: 3,
                                name: 'Apple Special Event',
                                location: 'San Francisco, CA',
                                startDate: new Date(currentYear, 8, 1),
                                endDate: new Date(currentYear, 8, 1)
                            }, {
                                id: 4,
                                name: 'Apple Keynote',
                                location: 'San Francisco, CA',
                                startDate: new Date(currentYear, 8, 9),
                                endDate: new Date(currentYear, 8, 9)
                            }, {
                                id: 5,
                                name: 'Chrome Developer Summit',
                                location: 'Mountain View, CA',
                                startDate: new Date(currentYear, 10, 17),
                                endDate: new Date(currentYear, 10, 18)
                            }, {
                                id: 6,
                                name: 'F8 2015',
                                location: 'San Francisco, CA',
                                startDate: new Date(currentYear, 2, 25),
                                endDate: new Date(currentYear, 2, 26)
                            }, {
                                id: 7,
                                name: 'Yahoo Mobile Developer Conference',
                                location: 'New York',
                                startDate: new Date(currentYear, 7, 25),
                                endDate: new Date(currentYear, 7, 26),
                                linkUrl: 'event.html'
                            }, {
                                id: 8,
                                name: 'Android Developer Conference',
                                location: 'Santa Clara, CA',
                                startDate: new Date(currentYear, 11, 1),
                                endDate: new Date(currentYear, 11, 4)
                            }, {
                                id: 9,
                                name: 'LA Tech Summit',
                                location: 'Los Angeles, CA',
                                startDate: new Date(currentYear, 10, 17),
                                endDate: new Date(currentYear, 10, 17)
                            }]
                        });

                        $('#save-event').click(function() {
                            saveEvent();
                        });

                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<hr>
<!-- content 4 | Group News -->
<div class="row">
    <div class="metrop-text-head">
        <h2>รวมข่าวสารแยกตามประเภท</h2>
    </div>
    <div class="col-md-12">
        <div class="row">

            {{--*/$i = 0;/*--}}
            {{--*/ $color = ["#875F9A" , "#5D3F6A", "#763568", "#9B59B6" ,"#5B3256" , "#8E44AD" ,"#4D8FAC", "#5D8CAE","#22A7F0", "#19B5FE", "#59ABE3", "#48929B", "#317589", "#4B77BE", "#1F4788", "#044F67", "#264348", "#7A942E", "#5B8930", "#6B9362", "#407A52", "#006442", "#049372" , "#16A085", "#03A678", "#4DAF7C", "#E08A1E", "#FFA400", "#FFA631" , "#6C7A89", "#757D75"] /*--}}
            @foreach($categorys as $category)

            {{-- */$cat_posts = $categoryController->cat_posts($category->catid)/* --}}
            {{-- */$posts = App\Library\Tools::sortPost($cat_posts['posts']) /* --}}
            @if(isset($posts[0]))
            <div class="col-sm-4" data-toggle="tooltip" title="คลิกเพื่อ อ่านข่าวประเภท {{is_null($category->cat_title) || empty($category->cat_title) ? $category->cat_name : $category->cat_title}}">
                <a href="{{asset('category/news/'.$category->catid)}}">
                <div class="metrop-news-group-content-color" style="background: {{$color[rand(0,30)]}};">
                    <div class="metrop-news-group-content metrop-news-group-content-img" style="background-image:url('{{ asset($posts[0]['post_thumbnail']) }}');">
                        <div class="metrop-news-content">
                        </div>
                    </div>
                    <p class="cat-label">{{is_null($category->cat_title) || empty($category->cat_title) ? $category->cat_name : $category->cat_title}}</p>
                </div>

                </a>
            </div>
            @else
            <div class="col-sm-4">
                <a href="{{asset('category/news/'.$category->catid)}}">
                <div class="metrop-news-group-content" style="background-color:{{$color[rand(0,24)]}};">
                    <div class="metrop-news-content">
                        <p class="cat-label">{{is_null($category->cat_title) || empty($category->cat_title) ? $category->cat_name : $category->cat_title}}</p>
                    </div>
                </div>
                </a>
            </div>
            @endif
            {{--*/$i++;/*--}}
            @endforeach
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function($) {

    $('.metrop-news-group-content').hover(function(){
        //$('.metrop-news-group-content-img').css();
    });

    $('.header-slider').unslider({
        arrows: false,
        @if(!empty($slide_setting['home_head']))
        speed: {
            {
                is_null($slide_setting['home_head'][0] - > slide_speed) ? 1500 : $slide_setting['home_head'][0] - > slide_speed
            }
        },
        delay: {
            {
                is_null($slide_setting['home_head'][0] - > slide_delay) ? 1500 : $slide_setting['home_head'][0] - > slide_delay
            }
        }
        @endif
    });

    $('.news-slider').unslider({
        autoplay: true,
        arrows: false,
        @if(!empty($slide_setting['home']))
        speed: {
            {
                is_null($slide_setting['home'][0] - > slide_speed) ? 1500 : $slide_setting['home'][0] - > slide_speed
            }
        },
        delay: {
            {
                is_null($slide_setting['home'][0] - > slide_delay) ? 1500 : $slide_setting['home'][0] - > slide_delay
            }
        }
        @endif
    });

    $('.news-slider').hover(function() {
        $('.news-slider').unslider("stop");
    }, function() {
        $('.news-slider').unslider("start");
    });

    $('#collapseEmpInfo').on('hidden.bs.collapse', function () {
        $('#collapseIcon').removeClass('fa-chevron-circle-up').addClass('fa-chevron-circle-down');
    });
    $('#collapseEmpInfo').on('shown.bs.collapse', function () {
        $('#collapseIcon').removeClass('fa-chevron-circle-down').addClass('fa-chevron-circle-up');
    });

});
</script>
@stop
