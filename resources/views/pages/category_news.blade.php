@extends('front_template')

@section('head_image')
<header class="intro-header-empty">
</header>
@stop

@section('content')
<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><a href="#" onclick="window.history.back();"><i data-toggle="tooltip" data-placement="top" title="ย้อนกลับ" class="fa fa-fw fa-chevron-circle-left"></i></a> {{is_null($category->cat_title) || empty($category->cat_title) ? $category->cat_name : $category->cat_title}}
                    <small>ทั้งหมด</small>
                </h1>
    </div>
</div>
<!-- /.row -->

@if($category->cat_subtype != 'not_news')

@if(isset($posts[0]))
@php $posts[0] = (array) $posts[0]; @endphp
<div class="row">
    <div class="col-md-8">
        <a href="{{ asset('post/' . $posts[0]['pid']) }}">
            <img class="img-responsive" src="{{ asset($posts[0]['post_thumbnail']) }}" width="700" height="400" alt="">
        </a>
    </div>
    <div class="col-md-4">
        <h3 class="metrop-news-bighead">
                    <a href="{{ asset('post/' . $posts[0]['pid']) }}">{{$posts[0]['post_title']}}</a>
                </h3>
        <p class="metrop-news-bigcontent">{{$posts[0]['post_detail']}}</p>
        {{--*/$str_date = App\Library\Tools::thaiDate(date('Y-m-d',strtotime($posts[0]['event_start_date'])),3)/*--}}
        <h5 style="color: rgba(108, 150, 175, 0.88);">{{$str_date}}</h5>
        <a class="btn btn-default" style="float: right;" href="{{ asset('post/' . $posts[0]['pid']) }}">อ่านข่าวต่อ</a>
    </div>
</div>
@else
<div class="col-lg-12">
	<div class="metrop-news-group-content text-center" style="margin:20px 0px 35px;">
		<h3>This Category Not Have Post (หมวดหมู่นี้ไม่มีโพส)<br>
			<small>Please contact your admin or call 78451 (aon@MIS)</small>
		</h3>
	</div>
</div>
@endif
<hr>

@endif

@for($i = 0 ; $i < count($posts)/3 ; $i++)
<!-- Projects Row -->
<div class="row">
    @for($j = 1 ; $j <= 3 ; $j++)
    {{--*/ $index = $j+($i*3)-1 /*--}}
    @php $posts[$index] = (array) $posts[$index]; @endphp
    <div class="col-md-4">
        <div class="metrop-news-group-content">
            <a href="{{ asset('post/' . $posts[$index]['pid']) }}">
                <img class="img-responsive" src="{{ asset($posts[$index]['post_thumbnail']) }}" alt="" style="height:200px">
            </a>
            <h3 class="metrop-news-head">
                      <a href="{{ asset('post/' . $posts[$index]['pid']) }}">{{ $posts[$index]['post_title'] }}</a>
                  </h3>
            <p class="metrop-news-content">{{ $posts[$index]['post_detail'] }}</p><br>
            {{--*/$str_date = App\Library\Tools::thaiDate(date('Y-m-d',strtotime($posts[$index]['event_start_date'])),3)/*--}}

            <a class="btn btn-default" style="float: right" href="{{ asset('post/' . $posts[$index]['pid']) }}">{{$category->cat_subtype == 'not_news' ? 'รายละเอียด' : 'อ่านข่าวต่อ'}}</a>
            <h5 style="color: rgba(108, 150, 175, 0.88); ">{{$str_date}}</h5>
        </div>
    </div>
    @if($j+($i*3) == count($posts))
        @break;
    @endif
    @endfor
</div>
<!-- /.row -->
@endfor

@stop
