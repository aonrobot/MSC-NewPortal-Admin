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
<script>
    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    
    $( document ).ready(function() {
        timer() ;
    });

    function timer () {
        $("#currentDate").html( getFullDate() );
        $("#currentTime").html( getTime() );
        $("#greetingText").html( greetingText() );
    }
    setInterval(timer, 1000);

    function getTime () {
        var d = new Date();
        var hours = leading0(d.getHours());
        var minute = leading0(d.getMinutes());

        return hours + ':' + minute;
    }

    function getFullDate () {
        var d = new Date();
        var day = days[d.getDay()].toUpperCase();
        var date = leading0(d.getDate());
        var month = months[d.getMonth()];
        var year = d.getFullYear();

        return day + ', ' + date + ' ' + month + ' ' + year;
    }

    function greetingText(){

        var d = new Date();
        var time = d.getHours();
        if (time >= 0 && time < 13 ) {
            return 'Good Morning ,';
        }else{
            return 'Good Afternoon ,';
        }
    }

    function leading0(num) {
        return num < 10 ? '0' + num : num ;
    }

</script>
    <div class="container">
        <div class="row">
            <div class="col-md-3 max-h-350 ">
                <div class="metrob__greeting card">
                
                    <div class="row" style="height: 100%;">
                        <div class="col-md-12">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="../images/icon/Greeting.gif" />
                                </div>
                                <div class="media-body p-t-25">
                                    <span id="currentDate" class="small light"></span> </br>
                                    <span id="currentTime" class="small light text-space"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            <span id="greetingText" class="p-l-20 metrob__greeting-text light"></span> <br />
                            <span class="p-l-20 metrob__greeting-text bold"> 
                                {{ $em_info = Session::get('em_info') -> FirstNameEng }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="metrob__quote card m-t-20 p-10" style=" display: flex; align-items: flex-end;">
                    <h1 class="text-center"  style="color: #fff; font-weight: bold;">
                        <!-- <span style="color: #f8c26b;">M</span>
                        <span style="color: #b3b2db;">E</span>
                        <span style="color: #5da3d7;">T</span>
                        <span style="color: #92c9a9;">R</span>
                        <span style="color: #e54b4f;">O</span>
                        <span style="color: #d08c7d;">Way</span> -->
                        New Employee August
                    </h1>
                    <!-- <a class="btn btn-primary btn-pill-primary pull-right m-t-10" href="http://appmetro.metrosystems.co.th/newportal/post/10471"> ดูเพิ่มเติม </a> -->
                </div>
            </div>
           
            <div class="col-md-9 metrob__slide max-h-350 ">
            
                <!-- Page Header -->
                @if(!empty($slide_heads))
                <!-- Bootstrap Slide -->
                <div id="myCarousel" class="carousel slide card max-h-350" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach($slide_heads as $key=>$slide_head)
                                <li data-target="#myCarousel" data-slide-to="{{$key}}" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="{{$key + 1}}"></li>
                                <li data-target="#myCarousel" data-slide-to="{{$key + 2}}"></li>
                            @endforeach
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner max-h-350">
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

<!-- HR ROWS -->
<div class="row metrob-row">
    <div class="col-md-6 p-l-0 ">
        <div class="card p-20">
            <div class="flex flex-v-center flex-space-between">
                <div>
                    <h1>HR Department</h1>
                        <hr class="separator__title" align="left"  />
                </div>    
            </div>
            <div class="list__container max-h-320">
                <a href="/category/90" class="list__container-link">
                    <div class="media list__item">
                        <div class="media-left">
                            <img src="../images/icon/Welfare.svg" class="media-object" >
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading list__item-title">Welfare</h4>
                            <p class="small light">สวัสดิการต่างๆที่พนักงานได้รับ </p>
                        </div>
                    </div>
                </a>
                <!--  -->
                <a href="/category/10167" class="list__container-link">
                    <div class="media list__item" >
                        <div class="media-left">
                            <img src="../images/icon/Learning.svg" class="media-object" >
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading list__item-title">Learning and Development</h4>
                            <p class="small light">Make you be master in your career path. </p>
                        </div>
                    </div>
                </a>
                <!--  -->
                <a href="/category/111" class="list__container-link">
                    <div class="media list__item">
                        <div class="media-left">
                            <img src="../images/icon/Enterprise.svg" class="media-object" >
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading list__item-title">Organization Effectiveness</h4>
                            <p class="small light">ประสิทธิผลขององค์กร</p>
                        </div>
                    </div>
                </a>
                <!--  -->
                <a href="/post/30605" class="list__container-link">
                    <div class="media list__item">
                        <div class="media-left">
                            <img src="../images/icon/Document.svg" class="media-object" >
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading list__item-title">คู่มือพนักงาน</h4>
                            <p class="small light">คู่มือต่างๆที่พนักงานควรทราบ</p>
                        </div>
                    </div>
                </a>
                <!--  -->
                <a href="/category/88" class="list__container-link">
                    <div class="media list__item">
                        <div class="media-left">
                            <img src="../images/icon/recruitment.svg" class="media-object" >
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading list__item-title">Recruitment</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 p-l-0  p-r-0 ">
        <div class="col-xs-6 col-md-6 p-r-0 ">
            <a href="https://www.metrosystems.co.th" target="_blank">
                <div class="card p-20 card__turquoise text-center">
                    <span class="card__menu-text">metrosystems.co.th</span>
                </div>
            </a>
            
            <div class="card p-20 m-t-20 card__orange text-center">
                <span class="card__menu-text">Anti - Corruption</span>
            </div>

        </div>
        <div class="col-xs-6 col-md-6 p-r-0 ">
            <div class="card p-20 card__green text-center chips">
                <span class="card__menu-text">Company Profile</span>
            </div>
            <div class="card p-20 m-t-20 card__violet text-center">
                <span class="card__menu-text">หนังสือความมุ่งมั่น</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-12 m-t-20 p-r-0">
            <div class="max-h-285" style="height: 285px;">
                <div id="about_us" class="carousel slide card metrob__slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#about_us" data-slide-to="1" class="active"></li>
                        <li data-target="#about_us" data-slide-to="2" class="active"></li>
                        <li data-target="#about_us" data-slide-to="3" class="active"></li>
                        <li data-target="#about_us" data-slide-to="4" class="active"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner max-h-285" style="height: 285px;">
                        <div class="item active p-20 text-center " style="height: 100%;">
                            <div class="metrob__slide-motto">
                                <div>
                                    <h2>Corporate Social Resposibility</h2>
                                </div>
                                <div class="text-left" style="margin:0 auto; display: inline-block;">
                                    <p class="m-t-5">
                                        - กำกับดูแลกิจการที่ดี <br />
                                        - ปฏิบัติต่อพนักงานอย่างเป็นธรรมและเคารพสิทธิมนุษยชน <br />
                                        - ต่อต้านการทุจริตคอร์รัปชั่น <br />
                                        - ปฏิบัตต่อผู้ร่วมค้าและเจ้าหนี้ด้วยความเป็นธรรม <br />
                                        - ดูแลรักษาสิ่งแวดล้อม <br />
                                        - พัฒนาชุมชนและสังคม <br />
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item p-20 text-center" style="height: 100%;">
                            <div class="metrob__slide-motto">
                                <div>
                                    <h2>Vision</h2>
                                </div>
                                <div>
                                    <p class="m-t-5">"เราจะเป็นองค์กรที่ทรงคุณค่า (Trust Worthy) ในสายตาของลูกค้าและคู่ค้า ทั้งในระดับประเทศและระดับภูมิภาค ที่จะช่วยผลักดันให้องค์กรของลูกค้า เกิดการเปลี่ยนผ่านสู่ยุคดิจิตอลอย่างสมบูรณ์แบบ ด้วยนวัตกรรมและบริการที่คุ้มค่าต่อการลงทุน"</p>
                                </div>
                            </div>
                        </div>
                        <div class="item p-20 text-center"  style="height: 100%;">
                            <div class="metrob__slide-motto">
                                <div>
                                    <h2>Mission</h2>
                                </div>
                                <div>
                                    <p class="m-t-5">"มุ่งมั่นสู่ความเป็นเลิศและบริหารธุรกิจด้วยความต่อเนื่องในยุคเศรษฐกิจดิจิตอล อย่างครบวงจร โดยบุคลากรระดับมืออาชีพ เพื่อความสำเร็จของลูกค้า ตลอดจนมีส่วนร่วมในการพัฒนาสังคมแห่งความรู้"</p>
                                </div>
                            </div>
                        </div>
                        <div class="item p-20 text-center" style="height: 100%;">
                            <div class="metrob__slide-motto">
                                <div>
                                    <h2>Metro Success Factors</h2>
                                </div>
                                <div class="text-left" style="margin:0 auto; display: inline-block;">
                                    <p class="m-t-5">
                                        - ภาวะผู้นำ <br />
                                        - ความสามารถในการคิด ริเริ่มและการแก้ปัญหา <br />
                                        - การสื่อสาร <br />
                                        - การทำงานร่วมกัน <br />
                                        - ความรู้ในงานและความเป็นมืออาชีพ <br />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#about_us" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#about_us" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- New -->
<div class="row">
    <div class="col-md-12">
        <div class="card p-20">
            <div class="flex flex-v-center flex-space-between">
                <div>
                    <h1>News & Activitys{{--empty($news_category['cat_title']->cat_title)? 'ข่าวสาร' : $news_category['cat_title']->cat_title--}} </h1>
                    <hr class="separator__title" align="left" />
                </div>
                <div >
                    <a href="{{ asset('category/'. $news_category['cat_title']->catid) }}"><h3 class="flex flex-v-center"> ดูทั้งหมด<i class="fa fa-arrow-circle-o-right p-l-10 icon" aria-hidden="true"></i> </h3></a> 
                </div>
            </div>
            <div class="row">
                {{-- */$posts = App\Library\Tools::sortPost($news_category['posts'],'event_start_date') /* --}}
                @foreach(array_slice($posts, 0, 4) as $news)
                    <div class="col-sm-6 col-md-3 p-20">
                        <a href="{{ asset('post/'. $news['pid']) }}">
                            <div class="metrob__news-thumbnail">
                                <img class="img-responsive" src="../images/tn.jpg" alt="">
                            </div>
                            {{--*/$str_date = (date('d-M-Y',strtotime($news['event_start_date'])))/*--}}
                            <div class="metrob__news">
                                <div class="metrob__news-title">
                                    <h1> {{$news['post_title']}} </h1>
                                </div>
                                <div class="metrob__news-text">
                                    <p> {{$news['post_detail']}} </p>
                                </div>
                                <div class="metrob__news-detail flex-v-center flex-space-between">
                                    <p class="small light"> {{$str_date}} </p>
                                    <p class="small light">  
                                        <span><i class="fa fa-clock-o"></i> {{App\Library\Tools::postTime($news['event_start_date'])}}</span></p>
                                </div>
                            </div>
                        </a> 
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>


    $('#about_us').carousel({
        interval: false
    }); 


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
                            '<div class="event-name" style=""><a href="event.html" style="font-size: 18px;color:' + e.events[i].color + '">' + e.events[i].name + "</a>" + '</div>' + '<div class="event-location">' + e.events[i].location + '</div>' + '</div>';
                    }

                    $(e.element).popover({
                        trigger: 'manual',
                        container: 'body',
                        html: true,
                        content: content
                    });

                    (e.element).popover('show');
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
                name: 'ชดเชยวันเฉลิมพระชนมพรรษา สมเด็จพระนางเจ้าพระบรมราชาชินีนาถในพระบาทสมเด็จพระปรมิทรมหาภูมิพลอ  บรมนาถบพิตร',
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
                name: 'วันคล้ายวันเฉลิมพระชนมพรรษา พระบามสมเด็จพระปรมินทรมหาภูมิพลอดุลยเดช บรมนาถบพิตร  และวันพ่อแห่งชาติ',
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
    });
</script>
<!-- CALENDAR -->
<div class="row m-t-20">
    <div class="col-md-8">
        <div class="card p-20">
            <div class="flex flex-v-center flex-space-between">
                <div>
                    <h1>ปฏิทินกิจกรรม</h1>
                    <hr class="separator__title" align="left" />
                </div>
            </div>
            <div class="list-group">
                <div class="metrop-card-gray">
                    <div style="overflow:hidden;">
                        <div class="form-group">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-20">
            <div class="flex flex-v-center flex-space-between">
                <div>
                    <h1>HAPPY BIRTHDAY</h1>
                    <hr class="separator__title" align="left" />
                    <span class="light small">ร่วมแฮปปี้เบิดเดย์กับพนักงานที่เกิดในเดือนนี้ได้ที่นี้</span>
                </div>
                <div class="">
                    <h3 class="flex flex-v-center"><i class="fa fa-birthday-cake m-r-8" aria-hidden="true"></i> <span id="countCake">0</span></h3>
                </div>
            </div>
            <div class="list__container max-h-450 m-t-10">
                <div class="media list__hbd">
                    <div class="media-left">
                        <div class="list__hbd-avatar" style="background-image:url(http://appmetro.metrosystems.co.th/empimages/43885.jpg?7356)">
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="media-heading list__hbd-title">Suwicha Saeteo</p>
                        <p class="small light">Business Unit : FAG - MIS</p>
                    </div>
                </div>
                <div class="media list__hbd">
                    <div class="media-left">
                        <div class="list__hbd-avatar" style="background-image:url(http://appmetro.metrosystems.co.th/empimages/43885.jpg?7356)">
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="media-heading list__hbd-title">Suwicha Saeteo</p>
                        <p class="small light">Business Unit : FAG - MIS</p>
                    </div>
                </div>
                <div class="media list__hbd">
                    <div class="media-left">
                        <div class="list__hbd-avatar" style="background-image:url(http://appmetro.metrosystems.co.th/empimages/43885.jpg?7356)">
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="media-heading list__hbd-title">Suwicha Saeteo</p>
                        <p class="small light">Business Unit : FAG - MIS</p>
                    </div>
                </div>
                <div class="media list__hbd">
                    <div class="media-left">
                        <div class="list__hbd-avatar" style="background-image:url(http://appmetro.metrosystems.co.th/empimages/43885.jpg?7356)">
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="media-heading list__hbd-title">Suwicha Saeteo</p>
                        <p class="small light">Business Unit : FAG - MIS</p>
                    </div>
                </div>
                <div class="media list__hbd">
                    <div class="media-left">
                        <div class="list__hbd-avatar" style="background-image:url(http://appmetro.metrosystems.co.th/empimages/43885.jpg?7356)">
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="media-heading list__hbd-title">Suwicha Saeteo</p>
                        <p class="small light">Business Unit : FAG - MIS</p>
                    </div>
                </div>
                <div class="media list__hbd">
                    <div class="media-left">
                        <div class="list__hbd-avatar" style="background-image:url(http://appmetro.metrosystems.co.th/empimages/43885.jpg?7356)">
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="media-heading list__hbd-title">Suwicha Saeteo</p>
                        <p class="small light">Business Unit : FAG - MIS</p>
                    </div>
                </div>
            </div>
            <div class="text-center" id="congrats">
                <h3 class="color__violet m-b-0 pointer"> 
                    <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                    ร่วมอวยพรวันเกิด
                </h3>
            </div>
        </div>
    </div>
</div>
<!-- HBD Animation  -->
<style>

.particle {
	height: 50px;
	width: 50px;
    position: absolute;
    left: 50%;
    bottom: 0;
	z-index: 1;
    font-size: 30px;
    display: none;
}

.star {
	color: #ffcc00;
}

.blob {
	background: #fff298;
	border-radius: 50%;
	display: none;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
<script>
    // Click "Congratulations!" to play animation
var particles = ['.blob', '.star'],
	$congratsSection = $('#congrats'),
	$title = $('#title'),
    cake = 0;
    

$(function() {
	init({
		numberOfStars: 20,
		numberOfBlobs: 10
	});
});

$congratsSection.click(fancyPopIn);
$congratsSection.click(countCake);

function countCake(){
    cake += 1;
    $("#countCake").html(cake);
}

function fancyPopIn() {
	reset();
	animateText();
	
	for (var i = 0, l = particles.length; i < l; i++) {
		animateParticles(particles[i]);
	}
}

function animateText() {
	TweenMax.from($title, 0.65, {
		scale: 0.4,
		opacity: 0,
		rotation: 15,
		ease: Back.easeOut.config(5),
	});
}
function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min + 1) ) + min;
}

function animateParticles(selector) {
	var xSeed = getRndInteger(350, 380);
	var ySeed = getRndInteger(120, 170);
	
	$.each($(selector), function(i) {
		var $particle = $(this);
		var speed = getRndInteger(1, 4);
		var rotation = getRndInteger(20, 100);
		var scale = getRndInteger(0.8, 1.5);
		var x = getRndInteger(-xSeed, xSeed);
		var y = getRndInteger(-ySeed, ySeed);

		TweenMax.to($particle, speed, {
			x: x,
			y: y,
			ease: Power1.easeOut,
			opacity: 0,
			rotation: rotation,
			scale: scale,
			onStartParams: [$particle],
			onStart: function($element) {
				$element.css('display', 'block');
			},
			onCompleteParams: [$particle],
			onComplete: function($element) {
				$element.css('display', 'none');
			}
		});
	});
}

function reset() {
	for (var i = 0, l = particles.length; i < l; i++) {
		$.each($(particles[i]), function() {
			TweenMax.set($(this), { x: 0, y: 0, opacity: 1 });
		});
	}
	
	TweenMax.set($title, { scale: 1, opacity: 1, rotation: 0 });
}

function init(properties) {
	for (var i = 0; i < properties.numberOfStars; i++) {
	  $congratsSection.append('<div class="particle star fa fa-birthday-cake ' + i + '"></div>');
	}
	
	for (var i = 0; i < properties.numberOfBlobs; i++) {
	  $congratsSection.append('<div class="particle blob ' + i + '"></div>');
	}	
}
</script>
<!-- End HBD Animation -->


<!-- Contact Slide -->
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="slick">
            <div class="col-md-3 slick__chip p-t-20" style="background: url('../images/chips/AR.png'); ">
                <p class="slick__chip-title">AR Call Center</p>
                <h2 class="slick__chip-number">#74444</h2>
            </div>
            <div class="col-md-3 slick__chip p-t-20" style="background: url('../images/chips/BP.png'); ">
                <p class="slick__chip-title">BP Call Center</p>
                <h2 class="slick__chip-number">#79999</h2>    
            </div>
            <div class="col-md-3 slick__chip p-t-20" style="background: url('../images/chips/BPM.jpg'); ">
                <p class="slick__chip-title">PCM Call Center</p>
                <h2 class="slick__chip-number">#79999</h2>    
            </div>
            <div class="col-md-3 slick__chip p-t-20" style="background: url('../images/chips/HR.png'); ">
                <p class="slick__chip-title">HR Call Center</p> 
                <h2 class="slick__chip-number">#79999</h2>    
            </div>
            <div class="col-md-3 slick__chip p-t-20" style="background: url('../images/chips/ITS.png'); ">
                <p class="slick__chip-title">ITS Call Center</p> 
                <h2 class="slick__chip-number">#79999</h2>
            </div>
        </div>
    </div>
</div>
<style>
    .slick-prev::before {
    font-family: FontAwesome;
    content: "\f0a8";
    font-size: 25px;
    color: #6163BF;
}  
    .slick-next::before {
    font-family: FontAwesome;
    content: "\f0a9";
    font-size: 25px;        
    color: #6163BF;
}      
</style>
<script>
    $(document).ready(function(){

        $('.slick').slick({
            dots: false,
            speed: 300,
            slidesToShow: 3,
            centerMode: true,
            draggable: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 550,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ],
        });
    });
</script>          

<!-- content 4 | Group News -->
<!--<div class="row">
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

</div> -->


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