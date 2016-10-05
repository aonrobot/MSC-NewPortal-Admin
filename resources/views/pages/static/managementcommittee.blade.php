@extends('front_template')
@section('head_image')
<header class="intro-header-empty">
</header>
@stop
@section('content')

<style>
    div>img.img-responsive{
        height: 340px;
    }
</style>

<div class="row metrop-row-content">
    <div class="col-md-12">

        <h2 class="page-header"><a href="#" onclick="window.history.back();"><i data-toggle="tooltip" data-placement="top" title="ย้อนกลับ" class="fa fa-fw fa-chevron-circle-left"></i></a> Management Committee </h2>

        <!-- Projects Row -->
        <div class="row metrop-about-group-content1">

			<div class="col-md-4"><img  src="{{asset('/images/pages/static/ManagementCommittee/นายธวิช จารุวจนะ.jpg')}}" alt=""   height="280px" width="260px"></div>

			<div class="col-md-8">
				<h3>คุณธวิช จารุวจนะ</h3>
				<h4>ประธานกรรมการบริหาร/กรรมการผู้จัดการ</h4>
			</div>

		</div>

		<!-- Projects Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/นายกิตติ เตชะทวีกิจกุล.jpg')}}" alt="">
                    <h3 class="metrop-about-head">คุณกิตติ เตชะทวีกิจกุล</h3>
                    <p class="metrop-about-content">รองประธานกรรมการบริหาร/รองกรรมการผู้จัดการ</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/นายณรงค์ จารุวจนะ.jpg')}}" alt="">
                    <h3 class="metrop-about-head">คุณณรงค์ จารุวจนะ</h3>
                    <p class="metrop-about-content">รองประธานกรรมการบริหาร/รองกรรมการผู้จัดการ</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/นายวนารักษ์ เอกชัย.jpg')}}" alt="">
                    <h3 class="metrop-about-head">คุณวนารักษ์ เอกชัย</h3>
                    <p class="metrop-about-content">รองกรรมการผู้จัดการ/ผู้อำนวยการกลุ่มทรัพยากรบุคคล</p>
                </div>
            </div>
        </div>
        <!-- /.row -->

		<!-- Projects Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณธงชัย หล่ำวีระกุล.jpg')}}" alt="">
                    <h3 class="metrop-about-head">คุณธงชัย หล่ำวีระกุล</h3>
                    <p class="metrop-about-content">ผู้อำนวยการกลุ่มผลิตภัณฑ์วัสดุสิ้นเปลืองร</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณอรุณ ต่อเอกบัณฑิต.jpg')}}" alt="">
                    <h3 class="metrop-about-head">คุณอรุณ ต่อเอกบัณฑิต</h3>
                    <p class="metrop-about-content">ผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณวีรพันธุ์ ดุรงค์แสง.jpg')}}" alt="">
                    <h3 class="metrop-about-head">คุณวีรพันธุ์ ดุรงค์แสง</h3>
                    <p class="metrop-about-content">ผู้อำนวยการกลุ่มผลิตภัณฑ์ฮาร์ดแวร์</p>
                </div>
            </div>
        </div>
        <!-- /.row -->

		<!-- Projects Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณนิตยา ธนวิริยะกุล.jpg')}}" alt="">
                    <h3 class="metrop-about-head">คุณนิตยา ธนวิริยะกุล</h3>
                    <p class="metrop-about-content">ผู้อำนวยการกลุ่มบัญชี การเงินและธุรการ/ผู้อำนวยการสำนักเลขานุการ</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณจิระศักดิ์ ตรังคิณีนาถ.png')}}" alt="">
                    <h3 class="metrop-about-head">คุณจิระศักดิ์ ตรังคิณีนาถ</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ฮาร์ดแวร์</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณยงยุทธ ศรีวันทนียกุล.png')}}" alt="">
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
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณอารีรัตน์ วิทูราภรณ์.png')}}" alt="">
                    <h3 class="metrop-about-head">คุณอารีรัตน์ วิทูราภรณ์</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ฮาร์ดแวร์</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณสุรเดช เลิศธรรมจักร์.png')}}" alt="">
                    <h3 class="metrop-about-head">คุณสุรเดช เลิศธรรมจักร์</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณฐิติพงค์ จรณะจิตต์.png')}}" alt="">
                    <h3 class="metrop-about-head">คุณฐิติพงค์ จรณะจิตต์</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น</p>
                </div>
            </div>
        </div>
        <!-- /.row -->

		<!-- Projects Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณสมศักดิ์ มานะยิ่งเจริญ.png')}}" alt="">
                    <h3 class="metrop-about-head">คุณสมศักดิ์ มานะยิ่งเจริญ</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณอรวรรณ วิเชียรกวี.png')}}" alt="">
                    <h3 class="metrop-about-head">คุณอรวรรณ วิเชียรกวี</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์ซอฟต์แวร์โซลูชั่น</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณเนาวนิจ หลิมประเสริฐศิริ.png')}}" alt="">
                    <h3 class="metrop-about-head">คุณเนาวนิจ หลิมประเสริฐศิริ</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์วัสดุสิ้นเปลือง</p>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="metrop-about-group-content2">
                    <img class="img-responsive" src="{{asset('/images/pages/static/ManagementCommittee/คุณกฤษฎา พันธุ์ลำใย.png')}}" alt="">
                    <h3 class="metrop-about-head">คุณกฤษฎา พันธุ์ลำใย</h3>
                    <p class="metrop-about-content">ผู้ช่วยผู้อำนวยการกลุ่มผลิตภัณฑ์วัสดุสิ้นเปลือง</p>
                </div>
            </div>
		 </div>
        <!-- /.row -->

    </div>
</div>
<!-- /.row -->



@stop
