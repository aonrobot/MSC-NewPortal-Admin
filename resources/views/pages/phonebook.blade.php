@extends('front_template') @section('head_image')
<header class="intro-header-empty">
</header>
@stop @section('content')
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
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-success search_company_btn" data-value="">ALL</a>
        <a class="btn btn-primary search_company_btn" data-value="HIS">HIS</a>
        <a class="btn btn-primary search_company_btn" data-value="MCC">MCC</a>
        <a class="btn btn-primary search_company_btn" data-value="MID">MID</a>
        <a class="btn btn-primary search_company_btn" data-value="MIT">MIT</a>
        <a class="btn btn-primary search_company_btn" data-value="MSC">MSC</a>
        <br><br>
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
                    <th style="display:none">ForBo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($phonebook as $pb)
                {{--*/ $img_url = App\Library\Services::getEmployeeImage($pb->EmpCode) /*--}}
                {{--*/ $img_404 = asset('/images/avatar-404.jpg') /*--}}
                {{--*/ $image = App\Library\Tools::is_url_exist($img_url) ? $img_url : $img_404 /*--}}
                <tr>
                    <td>
                        <div id="div_avatar" style="width:200;height:100;">
                            <a href="{{$image}}" data-toggle="lightbox" data-title="{{ $pb->FullNameEng }}">
                          <img id="avatar" src="{{$image}}" class="main-img img-responsive" alt="{{ $pb->FullNameEng }}">
                        </a>
                        </div>
                    </td>
                    <td>{{$pb->FirstName}} {{$pb->LastName}}<br>(<span style="font-size: 12px">{{$pb->FullNameEng}}</span>)</td>
                    <td>{{$pb->NickName}}</td>
                    <td>{{$pb->email}}</td>
                    <td>{{$pb->EXTNO}}</td>
                    <td>{{$pb->LOCATE}}</td>
                    <td>{{$pb->OrgCode}}</td>
                    <td>{{$pb->OrgUnitName}}</td>
                    <td style="display:none">{{$pb->Gender}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>


<script>

var table = $('#phonebook').DataTable({
    "columnDefs": [{
        "width": "15%",
        "targets": 0,

    }],
    "order": [
        [1, "asc"]
    ]
});

$('.search_company_btn').click(function(){
    table.columns(6).search( $(this).data('value') ).draw();
});

$('#avatar').error(function() {
    $('#avatar > a').attr('href', 'images/img-404.png');
    $('#avatar > img').attr('src', 'images/img-404.png');
});

</script>
@stop
