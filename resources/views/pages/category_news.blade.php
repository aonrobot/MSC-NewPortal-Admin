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

{{--*/$posts = App\Library\Tools::sortPost($posts)/*--}}

@if(isset($posts[0]))
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
        <a class="btn btn-default" href="{{ asset('post/' . $posts[0]['pid']) }}">อ่านข่าวต่อ</a>
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

@for($i = 0 ; $i < count($posts)/3 ; $i++)
<!-- Projects Row -->
<div class="row">
    @for($j = 1 ; $j <= 3 ; $j++)
    {{--*/ $index = $j+($i*3)-1 /*--}}
    <div class="col-md-4">
        <div class="metrop-news-group-content">
            <a href="{{ asset('post/' . $posts[$index]['pid']) }}">
                <img class="img-responsive" src="{{ asset($posts[$index]['post_thumbnail']) }}" alt="">
            </a>
            <h3 class="metrop-news-head">
                      <a href="{{ asset('post/' . $posts[$index]['pid']) }}">{{ $posts[$index]['post_title'] }}</a>
                  </h3>
            <p class="metrop-news-content">{{ $posts[$index]['post_detail'] }}</p><br>
            <a class="btn btn-default" href="{{ asset('post/' . $posts[$index]['pid']) }}">อ่านข่าวต่อ</a>
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
