@extends('front_template') @section('head_image')
<header class="intro-header-empty">
</header>
@stop @section('content')

<style type="text/css">
    
    .sr-only{
        position: initial;
        font-size: 3.2em;
    }

    .dataTables_wrapper .dataTables_processing{
        height: 250px;
        background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 25%, rgba(255,255,255,1) 75%, rgba(255,255,255,1) 100%);
        top: 10%;
        padding: 55px;
    }
</style>



<br>


<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><a href="#" onclick="window.history.back();">
          <i class="fa fa-fw fa-phone"></i></a> PhoneBook<small> สมุดโทรศัพท์</small>
        </h1>
    </div>
</div>
<!-- /.row -->

@php

    //for set permission btn
    $OrgUnitCode = strtolower(Session::get('user')->org_code);

    $is_its = strpos($OrgUnitCode, '837-') !== false;
    $is_mis = strpos($OrgUnitCode, '831-') !== false;
    $is_hr = strpos($OrgUnitCode, '611-') !== false;
    
    $its_mode = Session::get('user')->hasRole(['owner','admin','ITS']) || $is_its;
    $not_have_pic_mode = Session::get('user')->hasRole(['owner','admin','MIS','HR']) || $is_mis || $is_hr;

@endphp

<div class="row">
    <div class="col-md-12">
        @if($its_mode)
        <a class="btn btn-danger search_company_btn" data-toggle="modal" data-target="#its_modal">ITS Mode</a>
        @endif
        @if(Session::get('user')->hasRole(['owner','admin','building']))
        <!--<a class="btn btn-danger search_company_btn" data-toggle="modal" data-target="#building_modal"><i></i>ค้นหาทะเบียนรถ</a>-->
        @endif
        @if($not_have_pic_mode)
        <a class="btn btn-danger search_company_btn" data-toggle="modal" data-target="#mis_modal"><i></i>Not Have Picture</a>
        @endif
        <a class="btn btn-success search_company_btn" data-value="">ALL</a>
        <a class="btn btn-primary search_company_btn" data-value="HIS">HIS</a>
        <a class="btn btn-primary search_company_btn" data-value="MCC">MCC</a>
        <!--<a class="btn btn-primary search_company_btn" data-value="MID">MID</a>-->
        <a class="btn btn-primary search_company_btn" data-value="MIT">MIT</a>
        <a class="btn btn-primary search_company_btn" data-value="MSC">MSC</a>
        <br><br>
    </div>

    <div class="col-md-12">
        <hr><h4>หากต้องการ <b><u>เปลี่ยนรูปภาพของท่าน</u></b> กรุณาแจ้งไปที่ HR Email  <a href="mailto:THANANAP@METROSYSTEMS.CO.TH">thananap@metrosystems.co.th</a></h4><hr><br>
    </div>

    <div class="col-md-12">
        <table id="phonebook" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>รูปภาพ</th>
                    <th>ชื่อ ไทย-อังกฤษ</th>
                    <th>ชื่อเล่น</th>
                    <th>อีเมล์</th>
                    <th>เบอร์โทร</th>
                    <th>อาคาร</th>
                    <th>บริษัท</th>
                    <th>หน่วยงาน</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@if($its_mode)

<div id="its_modal" class="modal fade">
    <div class="modal-dialog" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><i class="fa fa-search"></i> Asset Finder</h3>
            </div>
            <div class="modal-body">
                <table id="its_phonebook" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ชื่อเล่น</th>
                            <th>อีเมล์</th>
                            <th>เบอร์โทร</th>
                            <th>อาคาร</th>
                            <th>Asset Number</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endif

<!-- Now don't use -->

@if(Session::get('user')->hasRole(['owner','admin','building']))
<!--
<div id="building_modal" class="modal fade">
    <div class="modal-dialog" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><i class="fa fa-search"></i>ค้นหาทะเบียนรถ</h3>
            </div>
            <div class="modal-body">
                <table id="building_phonebook" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>รูปภาพ</th>
                            <th>ชื่อ ไทย-อังกฤษ</th>
                            <th>ชื่อเล่น</th>
                            <th>อีเมล์</th>
                            <th>เบอร์โทร</th>
                            <th>อาคาร</th>
                            <th>หน่วยงาน</th>
                            <th>ทะเบียนรถ</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
-->
@endif

@if($not_have_pic_mode)

<div id="mis_modal" class="modal fade">
    <div class="modal-dialog" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><i class="fa fa-search"></i> Not Have Avatar In Phonebook NewPortal Finder</h3>
            </div>
            <div class="modal-body">
                <table id="mis_phonebook" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>รหัสพนักงาน</th>
                            <th>ชื่อเล่น</th>
                            <th>อีเมล์</th>
                            <th>เบอร์โทร</th>
                            <th>บริษัท</th>
                            <th>หน่วยงาน</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('plugins/datatables/extensions/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/extensions/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/extensions/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/extensions/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/extensions/buttons.html5.min.js')}}"></script>

@endif


<script>

$('.dataTables_empty').hide();

var table = $('#phonebook').DataTable({
    "columnDefs": [{
        "width": "15%",
        "targets": 0,

    }],
    "order": [
        [1, "asc"]
    ],
    "ajax": '/newportal/api/phonebook',
    processing: true,
    "language": {
        "processing": "<i class='fa fa-refresh fa-spin fa-3x fa-fw'></i><br><span class='sr-only'>กำลังโหลดอยู่รอสักครู่นะครับ</span>" //add a loading image,simply putting <img src="loader.gif" /> tag.
    },
});

$('#its_phonebook').DataTable({
    "ajax": '/newportal/api/phonebook/its'
});

//building_phonebook

/*$('#building_phonebook').DataTable({
    "lengthMenu": [[5], [5]],
    "columnDefs": [{
        "width": "15%",
        "targets": 0,

    }],
    "ajax": '/newportal/api/phonebook/building'
});*/


$('#mis_phonebook').DataTable({
    "lengthMenu": [[10, 100, 500, -1], [10, 100, 500, "All"]],
    "ajax": '/newportal/api/phonebook/mis',
    dom: 'Bfrtip',
    buttons: [
        'excelHtml5',
        'pdfHtml5'

    ]
});

$('.search_company_btn').click(function(){
    table.columns(6).search( $(this).data('value') ).draw();
});

$('#avatar').error(function() {
    $('#avatar > a').attr('href', 'images/img-404.png');
    $('#avatar > img').attr('src', 'images/img-404.png');
});

$('#phonebook_filter > label > input').focus();

$(document).keypress(function(e){

    var its_filter = $('#its_phonebook_filter > label > input');
    var building_filter = $('#building_phonebook_filter > label > input');
    var mis_filter = $('#mis_phonebook_filter > label > input');

    if(!its_filter.is(':focus') && !building_filter.is(':focus') && !mis_filter.is(':focus')){

        if(!$('#phonebook_filter > label > input').is(':focus')){
            $('#phonebook_filter > label > input').val('');
        }
        $('#phonebook_filter > label > input').focus();
    }

});

</script>
@stop
