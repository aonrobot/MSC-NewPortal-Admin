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
            <a class="btn btn-default" href="{{ asset('post/' . $posts[$index]['pid']) }}">Read More</a>
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
