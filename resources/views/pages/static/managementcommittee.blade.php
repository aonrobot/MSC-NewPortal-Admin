@extends('front_template')
@section('head_image')
<header class="intro-header-empty">
</header>
@stop
@section('content')

<style>
    .big-img{
        height:500px;
    }
    .big-img > .img-responsive{
        display: block;
        width: auto;
        max-height: 100%;
    }
    .metrop-about-group-content2{
        height: 520px;
    }
    .crop{
        width: 340px;
        height: 340px;
        overflow: hidden;
    }
    .crop img{
        height: 478px;
    }
    .notcrop img{
        height: 100%;
    }
</style>

<div class="row metrop-row-content">
    <div class="col-md-12">

        <h2 class="page-header"><a href="#" onclick="window.history.back();"><i data-toggle="tooltip" data-placement="top" title="ย้อนกลับ" class="fa fa-fw fa-chevron-circle-left"></i></a> Management Committee </h2>

        <!-- Projects Row -->
        <div class="row metrop-about-group-content1">

			<div class="col-md-5">
                <img src="{{asset('/images/pages/static/ManagementCommittee/นายธวิช จารุวจนะ.jpg')}}" alt=""  class="img-responsive">
            </div>

			<div class="col-md-7">
				<h1>คุณธวิช จารุวจนะ</h1>
				<h2>ประธานกรรมการบริหาร/กรรมการผู้จัดการ</h2>
			</div>

		</div>

		<!-- Projects Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="notcrop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/นายวนารักษ์ เอกชัย.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณวนารักษ์ เอกชัย</h3>
                    <p class="metrop-about-content">รองกรรมการผู้จัดการ/ผู้อำนวยการกลุ่มทรัพยากรบุคคล</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="notcrop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณวีรพันธุ์ ดุรงค์แสง.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณวีรพันธุ์ ดุรงค์แสง</h3>
                    <p class="metrop-about-content">ผู้อำนวยการกลุ่มผลิตภัณฑ์ฮาร์ดแวร์</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="crop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณจิระศักดิ์ ตรังคิณีนาถ.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณจิระศักดิ์ ตรังคิณีนาถ</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ฮาร์ดแวร์</p>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="crop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณอารีรัตน์ วิทูราภรณ์.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณอารีรัตน์ วิทูราภรณ์</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ฮาร์ดแวร์</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="notcrop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณอรุณ ต่อเอกบัณฑิต.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณอรุณ ต่อเอกบัณฑิต</h3>
                    <p class="metrop-about-content">ผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="crop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณยงยุทธ ศรีวันทนียกุล.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณยงยุทธ ศรีวันทนียกุล</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น</p>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="crop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณฐิติพงค์ จรณะจิตต์.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณฐิติพงค์ จรณะจิตต์</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="crop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณอรวรรณ วิเชียรกวี.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณอรวรรณ วิเชียรกวี</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="crop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณสุรเดช เลิศธรรมจักร์.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณสุรเดช เลิศธรรมจักร์</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น</p>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="crop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณสมศักดิ์ มานะยิ่งเจริญ.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณสมศักดิ์ มานะยิ่งเจริญ</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="notcrop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณธีรพร เลิศธรรมจักร.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณธีรพร เลิศธรรมจักร</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="notcrop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณชัยวัฒน์ ลิขิตจรรยากุล.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณชัยวัฒน์ ลิขิตจรรยากุล</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น</p>
                </div>
            </div>
        </div>
        <!-- /.row -->

		<!-- Projects Row -->
        <div class="row"> 
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="notcrop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณธงชัย หล่ำวีระกุล.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณธงชัย หล่ำวีระกุล</h3>
                    <p class="metrop-about-content">ผู้อำนวยการกลุ่มผลิตภัณฑ์วัสดุสิ้นเปลือง</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="crop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณเนาวนิจ หลิมประเสริฐศิริ.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณเนาวนิจ หลิมประเสริฐศิริ</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์วัสดุสิ้นเปลือง</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="crop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณกฤษฎา พันธุ์ลำใย.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณกฤษฎา พันธุ์ลำใย</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์วัสดุสิ้นเปลือง</p>
                </div>
            </div>
        </div>
        <!-- /.row -->


        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="notcrop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณวิไล แก้วพงศ์มงคล.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณวิไล แก้วพงศ์มงคล</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์วัสดุสิ้นเปลือง</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="notcrop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณประภาวดี โอรสานนท์.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณประภาวดี โอรสานนท์</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์วัสดุสิ้นเปลือง</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <div class="notcrop">
                        <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณนิตยา ธนวิริยะกุล.jpg')}}" alt="">
                    </div>
                    <h3 class="metrop-about-head">คุณนิตยา ธนวิริยะกุล</h3>
                    <p class="metrop-about-content">ผู้อำนวยการกลุ่มบัญชี การเงินและธุรการ/ผู้อำนวยการสำนักเลขานุการ</p>
                </div>
            </div>
		</div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            
        </div>
        <!-- /.row -->

    </div>
</div>
<!-- /.row -->



@stop
