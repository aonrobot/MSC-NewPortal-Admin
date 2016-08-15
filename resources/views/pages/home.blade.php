@extends('front_template') 

@section('head_image')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header">
    <div class="header-slider">
        <ul>
            <li><img class="img-responsive" src="{{asset('img/msc-bg.png')}}"></li>
        </ul>
    </div>
</header>
@stop

@section('content')
<!-- content 1 | news -->
<div class="row">
    <div class="news-slider">
        <ul>
            <li>
                <div class="col-md-8">
                    <img class="img-responsive img-rounded" src="img/news/content4.jpg" width="900" height="350" alt="">
                </div>
                <!-- /.col-md-8 -->
                <div class="col-md-4">
                    <h2>ตรวจสุขภาพประจำปี<small>
                                        <h3>วันที่ 16,17,20 มิ.ย. 2559</h3>
                                    </small>
                                </h2>
                    <ul>
                        <li>
                            บริษัท เมโทรซิสเต็มส์คอร์ปอเรชั่น จำกัด (มหาชน) และบริษัทในเครือ จัดโปรแกรมการตรวจสุขภาพประจำปี 2559 ให้กับพนักงานทุกท่าน ในวันที่ 16,17 และ 20 มิถุนายน 2559 ณ Convention Hall อาคาร G ชั้น 2 เวลา 7:00 - 11:00 น. โดยโรงพยาบาลพญาไท 2 และพนักงานทุกท่านสามารถเข้าร่วมกิจกรรมทดสอบสมรรถภาพกล้ามเนื้อแขน ขา และหลัง รวมถึงการตรวจสภาพผิวหน้าได้ภายในงาน
                        </li>
                    </ul>
                    <br>
                    <a class="btn btn-primary btn-lg" href="content_news_1.html">อ่านข่าวต่อ</a>
                </div>
                <!-- /.col-md-4 -->
            </li>
            <li>
                <div class="col-md-8">
                    <img class="img-responsive" src="img/home_img1.jpg" width="900" height="350" alt="">
                </div>
                <!-- /.col-md-8 -->
                <div class="col-md-4">
                    <h2>Metro Systems<small>
                                        <h3>Corporate Social Resposibility</h3>
                                    </small>
                                </h2>
                    <ul>
                        <li>- กำกับดูแลกิจการที่ดี</li>
                        <li>- ปฏิบัติต่อพนักงานแย่างเป็นธรรมและเคารพสิทธิมนุษยชน</li>
                        <li>- ต่อต้านการทุจริตคอร์รัปชั่น</li>
                        <li>- ปฏิบัตต่อผู้ร่วมค้าและเจ้าหนี้ด้วยความเป็นธรรม</li>
                        <li>- ดูแลรักษาสิ่งแวดล้อม</li>
                        <li>- พัฒนาชุมชนและสังคม</li>
                    </ul>
                </div>
                <!-- /.col-md-4 -->
            </li>
            <li>
                <div class="col-md-8">
                    <img class="img-responsive" src="img/success.jpg" width="900" height="350" alt="">
                </div>
                <!-- /.col-md-8 -->
                <div class="col-md-4">
                    <h2>ปัจจัยความสำเร็จองค์กร<small>
                                        <h3>Metro Success Factors</h3>
                                    </small>
                                </h2>
                    <ul>
                        <li>- ภาวะผู้นำ
                        </li>
                        <li>- ความสามารถในการคิด ริเริ่มและการแก้ปัญหา
                        </li>
                        <li>- การสื่อสาร
                        </li>
                        <li>- การทำงานร่วมกัน</li>
                        <li>- ความรู้ในงานและความเป็นมืออาชีพ</li>
                    </ul>
                </div>
                <!-- /.col-md-4 -->
            </li>
            <li>
                <div class="col-md-8">
                    <img class="img-responsive" src="img/mission.jpg" width="900" height="350" alt="">
                </div>
                <!-- /.col-md-8 -->
                <div class="col-md-4">
                    <h2>Mission<small>
                                        <h3></h3>
                                    </small>
                                </h2>
                    <ul>
                        <li>"มุ่งมั่นสู่ความเป็นเลิศและบริหารความต่อเนื่องในธุรกิจเทคโนโลยีสารสนเทศครบวงจร โดยบุคลากรระดับมืออาชีพ เพื่อความสำเร็จของลูกค้า ตลอดจนมีส่วนร่วมในการพัฒนาสังคมแห่งความรู้"</li>
                    </ul>
                </div>
                <!-- /.col-md-4 -->
            </li>
            <li>
                <div class="col-md-8">
                    <img class="img-responsive" src="img/vision.jpg" width="900" height="350" alt="">
                </div>
                <!-- /.col-md-8 -->
                <div class="col-md-4">
                    <h2>Vision<small>
                                        <h3></h3>
                                    </small>
                                </h2>
                    <ul>
                        <li>- มุ่งมั่นในการเป็นตัวแทนจำหน่ายอันดับหนึ่งของสินค้าที่เป็นผู้นำในอุตสาหกรรมไอที</li>
                        <li>- สร้างเสริม และพัฒนา การให้บริการด้านไอทีครบวงจร เพื่อสร้างมูลค่าเพิ่มให้องค์กร</li>
                        <li>- พัฒนาบุคลากรมืออาชีพเพื่อรองรับการให้บริการให้ได้มาตรฐานเพื่อความก้าวหน้าของลูกค้าในการตอบสนองการเปลี่ยนแปลงทางเทคโนโลยี</li>
                    </ul>
                </div>
                <!-- /.col-md-4 -->
            </li>
        </ul>
    </div>
