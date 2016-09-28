@extends('front_template')
@section('head_image')
<header class="intro-header-empty">
</header>
@stop
@section('content')
<style>
    .orgchart {
      background-image: linear-gradient(90deg, rgb(212, 224, 230) 10%, rgba(0, 0, 0, 0) 10%), linear-gradient(#d0dee4 10%, rgba(0, 0, 0, 0) 10%);
    }
    .orgchart td.left, .orgchart td.right, .orgchart td.top {
      border-color: #aaa;
    }
    .orgchart td>.down {
      background-color: #aaa;
    }
    .orgchart .node .title{
        background-color:rgba(67,87,108,1);
        font-size: 16px;
    }
    .orgchart .node .content{
        border: 1px solid rgba(67,87,108,0.8);
    }

</style>
<div class="row metrop-row-content">
    <div class="col-md-12">
        <h3 style="color:#229ce4;"><i class="fa {{empty($post->post_icon) ? 'fa-file-text' : $post->post_icon}}" style="color:#229ce4" aria-hidden="true"></i> {{$post->post_title}}</h3>
        <ol class="breadcrumb">
            <li><a href="#" onclick="window.history.back();"><i class="fa fa-1x fa-chevron-left"></i> Back</a></li>
            <!--<li><a href="{{asset('/')}}">Home</a></li>
            <li><a href="{{asset('/')}}">Trop</a></li>
            <li><a href="news.html">Cat</a></li>
            <li class="active"> {{$post->post_title}}</li>-->
        </ol>

        <hr>
		{{--*/$orgid = 0/*--}}
        @foreach(json_decode($components) as $component)

            @if($component->name == "cp_content")
                <div style="list-style-type: decimal;list-style: initial;">
                {{-- */ $content = DB::select('select content_content from cp_content where content_id = '.$component->id) /* --}}
                {!! $content[0]->content_content !!}
                </div>
            @endif

            @if($component->name == "cp_video")
                {{-- */ $video = DB::select('select * from cp_video where video_id = ' . $component->id) /* --}}
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <video width="100%" controls>
                            <source src="{{ asset($video[0]->video_path) }}" type="video/mp4"> Your browser does not support HTML5 video.
                        </video>
                    </div>
                </div>
            @endif

            @if($component->name == "cp_image")
                {{-- */ $image = DB::select('select * from cp_image where image_id = ' . $component->id) /* --}}
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <a href="{{ asset($image[0]->image_path) }}" data-toggle="lightbox" data-title="{{ $image[0]->image_alt }}">
                            <img src="{{ asset($image[0]->image_path) }}" class="img-responsive" alt="{{ $image[0]->image_alt }}">
                        </a>
                    </div>
                </div>
            @endif

            @if($component->name == "cp_gallery")
                {{-- */ $gallerys = DB::table('cp_gallery_item')->where('gallery_id', $component->id)->get() /* --}}

                <div class="row">
                    <div class="grid">
                        @foreach($gallerys as $gallery)
                        <div class="grid__item" data-size="1280x853">
                            <a href="{{asset($gallery->item_path)}}" class="img-wrap"><img src="{{asset($gallery->item_path)}}" alt="{{$gallery->item_alt}}" />
                                <div class="description description--grid">{{$gallery->item_alt}}</div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <!-- /grid -->
                    <div class="preview">
                        <button class="action action--close"><i class="fa fa-times"></i><span class="text-hidden">Close</span></button>
                        <div class="description description--preview"></div>
                    </div>
                    <!-- /preview -->
                </div>
                <!-- grid row -->
                <br>

            @endif

            @if($component->name == "cp_orgchart")
				{{--*/$orgid = $component->id/*--}}
                <div id="chart-container"></div>
                <!--<button id="btn-export-hier">Export</button>-->
                <script>
                    $('#chart-container').orgchart({
                      'data' : '{{asset("component/orgchart/".$orgid)}}',
                      'nodeContent': 'title',
                      'draggable': true,
                      'pan': true,
                      'zoom': true
                    });
                </script>
            @endif

            @if($component->name == "cp_file")
                <h3>{{$post->post_title}} File</h3><hr>
                <div class="row">
                        <div class="col-md-12" id="file-container"></div>
                </div>
                <!--<button id="btn-export-hier">Export</button>-->
            @endif

            <br>

        @endforeach

        <br>

        <hr>
<?php
$len = strlen($post->emid);
$len = 6 - $len;
$EmpCode = str_repeat("0", $len) . $post->emid;
?>
        {{--*/ $author = App\MainEmployee::where('EmpCode', '=' , $EmpCode)->first() /*--}}
        <address>
            <strong>{{ $author->FullNameEng }}</strong>
            <br> ( {{ $author->PositionNameEng }} )
            <br> {{ $author->OrgNameEng }}
            <br>
            <abbr title="Phone">Phone : </abbr> {{ $post->author_contact }}
        </address>
    </div>
</div>
<!-- /.row -->

<script type="text/javascript">

    $('#btn-export-hier').on('click', function() {
      var hierarchy = $('#chart-container').orgchart('getHierarchy');
      alert(JSON.stringify(hierarchy, null, 2));
    });

    $(document).ready( function() {

        function openfile(url){
            window.open(url.replace('{{Config::get('newportal.root_folder')}}' + '/public/','{{Config::get('newportal.root_url')}}' + '/'),'_blank');
        }
        $('#file-container').fileTree({
            root: '{{Config::get('newportal.root_folder')}}' + '/public/uploads/trop/{{$post->tid}}/post/{{Request::segment(2)}}/file/',
            script: '{{asset('plugins/filetree/connectors/jqueryFileTree.php')}}',
            expandSpeed: 1000,
            collapseSpeed: 1000,
            multiFolder: false
        }, function(file) {
            openfile(file);
        });
    });
</script>

@stop
