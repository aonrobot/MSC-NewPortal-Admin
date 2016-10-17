@extends('admin.admin_template') @section('content')
{{--*/$post_path = Session::get('post_path')/*--}}

<?php

$_SESSION["file_path"] = 'uploads' . $post_path . '/file';

?>

<link rel="stylesheet" href="{{asset('/plugins/nestable/nestable.css')}}">
<input type="hidden" id="post_path" value="{{ Session::get('post_path') }}">
<div ng-controller="post.create">
    <!-- form start -->
    <!--<form role="form">
    <!-- Step 1 -->
    <a href="{{asset('/admin/post')}}"><i class="fa fa-1x fa-chevron-left"></i> Back</a>
    <h2><i class="fa {{empty($post->post_icon) ? 'fa-file-text' : $post->post_icon}}"></i> {{$post->post_title}}</h2>
    <br>


    <!-- Step 1 -->
    <h3>1 | Component <small> Click the icon to add component</small></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Media Component</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-1">
                        <a href="#" data-toggle="modal" data-target="#cp_video_modal"><span class="info-box-icon bg-yellow">
                                <i class="fa fa-file-movie-o"></i></span><p>Video</p>
                            </a>
                    </div>
                    <div class="col-md-1">
                        <a href="#" data-toggle="modal" data-target="#cp_image_modal"><span class="info-box-icon bg-yellow"><i class="fa fa-file-image-o"></i></span><p>Image</p></a>
                    </div>
                    <div class="col-md-1">
                        <a href="#" data-toggle="modal" data-target="#cp_content_modal"><span class="info-box-icon bg-yellow"><i class="fa fa-align-left"></i></span><p>Text</p></a>
                    </div>
                    <div class="col-md-1">
                        <a href="#" data-toggle="modal" data-target="#cp_gallery_modal"><span class="info-box-icon bg-yellow"><i class="fa fa-tv"></i></span><p>Gallery</p></a>
                    </div>
                    <div class="col-md-1">
                        <a href="#" data-toggle="modal" data-target="#cp_file_modal"><span class="info-box-icon bg-yellow"><i class="fa fa-file-archive-o"></i></span><p>Archive File</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- Step 2 -->
    <h3>2 | Post <small> Sort your component and preview</small></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Your can sort component by drag and drop</h3>
                </div>
                <hr>
                <div class="box-body">
                    <div class="dd">
                        <ol class="dd-list" >
                            @foreach($components as $com)

                            @if($com->ref_table_name == 'cp_video')
                            {{--*/$cp_video = DB::select('select * from cp_video where video_id = ?',[$com->ref_id])/*--}}
                            <li class="dd-item dd3-item" data-component="cp_video" data-id="{{$cp_video[0]->video_id}}" data-comid="{{$com->comid}}" data-filename="{{$cp_video[0]->video_name}}">
                                <div class="dd-handle dd3-handle">Drag</div>
                                <div class="dd3-content">
                                    <h4><i class="fa fa-video-camera"></i> {{$cp_video[0]->video_name_origin}}</h4>
                                    <video width="95%" controls>
                                        <source src="{{$cp_video[0]->video_path}}" type="video/mp4"> Your browser does not support HTML5 video.
                                    </video><br>
                                    <a class="btn btn-warning">Hide</a>
                                    <a class="btn btn-danger removeComponent"  ng-click="delete">Remove This Video</a>
                                </div>
                            </li>
                            @endif

                            @if($com->ref_table_name == 'cp_image')
                            {{--*/$cp_image = DB::select('select * from cp_image where image_id = ?',[$com->ref_id])/*--}}
                            <li class="dd-item dd3-item" data-component="cp_image" data-id="{{$cp_image[0]->image_id}}" data-comid="{{$com->comid}}" data-filename="{{$cp_image[0]->image_name}}">

                                <div class="dd-handle dd3-handle">Drag</div>
                                <a class="btn btn-default hide-com-btn" data-toggle="collapse" data-target="{{'#com'.$com->comid}}">Show / Hide</a>
                                <h4><i class="fa fa-image"> {{$cp_image[0]->image_name_origin}}</i></h4>

                                <div class="dd3-content collapse" id="{{'com'.$com->comid}}">
                                    <hr>
                                        <image src="{{asset($cp_image[0]->image_path)}}" class="img-responsive"/>
                                    <br>
                                    <a class="btn btn-danger removeComponent"  ng-click="delete">Remove This Image</a>
                                </div>
                            </li>
                            @endif

                            @if($com->ref_table_name == 'cp_gallery')
                            {{--*/$cp_gallery = DB::select('select * from cp_gallery where gallery_id = ?',[$com->ref_id])/*--}}
                            {{-- */ $gallerys = DB::select('select * from cp_gallery_item where gallery_id = ?',[$com->ref_id]) /* --}}
                            <li class="dd-item dd3-item" data-component="cp_gallery" data-id="{{$cp_gallery[0]->gallery_id}}" data-comid="{{$com->comid}}">

                                <div class="dd-handle dd3-handle">Drag</div>
                                <a class="btn btn-default hide-com-btn" data-toggle="collapse" data-target="{{'#com'.$com->comid}}">Show / Hide</a>
                                <h4><i class="fa fa-tv"> Gallery {{$cp_gallery[0]->gallery_id}}</i></h4>

                                <div class="dd3-content collapse" id="{{'com'.$com->comid}}">
                                    <hr>
                                        <div class="row">
                                            @foreach($gallerys as $gallery)
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <img src="{{asset($gallery->item_path)}}" alt="{{$gallery->item_alt}}" class="img-responsive"/>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    <br>
                                    <a class="btn btn-danger removeComponent"  ng-click="delete">Remove This Image</a>
                                </div>
                            </li>
                            @endif

                            @if($com->ref_table_name == 'cp_content')
                            {{--*/$cp_content = DB::select('select * from cp_content where content_id = ?',[$com->ref_id])/*--}}
                            <li class="dd-item dd3-item" data-component="cp_content" data-id="{{$cp_content[0]->content_id}}" data-comid="{{$com->comid}}">

                                <div class="dd-handle dd3-handle">Drag</div>
                                <a class="btn btn-default hide-com-btn" data-toggle="collapse" data-target="{{'#com'.$com->comid}}">Show / Hide</a>
                                {{--*/$content = preg_replace("/&#?[a-z0-9]+;/i","",$cp_content[0]->content_content)/*--}}
                                {{--*/$content = str_replace(" ","",strip_tags($content))/*--}}

                                <h4><i class="fa fa-align-left"> {{substr($content,0,150)}}</i></h4>

                                <div class="dd3-content collapse" id="{{'com'.$com->comid}}">
                                    <hr>
                                    {!! $cp_content[0]->content_content !!}
                                    <br>
                                    <a class="btn btn-danger removeComponent"  ng-click="delete"><i class="fa fa-trash-o"></i> Remove This Content</a>
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#edit_content_modal" data-id="{{$cp_content[0]->content_id}}" ng-click="edit"><i class="fa fa-pencil"></i> Edit This Content</a>
                                </div>

                            </li>
                            @endif

                            @if($com->ref_table_name == 'cp_file')
                            <li class="dd-item dd3-item" data-component="cp_file" data-id="0" data-comid="{{$com->comid}}">

                                <div class="dd-handle dd3-handle">Drag</div>
                                <a class="btn btn-default hide-com-btn" data-toggle="collapse" data-target="{{'#com'.$com->comid}}">Show / Hide</a>

                                <h4><i class="fa fa-align-left"> Archive File</i></h4>

                                <div class="dd3-content collapse" id="{{'com'.$com->comid}}">
                                    <hr>
                                    <!--<iframe src="{{asset('plugins/fileman/index.html?integration=custom&type=files&txtFieldId=txtSelectedFile')}}" style="width:100%;height:500px" frameborder="0">
                                    </iframe>-->
                                    <br>
                                    <h3>Copy This To Explorer</h3><br>
                                    <h3><mark>\\172.16.43.202\d$\MSCNewPortal\public\uploads{{str_replace("/","\\",$post_path)}}\file</mark></h3>
                                    <br>

                                    <br>
                                    <a class="btn btn-danger removeComponent"  ng-click="delete"><i class="fa fa-trash-o"></i> Remove This Content</a>
                                </div>

                            </li>
                            @endif

                            @endforeach
                        </ol>
                    </div>
                </div>
                <hr>
                <div class="box-body">
                    <a href="{{asset('/post/' . Request::segment(4))}}" target="_blank"><button class="btn btn-default btn-lg btn-block"><i class="fa fa-tv"></i> Preview</button></a>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <h3>3 | Update Detail <small> Update or edit detail</small></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Basic Detail</h3>
                </div>
                <form action="{{asset('admin/post/update/'.Request::segment(4))}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="post_status">
                                        <option value="1" {{($post->post_status == 1)?'selected':''}}>Active</option>
                                        <option value="0" {{($post->post_status == 0)?'selected':''}}>Deactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control" name="post_type">
                                        <option value="post" {{($post->post_type == "post")?'selected':''}}>Post</option>
                                        <option value="news" {{($post->post_type == "news")?'selected':''}}>News Post</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Author Contact</label>
                                    <input value="{{$post->author_contact}}" type="text" class="form-control" placeholder="Phone Number" name="author_contact">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <p class="lead">
                                        <i class="fa {{empty($post->post_icon) ? 'fa-file-text' : $post->post_icon}} fa-3x picker-target"></i>
                                    </p>
                                    <label>Icon</label>
                                    <input name="post_icon" value="{{$post->post_icon}}" class="form-control icp icp-auto" type="text" />
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input value="{{$post->post_title}}" type="text" class="form-control" placeholder="Post Title" name="post_title">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Detail</label>
                                    <textarea type="text" class="form-control" id="post_detail" name="post_detail">
                                    {{$post->post_detail}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input value="{{$post->post_name}}" type="text" class="form-control" placeholder="Post Name" name="post_name">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Event Date</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="eventdate" name="post_event_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="post_cat[]">
                                        {{--*/ $cats = DB::table('category')->where('tid', '=', Session::get('trop_id'))->get()/*--}}
                                        @foreach($cats as $cat)
                                            <option @if(in_array($cat->catid, $post_cat)) selected @endif value="{{$cat->catid}}">{{$cat->cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Thumbnail</label>
                                    <br>
                                    <span class="btn btn-primary fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Select thumbnail file</span>
                                        <input id="fileupload" type="file" name="files">
                                    </span><br><br>
                                    <div id="progress" class="progress">
                                        <div class="progress-bar progress-bar-success"></div>
                                    </div>
                                    <input type="hidden" id="post_thumbnail" name="post_thumbnail" value="{{$post->post_thumbnail}}">
                                    <img id="img_post_thumbnail" src="{{asset($post->post_thumbnail)}}" width="83%">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-success btn-lg btn-block" type="submit"><i class="fa fa-save"></i> Save</button>
                                    <br>
                                    <a class="btn btn-default btn-lg btn-block" href="{{asset('/post/' . Request::segment(4))}}" target="_blank"><i class="fa fa-tv"></i> Preview</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </form>
                <script>
                CKEDITOR.replace('post_detail',{

                    wordcount: {
                        showCharCount: true,
                        showWordCount: false,
                        maxWordCount: 4000,
                        maxCharCount: 488,

                    },
                    toolbar: [[ 'Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo' ],]

                });

                </script>
            </div>
        </div>
    </div>
    <!-- /.row -->


    <!-- Step 1 -->
    <!--<h3>Step 1 | Select Your Template <small>Please Choose Your Template By Check Radio Button</small></h3>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Template 1 <input type="radio" name="r1" class="minimal" checked></h3>
                    </div>
                    <div class="box-body">
                        <img src="{{asset('pages/admin/content/images/template1.png')}}" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Template 2 <input type="radio" name="r1" class="minimal"></h3>
                    </div>
                    <div class="box-body">
                        <img src="{{asset('pages/admin/content/images/template1.png')}}" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Template 3 <input type="radio" name="r1" class="minimal"></h3>
                    </div>
                    <div class="box-body">
                        <img src="{{asset('pages/admin/content/images/template1.png')}}" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    <!-- Step 2 -->
    <!--<h3>Step 2 | Fill Post Data & Finish <small>If you don't have any data you can don't fill it.</small></h3>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">General</h3>
                    </div>
                    <div class="box-body ">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Post Title</label>
                                <input type="text" class="form-control input-lg" placeholder="Enter ..." ng-model="title">
                            </div>
                            <div class="form-group">
                                <label>Post Name</label>
                                <input type="text" class="form-control" placeholder="Enter ..." value="<%title%>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Post Description</label>
                                <input type="text" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Post Status</label>
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Post Type</label>
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Component</h3>
                    </div>
                    <div class="box-body ">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>
                                    <h4><b>Content</b></h4></label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <h4><b>Image</b></h4></label>
                                <br>
                                <div class="row">
                                    <!--<div class="col-md-2">
                                    <addimagebutton></addimagebutton>
                                </div>-->
    <!--<div class="col-md-12">
                                        <div id="chooseImageZone">
                                            <addimages></addimages>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                        </div>
                                        <table class="table table-bordered" id="image_list">
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Image Name</th>
                                                <th>Image</th>
                                                <th>Link</th>
                                                <th style="width: 40px">Delete Image</th>
                                            </tr>
                                            {{--@foreach($image_files as $image_file)
                                            <tr>
                                                <td>{{$image_file->id}}</td>
                                                <td>{{$image_file->file_file_name}}</td>
                                                <td><img src="{{asset($image_file->file_location)}}" class="img-responsive" width="200" height="200"></td>
                                                <td><a href="{{asset($image_file->file_location)}}">{{$image_file->file_file_name}}</a></td>
                                                <td>
                                                    <button class="btn btn-danger delete_file" value="{{$image_file->id}}"><i class="fa fa-fw fa-recycle"></i> DELETE</button>
                                                </td>
                                            </tr>
                                            @endforeach--}}
                                        </table>
                                    </div>
                                </div>
                                <!--/.row-->
    <!--</div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <h4><b>Video</b></h4></label>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <addvdobutton></addvdobutton>
                                    </div>
                                    <div class="col-md-10">
                                        <div id="chooseVideoZone">
                                        </div>
                                    </div>
                                </div>
                                <!--/.row-->
    <!--</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/. col-md-12-->
    <!--</div>
        <!-- /.row -->
    <!--<h3>Step 3 | Choose Category & Finish <small>Choose category what you want.</small></h3>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Choose Category</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputName" class="control-label">Category Name</label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Create New Post Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-md-->
    <!--</div>
        <!--/.row-->
    <!--</form>-->

    <cp-video-modal></cp-video-modal>
    <cp-image-modal></cp-image-modal>
    <cp-content-modal></cp-content-modal>
    <cp-gallery-modal></cp-gallery-modal>
    <cp-file-modal></cp-file-modal>

    <edit-content-modal></edit-content-modal>

</div>
<script>
$(function() {

    /*$('#addComponentModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('component')
        var modal = $(this)
        if (recipient == 'cp_video') {
            modal.find('.modal-title').text('Add Video Component')
            scope.$apply()
            modal.find('#addComponent').attr('data-type', recipient)
        }
    })*/

    /*$('#addComponent').click(function() {
        //Add Video Component
        if ($(this).attr('data-type') == 'cp_video') {
            //alert('Video');
        }
    });*/

    //Date Range
    $('#eventdate').daterangepicker({
        "startDate": "{{is_null($post->event_start_date) || empty($post->event_start_date) ? date("Y-m-d h:i:sa") : $post->event_start_date}}",
        "endDate": "{{is_null($post->event_end_date) || empty($post->event_end_date) ? date("Y-m-d h:i:sa") : $post->event_end_date}}",
        "timePicker": true,
        "timePicker24Hour": true,
        "locale": {
            "format": 'YYYY/MM/DD h:mm A',
            "applyLabel": "ยืนยัน",
            "cancelLabel": "ยกเลิก",
            "fromLabel": "จาก",
            "toLabel": "ถึง",
            "daysOfWeek": [
                "อา.",
                "จ.",
                "อ.",
                "พ.",
                "พฤ.",
                "ศ.",
                "ส."
            ],
            "monthNames": [
                "มกราคม",
                "กุมภาพันธ์",
                "มีนาคม",
                "เมษายน",
                "พฤษภาคม",
                "มิถุนายน",
                "กรกฎาคม",
                "สิงหาคม",
                "กันยายน",
                "ตุลาคม",
                "พฤศจิกายน",
                "ธันวาคม"
            ],
        },
    });

    //Icon Picker
    $('.icp-auto').iconpicker();
    $('.icp').on('iconpickerSelected', function(e) {
        $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
                e.iconpickerInstance.options.iconBaseClass + ' ' +
                e.iconpickerInstance.getValue(e.iconpickerValue);
    });

    var post_path = $('#post_path').val().split('/');
    var tropId = post_path[2];
    var objectId = post_path[4];
    var object = "post";
    var url = '{{Config::get('newportal.root_url')}}' + '/admin/upload/thumbnail/' + object + '/' + tropId + '/' + objectId;

    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('#post_thumbnail').val('/uploads/trop/' + tropId + '/' + object + '/' + objectId + '/thumbnail/' + file.name);
                $('#img_post_thumbnail').attr('src',file.url)
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

    $('.dd').nestable({ maxDepth : 1}).change(function(){
        var sort = $('.dd').nestable('serialize');
        var sort_array = [];
        $.each(sort,function(key, value){
            sort_array.push(Object.keys(value).map(function(k) { return value[k] }));
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{Config::get('newportal.root_url')}}' + '/admin/post/update/sort/{{Request::segment(4)}}',
            data: {
                sort: sort,
            },
            async: true,
            type: 'POST',
            success: function(data) {
                alert('save success');
                console.log(data);
            },

        });
    });

    $('.removeComponent').click(function(){
        var component_ = $(this).closest("li");

        //alert(component_.data('comid') + ' : ' + component_.data('id'));

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{Config::get('newportal.root_url')}}' + '/admin/component/delete',
            data: {
                type: component_.data('component'),
                filename: component_.data('filename'),
                path: $('#post_path').val(),
                comid: component_.data('comid'),
                id: component_.data('id'),
            },
            async: true,
            type: 'POST',
            success: function(data) {
                //alert(data);
            },

        });

        $(this).closest("li").hide(500, function() {
            $(this).remove();
        });
    });

});
</script>
@stop
