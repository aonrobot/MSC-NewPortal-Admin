@inject('categoryController', 'App\Http\Controllers\FrontCategoryController')
@extends('front_template') 

@section('head_image')
<style>
    /*For Event Valentine*/
    #scrollable-dropdown-menu .tt-menu {
      max-height: 200px;
      overflow-y: auto;
    }
    span.twitter-typeahead{
        display: block!important;
    }
    div.tt-menu{
        width: 100%;
    }
    .heartReceive{
        margin-bottom: 12px;
    }
    .allHeart{
        overflow-y: scroll;
        height: 200px;
    }
    #haveHeart{
        padding-right: 35px;
    }
    #notHaveHeart{
        text-align: center;
    }
    #showHeart{
        border: solid 5px rgba(255, 134, 155, 0.78);
        border-radius: 1.1em;
        padding: 0 45px 25px 35px;
    }
</style>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="metrob__greeting card">

                </div>
                <div class="metrob__quote card m-t-20 p-10">
                </div>
            </div>
           
            <div class="col-md-9 p-l-0 metrob__slide">
                <!-- Page Header -->
                @if(!empty($slide_heads))
                <!-- Bootstrap Slide -->
                <div id="myCarousel" class="carousel slide card" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach($slide_heads as $key=>$slide_head)
                                <li data-target="#myCarousel" data-slide-to="{{$key}}" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="{{$key + 1}}"></li>
                                <li data-target="#myCarousel" data-slide-to="{{$key + 2}}"></li>
                            @endforeach
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @foreach($slide_heads as $key=>$slide_head)
                                <div class="item active">
                                    <a href="https://www.google.com" target="_blank">
                                        <img class="img-responsive" src="../uploads/slide/04/image/slide1.png"  style="width:100%;"/>
                                    </a>
                                </div>
                                <div class="item">
                                    <!-- <a href="{{$slide_head->slide_item_content_link}}" target="_blank"> -->
                                    <a href="https://www.google.com" target="_blank">
                                        <img class="img-responsive" src="../uploads/slide/04/image/slide1.png"  style="width:100%;"/>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="https://www.google.com" target="_blank">
                                        <img class="img-responsive" src="../uploads/slide/04/image/slide1.png"  style="width:100%;"/>
                                    </a>
                                </div>
                                        <!-- <img class="img-responsive" src="{{asset($slide_head->slide_item_img_url)}}" /> -->
                                    <!-- </a> -->
                              
                            @endforeach
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                <!-- End Bootrap Slide -->
                @else
                <div class="row intro-header-empty"> 
                </div>
                @endif  
            </div>
        </div>
    </div>
@stop
@section('content')
@if(Session::get('user')->status != 'outsource')

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
     /.col-lg-12 -->
<!--</div> -->
<!-- /.row -->
@endif

<!-- include('pages.events.Chinese.index') -->