</div>
<!-- /.row -->
<hr>
<!-- content 2 | news -->
<div class="row">
    <div class="col-lg-12">
        <div class="metrop-news-group-content text-center" style="margin:20px 0px 35px;">
            <h3>New MSC Portal<br>
                            <small>Minimalist is Important!</small>
                        </h3>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="metrop-text-head">
        <h2>รอบรั้วเมโทรซิสเต็มส์</h2>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="metrop-thumbnail">
            <img class="img-responsive" src="img/home-news/news6.jpg" alt="">
        </div>
        <div class="metrop-news-group-content">
            <div class="metrop-news-label">
                <span class="label label-primary">
                                <i class="fa fa-envelope"></i>
                                New</span>
            </div>
            <h3 class="metrop-news-head">ชสอ. ร่วมกับ เมโทรซิสเต็มส์ฯ แถลงผลงานความก้าวหน้าโครงการจัดหาโปรแกรมสหกรณ์ออมทรัพย์เพื่อสหกรณ์สมาชิก พร้อมดึง ธนาคารกรุงไทย จำกัด (มหาชน) กับ บริษัท ทีโอที จำกัด (มหาชน) ร่วมเป็นพันธมิตร</h3>
            <p class="metrop-news-content">ดร.เฉลิมพล ดุลสัมพันธ์ ประธานกรรมการ ชุมนุมสหกรณ์ออมทรัพย์แห่งประเทศไทย จำกัด (ชสอ.) เป็นประธานในพิธีการแถลงผลงานความก้าวหน้าโครงการจัดหาโปรแกรมสหกรณ์ออมทรัพย์เพื่อสหกรณ์สมาชิก ร่วมกับ บริษัท เมโทรซิสเต็มส์คอร์ปอเรชั่น จำกัด (มหาชน) หรือ MSC โดยมีนายอรุณ ต่อเอกบัณฑิต ผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น บริษัท เมโทรซิสเต็มส์คอร์ปอเรชั่น จำกัด (มหาชน) พร้อมการลงนามความร่วมมือการใช้บริการเครือข่าย ATM ของธนาคารกรุงไทย จำกัด (มหาชน)</p>
            <div class="metrop-news-group-footer">
                <a class="btn btn-default" href="content_news_2.html">Read More</a>
                <span>
                                <i class="fa fa-clock-o"></i>
                                1 Day Ago</span>
            </div>
        </div>
    </div>
    <!-- /.col-md-4 -->
    <div class="col-md-4 col-sm-6">
        <div class="metrop-thumbnail">
            <img class="img-responsive" src="img/news/content3.jpg" alt="">
        </div>
        <div class="metrop-news-group-content">
            <div class="metrop-news-label">
                <span class="label label-primary">
                                <i class="fa fa-envelope"></i>
                                New</span>
            </div>
            <h3 class="metrop-news-head">เมโทรซิสเต็มส์ฯ หรือ MSC รับมอบประกาศนียบัตรรับรองการเป็นสมาชิกแนวร่วมปฎิบัติของภาคเอกชนไทยในการต่อต้านทุจริต</h3>
            <p class="metrop-news-content">นายสรรพิชญ์ เศรษฐพรพงศ์ ประธานกรรมการ บริษัท เมโทรซิสเต็มส์คอร์ปอเรชั่น จำกัด (มหาชน) รับมอบประกาศนียบัตรรับรองการเป็นสมาชิกแนวร่วมปฏิบัติของภาคเอกชนไทยในการต่อต้านทุจริต จากสมาคมส่งเสริมสถาบันกรรมการบริษัทไทย โดยมี นายกิตติ เตชะทวีกิจกุล รองประธานกรรมการบริหาร เข้าร่วมงานด้วย เมื่อวันที่ 30 พฤษภาคม 2559 ณ โรงแรมแกรนด์ ไฮแอท เอราวัณ</p>
            <div class="metrop-news-group-footer">
                <a class="btn btn-default" href="content_news.html">Read More</a>
                <span>
                                <i class="fa fa-clock-o"></i>
                                15 Min Ago</span>
            </div>
        </div>
    </div>
    <!-- /.col-md-4 -->
    <div class="col-md-4 col-sm-6">
        <div class="metrop-thumbnail">
            <img class="img-responsive" src="img/news/content3-2.jpg" alt="">
        </div>
        <div class="metrop-news-group-content">
            <div class="metrop-news-label">
                <span class="label label-danger">
                                <i class="fa fa-exclamation-triangle"></i>
                                Important</span>
            </div>
            <h3 class="metrop-news-head">เมโทรซิสเต็มส์ฯ หรือ MSC รับมอบประกาศนียบัตรรับรองการเป็นสมาชิกแนวร่วมปฎิบัติของภาคเอกชนไทยในการต่อต้านทุจริต</h3>
            <p class="metrop-news-content">นายสรรพิชญ์ เศรษฐพรพงศ์ ประธานกรรมการ บริษัท เมโทรซิสเต็มส์คอร์ปอเรชั่น จำกัด (มหาชน) รับมอบประกาศนียบัตรรับรองการเป็นสมาชิกแนวร่วมปฏิบัติของภาคเอกชนไทยในการต่อต้านทุจริต จากสมาคมส่งเสริมสถาบันกรรมการบริษัทไทย โดยมี นายกิตติ เตชะทวีกิจกุล รองประธานกรรมการบริหาร เข้าร่วมงานด้วย เมื่อวันที่ 30 พฤษภาคม 2559 ณ โรงแรมแกรนด์ ไฮแอท เอราวัณ</p>
            <div class="metrop-news-group-footer">
                <a class="btn btn-default" href="content_news.html">Read More</a>
                <span>
                                <i class="fa fa-clock-o"></i>
                                Few Minuts Ago</span>
            </div>
        </div>
    </div>
    <!-- /.col-md-4 -->
    <div class="col-md-4 col-sm-6">
        <div class="metrop-thumbnail">
            <img class="img-responsive" src="img/news/content1.jpg" alt="">
        </div>
        <div class="metrop-news-group-content">
            <div class="metrop-news-label">
                <span class="label label-danger">
                                <i class="fa fa-exclamation-triangle"></i>
                                Important</span>
            </div>
            <h3 class="metrop-news-head">มหาวิทยาลัยราชภัฏยะลา นำคณะนักศึกษาสาขาวิทยาการคอมพิวเตอร์ และสาขาวิชาเทคโนโลยีสารสนเทศเยี่ยมชมเมโทรซิสเต็มส์ฯ</h3>
            <p class="metrop-news-content">มหาวิทยาลัยราชภัฏยะลา นำคณะนักศึกษาชั้นปีที่ 3 สาขาวิชาวิทยาการคอมพิวเตอร์ และสาขาวิชาเทคโนโลยีสารสนเทศ คณะวิทยาศาสตร์เทคโนโลยีและการเกษตร พร้อมอาจารย์ รวม 61 คน เข้าศึกษาดูงาน และฟังการบรรยายความรู้ด้านไอที จาก นายยงยุทธ ศรีวันทนียกุล ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น บริษัท เมโทรซิสเต็มส์คอร์ปอเรชั่น จำกัด (มหาชน) โดย นายมีลาภ โสขุมา Solution Architect ร่วมบรรยาย และนำเยี่ยมชมศูนย์สาธิตเทคโนโลยีต่างๆ ภายในบริษัท เมโทรซิสเต็มส์คอร์ปอเรชั่น จำกัด (มหาชน) สำนักงานใหญ่ เมื่อวันที่ 21 มิถุนายน 2559
            </p>
            <div class="metrop-news-group-footer">
                <a class="btn btn-default" href="content_news.html">Read More</a>
                <span>
                                <i class="fa fa-clock-o"></i>
                                3 Day Ago</span>
            </div>
        </div>
    </div>
    <!-- /.col-md-4 -->
    <div class="col-md-4 col-sm-6">
        <div class="metrop-thumbnail">
            <img class="img-responsive" src="img/news/content2.png" alt="">
        </div>
        <div class="metrop-news-group-content">
            <div class="metrop-news-label">
                <span class="label label-danger">
                                <i class="fa fa-exclamation-triangle"></i>
                                Important</span>
            </div>
            <h3 class="metrop-news-head">มหาวิทยาลัยสงขลานครินทร์ (หาดใหญ่) นำนักศึกษาสาขาวิชาวิทยาการคอมพิวเตอร์ เยี่ยมชมเมโทรซิสเต็มส์ฯ</h3>
            <p class="metrop-news-content">ภาควิชาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ อำเภอหาดใหญ่ จังหวัดสงขลา นำคณะนักศึกษาสาขาวิชาวิทยาการคอมพิวเตอร์ ระดับปริญญาตรี ชั้นปีที่ 3 พร้อมอาจารย์ จำนวน 26 คน เข้าศึกษาดูงาน ณ บริษัท เมโทรซิสเต็มส์คอร์ปอเรชั่น จำกัด (มหาชน)</p>
            <div class="metrop-news-group-footer">
                <a class="btn btn-default" href="content_news.html">Read More</a>
                <span>
                                <i class="fa fa-clock-o"></i>
                                25 Day Ago</span>
            </div>
        </div>
    </div>
    <!-- /.col-md-4 -->
    <div class="col-md-4 col-sm-6">
        <h3 class="metrop-news-head center-y">สนใจอ่านข่าวเพิ่มเติมหรือไม่?</h3>
        <p>ถ้าคุณสนใจอ่านข่าวสารเพิ่มเติมสามารถ Click ได้ที่ปุ่มด้านล่างนี้</p>
        <a class="btn btn-primary" target="_blank" href="#">อ่านเพิ่มเติม</a>
    </div>
    <!-- /.col-md-4 -->
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
        <h2>รวมข่าวสารตามประเภท</h2>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-4">
                <div class=" metrop-news-group-content">
                    <a href="content_news_3.html"><img class="img-responsive" src="img/news/content1.jpg" alt=""></a>
                    <div class="metrop-news-content">
                        <a href="content_news_3.html">
                            <h4>เมโทรซิสเต็มส์ฯ หรือ MSC รับมอบประกาศนียบัตรรับรองการเป็นสมาชิกแนวร่วมปฎิบัติของภาคเอกชนไทยในการต่อต้านทุจริต</h4>
                        </a>
                    </div>
                </div>
                <a href="news_cat.html" class="cat-label">กิจกรรมการเยี่ยมชม</a>
            </div>
            <div class="col-sm-4">
                <div class=" metrop-news-group-content">
                    <a href="#"><img class="img-responsive" src="img/home-news/news6.jpg" alt=""></a>
                    <div class="metrop-news-content">
                        <a href="#">
                            <h4>มหาวิทยาลัยราชภัฏยะลา นำคณะนักศึกษาสาขาวิทยาการคอมพิวเตอร์ และสาขาวิชาเทคโนโลยีสารสนเทศเยี่ยมชมเมโทรซิสเต็มส์ฯ</h4>
                        </a>
                    </div>
                </div>
                <a href="#" class="cat-label">อบรม</a>
            </div>
            <div class="col-sm-4">
                <div class=" metrop-news-group-content">
                    <a href="#"><img class="img-responsive" src="img/news/content3.jpg" alt=""></a>
                    <div class="metrop-news-content">
                        <a href="#">
                            <h4>ชสอ. ร่วมกับ เมโทรซิสเต็มส์ฯ แถลงผลงานความก้าวหน้าโครงการจัดหาโปรแกรมสหกรณ์ออมทรัพย์เพื่อสหกรณ์สมาชิก พร้อมดึง ธนาคารกรุงไทย จำกัด (มหาชน) กับ บริษัท ทีโอที จำกัด (มหาชน) ร่วมเป็นพันธมิตร</h4>
                        </a>
                    </div>
                </div>
                <a href="#" class="cat-label">MSC News</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class=" metrop-news-group-content">
                    <a href="#"><img class="img-responsive" src="img/news/content3-2.jpg" alt=""></a>
                    <div class="metrop-news-content">
                        <a href="#">
                            <h4>เมโทรซิสเต็มส์ฯ หรือ MSC รับมอบประกาศนียบัตรรับรองการเป็นสมาชิกแนวร่วมปฎิบัติของภาคเอกชนไทยในการต่อต้านทุจริต</h4>
                        </a>
                    </div>
                </div>
                <a href="#" class="cat-label">หนังสือความมุ่งมั่น</a>
            </div>
            <div class="col-sm-4">
                <div class=" metrop-news-group-content">
                    <a href="#"><img class="img-responsive" src="img/news/content3.jpg" alt=""></a>
                    <div class="metrop-news-content">
                        <a href="#">
                            <h4>เมโทรซิสเต็มส์ฯ หรือ MSC รับมอบประกาศนียบัตรรับรองการเป็นสมาชิกแนวร่วมปฎิบัติของภาคเอกชนไทยในการต่อต้านทุจริต</h4>
                        </a>
                    </div>
                </div>
                <a href="#" class="cat-label">Download Document</a>
            </div>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function($) {
    $('.header-slider').unslider({
        arrows: false,
        speed: 1000
    });
    $('.news-slider').unslider({
        autoplay: true,
        arrows: false,
        speed: 800,
        delay: 3000
    });
    $('.news-slider').hover(function() {
        $('.news-slider').unslider("stop");
    }, function() {
        $('.news-slider').unslider("start");
    });

});
</script>
@stop
