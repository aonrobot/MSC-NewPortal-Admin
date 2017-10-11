@extends('admin.admin_template')
@section('content')

{{--*/ $post_policy_id = App\Post::where('post_type','policy')->first()->pid/*--}}

<style>
    .wizard{
        list-style-type: none;
        padding-left: 0px;
    }
    .create-type-btn_selected{
        color: #518fc1;
    }
    .create-type-btn_selected:hover{
        color: #337ab7;
    }

    .finish > a{
        float: right;
        font-size: 2em;
        width: 12.4em;
        color: #00a65a;
        font-weight: bold;
    }
    
</style>


<!-------------------------- CSS Zone ------------------------------------>

<!-- Wizard -->

<link rel="stylesheet" href="{{asset('plugins/wizard/prettify.css')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.css" />

<!-------------------------- End CSS Zone ------------------------------------>



<div class="loader"><div><img src="{{asset('loader.gif')}}"><h4>Creating....</h4></div></div>


<h2><i class="fa fa-files-o" aria-hidden="true"></i> Flylital <small>The Good file manager for Portal.</small></h2>

<div class="row">
    <div class="col-md-12">
        <h3><a class="btn btn-primary btn-lg btn-block" href="{{asset('/post/' . Request::get('pid'))}}" target="_blank"><i class="fa fa-tv"></i> Preview your post</a></h3>
    </div>
    <div class="col-md-4">
        <div class="box-header with-border">
            <h1 class="box-title"><i class="fa fa-plus fa-2x"></i> Add File</h1>
        </div>
        <div class="box box-success">
            <div class="box-body">
            <br>

            <form data-toggle="validator" role="form" action="file/create" method="POST" enctype="multipart/form-data" id="create-form">
                {{ csrf_field() }}
                <div id="rootwizard">
                    <div class="navbar">
                      <div class="navbar-inner">
                        <div class="col-md-12">
                            <ul>
                                <li><a id="step1_btn" href="#step1" data-toggle="tab"><i class="fa fa-cube"></i> Select Type</a></li>
                                <li><a id="step2_btn" href="#step2" data-toggle="tab"><i class="fa fa-cog"></i> Detail</a></li>
                                <li><a id="step3_btn" href="#step3" data-toggle="tab"><i class="fa fa-check-circle"></i> Finish</a></li>
                            </ul>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                        <div id="bar" class="progress">
                          <div class="progress-bar progress-bar-primary progress-bar-striped sm" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="tab-content">

                            <!-- Step 1 -->
                            <div class="tab-pane" id="step1">

                                <h3><i class="fa fa-cube"></i> Select what do you want to do?</h3>
                                <hr>
                                <ul class="wizard list-inline">
                                    <li class="next"><a class="btn btn-app create-type-btn" value="folder"><i class="fa fa-folder fa-4x"></i> Folder</a></li>
                                    <li class="next"><a class="btn btn-app create-type-btn" value="file"><i class="fa fa-file"></i> File</a></li>
                                    <li class="next"><a class="btn btn-app create-type-btn" value="link"><i class="fa fa-link"></i> Link</a></li>
                                    @if(Request::get('pid') != App\Library\Services::setting_getPostPolicyId()) <!-- Hide this menu when manage policy file-->
                                    <li class="next"><a class="btn btn-app create-type-btn" value="policy"><i class="fa fa-university"></i> Policy File</a></li>
                                    @endif
                                    <li class="next"><a class="btn btn-app create-type-btn" value="file_setting"><i class="fa fa-gear"></i> File Setting</a></li>
                                </ul>
                                <input type="hidden" name="type" id="create-type" value="folder">
                                <hr>

                            </div>

                            <!-- Step 2 -->
                            <div class="tab-pane" id="step2">

                                <h3 id="title-detail"> </h3>
                                <hr>
                                <div id="detail-display_name">
                                    <h4>Display Name</h4>
                                    <div class="input-group-lg">
                                        <input type="text" name="display_name" class="form-control" placeholder="Display Name" required>
                                    </div>
                                </div>
                                
                                <div id="detail-link">
                                    <h4>Link</h4>
                                    <div class="input-group-lg">
                                        <input type="text" name="link" class="form-control" placeholder="Link" required>
                                    </div>
                                </div>

                                <div id="detail-upload_file">
                                    <h4>Upload File</h4>
                                    <div class="input-group-lg">
                                        <input type="file" name="fileupload" id="fileupload" class="form-control" placeholder="File Name" required>
                                    </div>
                                </div>

                                <div id="detail-policy-link">
                                    <h4>Policy File</h4>
                                    <br><div id="flylital_tree_policy"></div><br>
                                    <div class="input-group-lg">
                                        <input id="policy_link_text" type="hidden" name="file_id" class="form-control" required>
                                    </div>
                                </div>

                                <div id="detail-file_setting">
                                    <h4>File Setting</h4>
                                    <br><div id="flylital_tree_file_setting"></div><br>
                                    <div class="input-group-lg">
                                        <input id="file_setting_download_text" type="text" name="file_id_setting" class="form-control" required>
                                    </div>
                                </div>

                                <hr>

                            </div>
                            <div class="tab-pane" id="step3">
                            </div>
                            <ul class="pager wizard">
                                <li class="previous"><a href="#">Previous</a></li>
                                <li class="next"><a href="#">Next</a></li>
                                <li class="finish"><a href="javascript:;">Create</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
                <!--/.rootwizard-->

                <input type="hidden" name="pid" value="{{Request::get('pid')}}">
            </form>
            
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-8">
        <div class="box-header with-border">
            <h1 class="box-title"><i class="fa fa-magic fa-2x"></i> Manage File</h1>
        </div>
        <div class="box box-primary">
            <div class="box-body">

                <p><h3>File Post {{ Request::get('pid') }}</h3></p>
                <hr>
                <div id="flylital_tree">

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

</div>

<!-- wizard -->
<script src="{{asset('plugins/wizard/jquery.bootstrap.wizard.min.js')}}"></script>
<script src="{{asset('plugins/wizard/prettify.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>

<script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.js"></script>

<script>
$(function() {

    $('a[value="folder"]').addClass('create-type-btn_selected');

    $('#rootwizard').bootstrapWizard({

            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard .progress-bar').css({width:$percent+'%'});

                if($percent < 3/3 * 100){
                    $('#rootwizard .progress-bar').removeClass('progress-bar-success');
                    $('#rootwizard .progress-bar').addClass('progress-bar-primary');
                }else{
                    $('#rootwizard .progress-bar').removeClass('progress-bar-primary');
                    $('#rootwizard .progress-bar').addClass('progress-bar-success');
                }

                //$('#rootwizard').bootstrapWizard('disable',2);
            },
            onNext: function(tab, navigation, index){

                //Detail Step
                if(index == 1){
                    detail_step();
                }

            },
            onTabClick: function(tab, navigation, index){
                return false;
            }
    });

    $('#rootwizard .finish a').click(function() {
   
        $('#create-form').submit();
    });

    $('.create-type-btn').click(function(){

        var value_ = $(this).attr('value');

        $('#create-type').val(value_);

        $('.create-type-btn').removeClass('create-type-btn_selected');

        $('a[value="'+ value_ +'"]').addClass('create-type-btn_selected');
    });


    function detail_step(){

        var type_ = $('#create-type').val();

        $('#title-detail').text("");
        $('#title-detail').append('<i class="fa fa-cog"></i> ' + type_ + ' detail');

        show_all_detail_input();

        switch(type_){

            case 'folder' :
                //Hide
                $('#detail-link').hide();
                $('#detail-upload_file').hide();
                $('#detail-policy-link').hide();
                $('#detail-file_setting').hide(); // Hide File Setting

                //Remove required
                $('#detail-link div input').removeAttr('required');
                $('#detail-upload_file div input').removeAttr('required');
                $('#detail-policy-link div input').removeAttr('required'); //Policy
                $('#detail-file_setting div input').removeAttr('required'); //File Setting
                break;

            case 'file' :
                //Hide
                $('#detail-link').hide();
                $('#detail-policy-link').hide();
                $('#detail-file_setting').hide(); // Hide File Setting

                //Remove required
                $('#detail-link div input').removeAttr('required');
                $('#detail-policy-link div input').removeAttr('required'); //Policy
                $('#detail-file_setting div input').removeAttr('required'); //File Setting
                break;

            case 'link' :
                //Hide
                $('#detail-upload_file').hide();
                $('#detail-policy-link').hide();
                $('#detail-file_setting').hide(); // Hide File Setting

                //Remove required
                $('#detail-upload_file div input').removeAttr('required');
                $('#detail-policy-link div input').removeAttr('required'); //Policy
                $('#detail-file_setting div input').removeAttr('required'); //File Setting
                break;

            case 'policy' :
                //Hide
                $('#detail-link').hide();
                $('#detail-upload_file').hide();
                $('#detail-file_setting').hide(); // Hide File Setting

                //Remove required
                $('#detail-link div input').removeAttr('required');
                $('#detail-upload_file div input').removeAttr('required');
                $('#detail-file_setting div input').removeAttr('required'); //File Setting
                break;

            case 'file_setting' :
                //Hide
                $('#detail-link').hide();
                $('#detail-upload_file').hide();
                $('#detail-policy-link').hide();
                
                //Remove Attr
                $('#detail-link div input').removeAttr('required');
                $('#detail-upload_file div input').removeAttr('required');
                break;
        }
    }

    function show_all_detail_input(){
        $('#detail-display_name').show();
        $('#detail-link').show();
        $('#detail-upload_file').show();
        $('#detail-policy-link').show();
    }


    $('#flylital_tree').jstree({
        'core' : {
                  'data' : {
                    'url' : 'file/show?pid={{Request::get('pid')}}',
                    'data' : function (node) {
                      return { 'id' : node.id };
                    }
                  },
                  "check_callback" : function(o, n, p, i, m){
                    return true;
                  }
                },
                'contextmenu' : {
                    "items": function($node) {
                        var tree = $("#flylital_tree");
                        return {
                            "Rename": {
                                "separator_before": false,
                                "separator_after": false,
                                "label": "Rename",
                                "action": function (obj) {
                                    tree.jstree('edit', $node);
                                }
                            },
                            "Remove": {
                                "separator_before": false,
                                "separator_after": false,
                                "label": "Remove",
                                "action": function (obj) {
                                    tree.jstree('delete_node', $node);
                                }
                            }
                        };
                    }
                },
                'types' : {
                    'file' : { 'valid_children' : [], 'icon' : 'file' },
                    'link' : { 'valid_children' : [], 'icon' : 'link' }
                },
                'unique' : {
                    'duplicate' : function (name, counter) {
                        return name + ' ' + counter;
                    }
                },
                "plugins" : [ 'state','dnd','types','contextmenu','unique' ]
            })

            .on("activate_node.jstree", function(e, data){
                console.log(data);
                //if(data.node.type == 'file' || data.node.type == 'link')
                    //window.open(data.node.a_attr.href, '_blank');
            })

            .on('move_node.jstree', function (e, data) {
                console.log(data.node.id + ' | ' + data.parent);
                $.get('file/update?operation=move_node', { 'id' : data.node.id, 'parent' : data.parent, 'pid' : {{Request::get('pid')}} })
                    .done(function (d) {
                        console.log(d['status']);
                        data.instance.refresh();
                    })
                    .fail(function () {
                        data.instance.refresh();
                });
            })

            .on('delete_node.jstree', function (e, data) {

                var data = data;

                swal({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then(function() {

                    $.get('file/update?operation=delete_node', { 'id' : data.node.id })
                    .fail(function () {
                        data.instance.refresh();
                    });
                    swal(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )

                }, function(dismiss) {
                  // dismiss can be 'cancel', 'overlay',
                  // 'close', and 'timer'
                  if (dismiss === 'cancel') {
                    data.instance.refresh();
                    swal(
                      'Cancelled',
                      'Your imaginary file is safe :)',
                      'error'
                    )
                  }
                })

            })

            .on('rename_node.jstree', function (e, data) {
                $.get('file/update?operation=rename_node', { 'id' : data.node.id, 'text' : data.text })
                    .done(function (d) {
                        //data.instance.set_id(data.node, d.id);
                        data.instance.refresh();
                    })
                    .fail(function () {
                        data.instance.refresh();
                    });
            });

    //Select policy file
    $('#flylital_tree_policy').jstree({
        'core' : {
                  'data' : {
                    'url' : 'file/show?pid={{$post_policy_id}}',
                    'data' : function (node) {
                      return { 'id' : node.id };
                    }
                  },
                  "check_callback" : function(o, n, p, i, m){
                    return true;
                  }
                },

                'types' : {
                    'file' : { 'valid_children' : [], 'icon' : 'file' },
                    'link' : { 'valid_children' : [], 'icon' : 'link' }
                },
                "plugins" : [ 'state' ]
            })

            .on("activate_node.jstree", function(e, data){
                var location = data.node.id;
                if(location.substring(-1) === "/"){
                    location = location.substring(1,-2);
                }
                location = location.split('/');
                location = location.pop();
                file_id = location.split('~')[0];
                $('#policy_link_text').val(file_id);
                if(file_id === "file"){
                    swal({

                        title: "แย่จัง..ไม่พบไฟล์ที่เลือก",
                        text: "กรุณาเลือกไฟล์ใหม่ครับ",
                        showConfirmButton: true,
                        type: "error",
                        confirmButtonText: "ปิด"

                    });
                    $('#policy_link_text').val("");
                }
                console.log(file_id);
                //if(data.node.type == 'file' || data.node.type == 'link')
                    //window.open(data.node.a_attr.href, '_blank');
            })

    //Select file setting
    $('#flylital_tree_file_setting').jstree({
        'core' : {
                  'data' : {
                    'url' : 'file/show?pid={{Request::get('pid')}}',
                    'data' : function (node) {
                      return { 'id' : node.id };
                    }
                  },
                  "check_callback" : function(o, n, p, i, m){
                    return true;
                  }
                },

                'types' : {
                    'file' : { 'valid_children' : [], 'icon' : 'file' },
                    'link' : { 'valid_children' : [], 'icon' : 'link' }
                },
                "plugins" : [ 'state' ]
            })

            .on("activate_node.jstree", function(e, data){
                var location = data.node.id;
                if(location.substring(-1) === "/"){
                    location = location.substring(1,-2);
                }
                location = location.split('/');
                location = location.pop();
                file_id = location.split('~')[0];
                $('#file_setting_download_text').val(file_id);
                if(file_id === "file"){
                    swal({

                        title: "แย่จัง..ไม่พบไฟล์ที่เลือก",
                        text: "กรุณาเลือกไฟล์ใหม่ครับ",
                        showConfirmButton: true,
                        type: "error",
                        confirmButtonText: "ปิด"

                    });
                    $('#file_setting_download_text').val("");
                }
                console.log(file_id);
                //if(data.node.type == 'file' || data.node.type == 'link')
                    //window.open(data.node.a_attr.href, '_blank');
            })

    $('#create-form').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) {
        swal({

            title: "แย่จัง..ไม่สามารถสร้างโพสได้",
            text: "กรุณาใส่ข้อมูลให้ครบก่อนนะครับ",
            showConfirmButton: true,
            type: "error",
            confirmButtonText: "ปิด"

        });

        $('#rootwizard').find("li[class*='previous']").trigger('click');

      } else {

        $(".loader").fadeIn("slow");


      }
    });


});
</script>
@stop