<!-- content 2 | slide -->
<div class="row">
    <div class="metrop-text-head">
        <h2>Upcoming Event & Activities</h2>
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
                    <br>
                    @if(!is_null($slide->slide_item_content_link) and $slide->slide_item_content_link != '')
                        <a class="btn btn-primary btn-lg" href="{{asset($slide->slide_item_content_link)}}" style=" margin-bottom: 35px;">รายละเอียดเพิ่มเติม</a><br>
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
        <h2>Events & Activities{{--empty($news_category['cat_title']->cat_title)? 'ข่าวสาร' : $news_category['cat_title']->cat_title--}}</h2>
    </div>
    {{-- */$posts = App\Library\Tools::sortPost($news_category['posts'],'event_start_date') /* --}}
    @foreach($posts as $news)
    <div class="col-md-4 col-sm-6">
        <div class="metrop-thumbnail">
            <a href="{{ asset('post/'. $news['pid']) }}"><img class="img-responsive" src="{{ asset($news['post_thumbnail']) }}" alt=""></a>
        </div>
        <div class="metrop-news-group-content">
            <div class="metrop-news-label">
                <!--<span class="label label-primary">
                                <i class="fa fa-envelope"></i>
                                New</span>-->
            </div>
            {{--*/$str_date = App\Library\Tools::thaiDate(date('Y-m-d',strtotime($news['event_start_date'])),3)/*--}}
            <a href="{{ asset('post/'. $news['pid']) }}">
                <h3 class="metrop-news-head">{{$news['post_title']}}</h3>
            </a>
            <p class="metrop-news-content">{{$news['post_detail']}}</p>
            <h5 style="color: rgba(108, 150, 175, 0.88);">{{$str_date}}</h5>
            <div class="metrop-news-group-footer">
                <a class="btn btn-default" href="{{ asset('post/'. $news['pid']) }}">อ่านข่าวต่อ</a>
                <span>
                                <i class="fa fa-clock-o"></i>
                                {{App\Library\Tools::postTime($news['event_start_date'])}}</span>
            </div>
        </div>
    </div>
    <!-- /.col-md-4 -->
    @endforeach
    @if(count($news_category['posts']) == 3 || count($news_category['posts']) == 0)
    <div class="col-md-12 col-sm-12 text-center" style="margin:120px 0 120px 0;">
        <h3 class="metrop-news-head">สนใจอ่านข่าวอื่นๆเพิ่มเติมหรือไม่?</h3>
        <p>ถ้าคุณสนใจอ่านข่าวสารอื่นๆเพิ่มเติมสามารถ Click ได้ที่ปุ่มด้านล่างนี้</p>
        <a class="btn btn-primary"  href="{{ asset('category/'. $news_category['cat_title']->catid) }}">อ่านเพิ่มเติม</a>
    </div>
    <!-- /.col-md-4 -->
    @else
    <div class="col-md-4 col-sm-6">
        <h3 class="metrop-news-head center-y">สนใจอ่านข่าวอื่นๆเพิ่มเติมหรือไม่?</h3>
        <p>ถ้าคุณสนใจอ่านข่าวสารอื่นๆเพิ่มเติมสามารถ Click ได้ที่ปุ่มด้านล่างนี้</p>
        <a class="btn btn-primary"  href="{{ asset('category/'. $news_category['cat_title']->catid) }}">อ่านเพิ่มเติม</a>
    </div>
    <!-- /.col-md-4 -->
    @endif
</div>
<!-- /.row -->
<hr>

<div class="row">
        <div class="row align-items-center"> 
            <div class="col-sm-2" data-toggle="tooltip" title="คลิกเพื่อดูข่าวสารประเภทเยี่ยมชม">  
             <a href="https://mscfamily.metrosystems.co.th/?page_id=652" target="_blank">
             <img  class="img-responsive  center-block"  src="images/visitors.png" style="width: 80%;" alt="">
            </div>

            <div class="col-sm-4">
             <h3>News</h3>
             </a>
             <p>ข่าวสาร ความเคลื่อนไหวของกิจกรรมต่าง ๆ การแนะนำผลิตภัณฑ์ หรือ Solutions ใหม่ ๆ ขององค์กร</p>
            </div>
       

            <div class="col-sm-2" data-toggle="tooltip" title="เอกสารให้ดาวน์โหลดต่างๆ เช่น บัตรอวยพรปีใหม่, LOGO, E-letter">  
             <a href="https://mscfamily.metrosystems.co.th/?p=13436" target="_blank">
             <img  class="img-responsive  center-block" src="images/DocShare.png" style="width: 80%;" alt="">
            </div>

            <div class="col-sm-4"> 
             <h3>Document Sharing</h3>
             </a>
             <p>คลังที่รวบรวมเอกสารต่างๆ เพื่อประโยชน์ต่อการใช้งานภายในองค์กร เช่น บัตรอวยพรปีใหม่, โลโก้บริษัท, กระดาษหัวจดหมายอิเล็กทรอนิกส์</p>
            </div>
        </div>
</div>

       <!-- <div class="col-sm-4" data-toggle="tooltip" title="เอกสารให้ดาวน์โหลดต่างๆ เช่น บัตรอวยพรปีใหม่, LOGO, E-letter" >  
            <a href="https://mscfamily.metrosystems.co.th/?p=13436" target="_blank"> 
             <div class="metrop-news-group-content-color" style="background: linear-gradient(141deg, #fc5c7d, #6a82fb);" >
                 <div class="metrop-news-group-content metrop-news-group-content-img" style="background-image:url('{{ asset($posts[0]['post_thumbnail']) }}');">
                     <div class="metrop-news-content">
                     </div>
                 </div>
                    <p class="cat-label">Document Sharing</p>
                </div>
            </a>
        </div> -->

<hr>
<!-- content 3 | Calendar -->
<div class="row">
	<div class="metrop-text-head">
        <h2>Call Center</h2>
    </div>
    <div class="col-lg-12">
		<div class="col-md-12 hotline">
			<style>
				td.success{
					font-weight: bolder;
				}
			</style>
			<div class="table-responsive">
				<table class="table table-hover">
					<tr>
						<th style="width:20%">Name</th>
						<th>Number</th>
					</tr>
                    <tr>
                        <td class="active">ITS Call Center</td>
                        <td class="success">#78484</td>
                    </tr>
					<tr>
						<td class="active">AR Call Center</td>
						<td class="success">#74444</td>
					</tr>
					<tr>
						<td class="active">BP Call Center</td>
						<td class="success">#77777</td>
					</tr>
					<tr>
						<td class="active">HR Call Center</td>
						<td class="success">#79999</td>
					</tr>

				</table>
			</div>
		</div>
    </div>
</div>
<!-- /.row -->

<hr>
<!-- content 3 | Calendar
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default metrop-news-group-content">
            <div class="panel-body" style="padding:0px;">
                <div class="col-md-12">
                    <div class="panel-heading text-center">

                        <h3>Calendar will available soon <i class="fa fa-heart" style="color:#E26A6A"></i></h3>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- /.col-lg-12-->
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

                    function redirect(url) {
                        window.open(url, "_self");
                    }

                    $(function() {
                        var currentYear = new Date().getFullYear();
                        var d = new Date();

                        $('#calendar').calendar({
                            enableContextMenu: false,
                            enableRangeSelection: false,
                            minDate: new Date(currentYear, d.getMonth(), d.getDate()),
                            maxDate: new Date(currentYear+1, 11, 31),
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
                                name: 'หยุดชดเชยวันขึ้นปีใหม่',
                                location: '',
                                startDate: new Date(2017, 0, 2),
                                endDate: new Date(2017, 0, 3)
                            }, {
                                id: 1,
                                name: 'วันตรุษจีน',
                                location: '',
                                startDate: new Date(2017, 0, 27),
                                endDate: new Date(2017, 0, 30)
                            }, {
                                id: 2,
                                name: 'ชดเชยวันมาฆบูชา',
                                location: '',
                                startDate: new Date(2017, 1, 13),
                                endDate: new Date(2017, 1, 13)
                            }, {
                                id: 3,
                                name: 'วันจักรี',
                                location: '',
                                startDate: new Date(2017, 3, 6),
                                endDate: new Date(2017, 3, 6)
                            }, {
                                id: 4,
                                name: 'วันสงการนต์',
                                location: '',
                                startDate: new Date(2017, 3, 13),
                                endDate: new Date(2017, 3, 14)
                            }, {
                                id: 5,
                                name: 'วันแรงงานแห่งชาติ',
                                location: '',
                                startDate: new Date(2017, 4, 1),
                                endDate: new Date(2017, 4, 1)
                            }, {
                                id: 6,
                                name: 'วันฉัตรมงคล',
                                location: '',
                                startDate: new Date(2017, 4, 5),
                                endDate: new Date(2017, 4, 5)
                            }, {
                                id: 7,
                                name: 'วันวิสาขบูชา',
                                location: '',
                                startDate: new Date(2017, 4, 10),
                                endDate: new Date(2017, 4, 10),
                                linkUrl: 'event.html'
                            }, {
                                id: 8,
                                name: 'ชดเชยวันอาสาฬหบูชา',
                                location: '',
                                startDate: new Date(2017, 6, 10),
                                endDate: new Date(2017, 6, 10)
                            }, {
                                id: 9,
                                name: 'วันเฉลิมพระชนมพรรษา ร.10',
                                location: '',
                                startDate: new Date(2017, 6, 28),
                                endDate: new Date(2017, 6, 28)
                            },{
                                id: 10,
                                name: 'ชดเชยวันเฉลิมพระชนมพรรษา สมเด็จพระนางเจ้า พระบรมราชาชินีนาถ',
                                location: '',
                                startDate: new Date(2017, 7, 14),
                                endDate: new Date(2017, 7, 14)
                            }, {
                                id: 11,
                                name: 'วันคล้ายวันสวรรคต ร.9',
                                location: '',
                                startDate: new Date(2017, 9, 13),
                                endDate: new Date(2017, 9, 13)
                            },{
                                id: 12,
                                name: 'วันปิยมหาราช',
                                location: '',
                                startDate: new Date(2017, 9, 23),
                                endDate: new Date(2017, 9, 23)
                            }, {
                                id: 13,
                                name: 'วันพระราชพิธีถวายพระเพลิงพระบรมศพ ร.9',
                                location: '',
                                startDate: new Date(2017, 9, 26),
                                endDate: new Date(2017, 9, 26)
                            },{
                                id: 14,
                                name: 'วันเฉลิมพระชนมพรรษา พระบาทสมเด็จพระเจ้าอยู่หัว',
                                location: '',
                                color: '#000',
                                startDate: new Date(2017, 11, 5),
                                endDate: new Date(2017, 11, 5)
                            }, {
                                id: 15,
                                name: 'หยุดชดเชยวันพระราชทานรัฐธรรมนูญ',
                                location: '',
                                startDate: new Date(2017, 11, 11),
                                endDate: new Date(2017, 11, 11)
                            }, {
                                id: 16,
                                name: 'วันขึ้นปีใหม่',
                                location: '',
                                startDate: new Date(2018, 0, 1),
                                endDate: new Date(2018, 0, 1)
                            }, {
                                id: 17,
                                name: 'ชดเชยวันสิ้นปี (อาทิตย์ที่ 31 ธันวาคม 2560)',
                                location: '',
                                startDate: new Date(2018, 0, 2),
                                endDate: new Date(2018, 0, 2)
                            }, {
                                id: 18,
                                name: 'วันตรุษจีน',
                                location: '',
                                startDate: new Date(2018, 1, 15),
                                endDate: new Date(2018, 1, 16)
                            }, {
                                id: 19,
                                name: 'วันมาฆบูชา',
                                location: '',
                                startDate: new Date(2018, 2, 1),
                                endDate: new Date(2018, 2, 1)
                            }, {
                                id: 20,
                                name: 'วันพระบาทสมเด็จพระพุทธยอดฟ้าจุฬาโลกมหาราช และวันที่ระลึกมหาจักรีบรมราชวงศ์',
                                location: '',
                                startDate: new Date(2018, 3, 6),
                                endDate: new Date(2018, 3, 6)
                            }, {
                                id: 21,
                                name: 'วันสงกรานต์',
                                location: '',
                                startDate: new Date(2018, 3, 13),
                                endDate: new Date(2018, 3, 13)
                            }, {
                                id: 22,
                                name: 'ชดเชยวันสงการนต์',
                                location: '',
                                startDate: new Date(2018, 3, 16),
                                endDate: new Date(2018, 3, 16)
                            }, {
                                id: 23,
                                name: 'วันแรงงานแห่งชาติ',
                                location: '',
                                startDate: new Date(2018, 4, 1),
                                endDate: new Date(2018, 4, 1)
                            }, {
                                id: 24,
                                name: 'วันวิสาขบูชา',
                                location: '',
                                startDate: new Date(2018, 4, 29),
                                endDate: new Date(2018, 4, 29)
                            }, {
                                id: 25,
                                name: 'วันอาสาฬหบูชา',
                                location: '',
                                startDate: new Date(2018, 6, 27),
                                endDate: new Date(2018, 6, 27)
                            }, {
                                id: 26,
                                name: 'วันคล้ายวันเฉลิมพระชนมพรรษา พระบาทสมเด็จพระเจ้าอยู่หัวมหาวชิราลงกรณบดินทรเทพยวรางกูร',
                                location: '',
                                startDate: new Date(2018, 6, 30),
                                endDate: new Date(2018, 6, 30)
                            }, {
                                id: 27,
                                name: 'ชดเชยวันเฉลิมพระชนมพรรษา สมเด็จพระนางเจ้าพระบรมราชาชินีนาถในพระบาทสมเด็จพระปรมิทรมหาภูมิพลอดุลยเดช บรมนาถบพิตร',
                                location: '',
                                startDate: new Date(2018, 7, 13),
                                endDate: new Date(2018, 7, 13)
                            }, {
                                id: 28,
                                name: 'ชดเชยวันคล้ายวันสวรรคตพระบาทสมเด็จพระปรมินทรมหาภูมิพลอดุลยเดช บรมนาถบพิตร',
                                location: '',
                                startDate: new Date(2018, 9, 15),
                                endDate: new Date(2018, 9, 15)
                            }, {
                                id: 29,
                                name: 'วันปิยมหาราช',
                                location: '',
                                startDate: new Date(2018, 9, 23),
                                endDate: new Date(2018, 9, 23)
                            }, {
                                id: 30,
                                name: 'วันคล้ายวันเฉลิมพระชนมพรรษา พระบามสมเด็จพระปรมินทรมหาภูมิพลอดุลยเดช บรมนาถบพิตร วันชาติ และวันพ่อแห่งชาติ',
                                location: '',
                                startDate: new Date(2018, 11, 5),
                                endDate: new Date(2018, 11, 5)
                            }, {
                                id: 31,
                                name: 'วันพระราชทานรัฐธรรมนูญ',
                                location: '',
                                startDate: new Date(2018, 11, 10),
                                endDate: new Date(2018, 11, 10)
                            }, {
                                id: 32,
                                name: 'วันสิ้นปี',
                                location: '',
                                startDate: new Date(2018, 11, 31),
                                endDate: new Date(2018, 11, 31)
                            }]
                        });

                        //$('th.prev, .year-neighbor, .year-neighbor2, th.next').hide();

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
            <div class="col-sm-3" data-toggle="tooltip" title="คลิกเพื่อ อ่านข่าวประเภท {{is_null($category->cat_title) || empty($category->cat_title) ? $category->cat_name : $category->cat_title}}">
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
            <div class="col-sm-3">
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

<br><hr>

<div class="row text-center">

    <a href="http://appmsc.metrosystems.co.th/mscportal/homeportal.php" target="_blank"><i class="fa fa-history"></i> See Portal in old version.</a>

</div>

<!--<script src="{{asset('plugins/snow/jquery.snow.min.1.0.js')}}"></script>-->

<script>
jQuery(document).ready(function($) {

    //For Snow Day
    //$.fn.snow({minSize: 10, maxSize: 20, newOn: 400, flakeColor : '#eeeeee'});

    $('.metrop-news-group-content').hover(function(){
        //$('.metrop-news-group-content-img').css();
    });

    $('.header-slider').unslider({
        autoplay: true,
        arrows: false,
        animation: 'horizontal',
        @if(!empty($slide_setting['home_head']))
        speed: {{is_null($slide_setting['home_head'][0] -> slide_speed) ? 1500 : $slide_setting['home_head'][0] -> slide_speed}},
        delay: {{is_null($slide_setting['home_head'][0] -> slide_delay) ? 1500 : $slide_setting['home_head'][0] -> slide_delay}}
        @endif
    });

    $('.news-slider').unslider({
        autoplay: true,
        arrows: false,
        animation: 'horizontal',
        @if(!empty($slide_setting['home']))
        speed: {{is_null($slide_setting['home'][0] -> slide_speed) ? 1500 : $slide_setting['home'][0] -> slide_speed}},
        delay: {{is_null($slide_setting['home'][0] -> slide_delay) ? 1500 : $slide_setting['home'][0] -> slide_delay}}
        @endif
    });

    $('.header-slider').hover(function() {
        $('.header-slider').unslider("stop");
    }, function() {
        $('.header-slider').unslider("start");
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