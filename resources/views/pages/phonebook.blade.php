@extends('front_template') @section('head_image')
<header class="intro-header-empty">
</header>
@stop @section('content')
<br>
<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><a href="#" onclick="window.history.back();">
          <i class="fa fa-fw fa-phone"></i></a> PhoneBook<small> Find everything what do you want <3</small>
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <table id="phonebook" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Img</th>
                    <th>Name</th>
                    <th>Nick</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Building</th>
                    <th>Company</th>
                    <th>Department</th>
                    <th style="display:none">ForBo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($phonebook as $pb)
                {{--*/ $img_url = asset('http://appmsc.metrosystems.co.th/epages/Employeepic/' . intval($pb->EmpCode) . '.jpg') /*--}} {{--*/ $img404_url = asset('images/avatar-404.jpg') /*--}}
                @if(!App\Library\Tools::is_url_exist($img_url))
                <tr>
                    <td>{{$pb->EmpCode}}</td>
                    <!--<td>
                        <div id="div_avatar" style="width:200;height:100;">

                            <a href="{{ App\Library\Tools::is_url_exist($img_url) ? $img_url : $img404_url }}" data-toggle="lightbox" data-title="{{ $pb->FullNameEng }}">
                          <img id="avatar" src="{{ App\Library\Tools::is_url_exist($img_url) ? $img_url : $img404_url }}" class="main-img img-responsive" alt="{{ $pb->FullNameEng }}">
                        </a>
                        </div>
                    </td>-->
                    <td>{{$pb->FullName}}</td>
                    <td>{{$pb->NickName}}</td>
                    <td>{{$pb->email}}</td>
                    <td>{{$pb->EXTNO}}</td>
                    <td>{{$pb->LOCATE}}</td>
                    <td>{{$pb->OrgCode}}</td>
                    <td>{{$pb->OrgUnitName}}</td>
                    <td style="display:none">{{$pb->Gender}}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
$('#phonebook').DataTable({
    "columnDefs": [{
        "width": "10%",
        "targets": 0
    }],
    "order": [
        [1, "desc"]
    ]
});

$('#avatar').error(function() {
    $('#avatar > a').attr('href', 'images/img-404.png');
    $('#avatar > img').attr('src', 'images/img-404.png');
});

</script>
@stop
