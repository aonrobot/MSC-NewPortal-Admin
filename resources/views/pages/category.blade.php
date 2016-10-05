@extends('front_template')
@section('head_image')
<header class="intro-header-empty">
</header>
@stop
@section('content')
<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><a href="#" onclick="window.history.back();"><i data-toggle="tooltip" data-placement="top" title="ย้อนกลับ" class="fa fa-fw fa-chevron-circle-left"></i></a> {{$category->cat_title}}
                    <small>{{$category->cat_subtitle}}</small>
                </h1>
    </div>
</div>
<!-- /.row -->
{{-- */$posts = App\Library\Tools::sortPost($posts) /* --}}

{{-- */$row = 4 /* --}}

@for($i = 0 ; $i < count($posts)/$row ; $i++)
<!-- Projects Row -->
<div class="row">
    @for($j = 1 ; $j <= $row ; $j++)
    {{--*/ $index = $j+($i*$row)-1 /*--}}
    <div class="col-md-3">
        <div class="metrop-news-group-content">
            <a href="{{ asset('post/' . $posts[$index]['pid']) }}">
                {{--*/$img_url = App\Library\Tools::have_link($posts[$index]['post_thumbnail'])/*--}}
                <img class="img-responsive" src="{{asset($img_url)}}" alt="" style="height:148px">
            </a>
            <h4 class="metrop-news-head" style="height: 34px;">
                <a href="{{ asset('post/' . $posts[$index]['pid']) }}">{{ $posts[$index]['post_title'] }}</a>
            </h4>
            @if(!empty($posts[$index]['post_detail']) and $posts[$index]['post_detail'] != null)
            <p class="metrop-news-content" >{{ $posts[$index]['post_detail'] }}</p><br>
            <a class="btn btn-default" href="{{ asset('post/' . $posts[$index]['pid']) }}">Read More</a>
            @endif

        </div>
    </div>
    @if($j+($i*$row) == count($posts))
        @break;
    @endif
    @endfor
</div>
<!-- /.row -->
@endfor
@stop
