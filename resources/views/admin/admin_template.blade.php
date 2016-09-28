<?php $em_info = Session::get('em_info');?>
<?php
$user = App\Employee::where('EmpCode', '=', $em_info->EmpCode)->first();
$can_access = ['admin', 'owner', 'trop_admin', 'trop_assistant'];
?>
@if(!$user->hasRole($can_access))
<script type="text/javascript">
    window.location = "{{ url('/') }}";
</script>
@endif
@if($user->hasRole($can_access))
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Starter</title>
    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" href="{{asset('/favicon.ico')}}" type="image/x-icon" />

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?=asset('bootstrap/css/bootstrap.min.css')?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=asset('/plugins/font-awesome/css/font-awesome.min.css')?>">
    <!-- Ionicons
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
    @include('admin.plugin_style')
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=asset('/plugins/select2/select2.min.css')?>">
	<link rel="stylesheet" href="<?=asset('/plugins/datatables/dataTables.bootstrap.css')?>">
    <link rel="stylesheet" href="<?=asset('/plugins/fileupload/css/jquery.fileupload.css')?>">
    <!-- fontawesome-iconpicker -->
    <link rel="stylesheet" href="<?=asset('plugins/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css')?>"></link>

    <link rel="stylesheet" href="<?=asset('dist/css/AdminLTE.min.css')?>">
        <!-- admin
    AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
    <link rel="stylesheet" href="<?=asset('dist/css/skins/skin-blue.min.css')?>">


    <!-- jQuery 2.2.3 -->
    <script src="<?=asset('plugins/jQuery/jquery-2.2.3.min.js')?>"></script>

    <!-- Bootstrap 3.3.6 -->
    <script src="<?=asset('bootstrap/js/bootstrap.min.js')?>"></script>
    <!-- jQuery UI -->
    <script src="<?=asset('plugins/jQueryUI/jquery-ui.min.js')?>"></script>

	<script src="<?=asset('plugins/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?=asset('plugins/datatables/dataTables.bootstrap.min.js')?>"></script>

    <!-- CKEditor -->
    <script src="<?=asset('plugins/ckeditor/ckeditor.js')?>"></script>
    <!-- fontawesome-iconpicker -->
    <script src="<?=asset('plugins/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js')?>"></script>

    <!-- File Upload -->

    <script src="<?=asset('plugins/fileupload/js/vendor/jquery.ui.widget.js')?>"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    <script src="<?=asset('plugins/fileupload/js/jquery.iframe-transport.js')?>"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?=asset('plugins/fileupload/js/jquery.fileupload.js')?>"></script>
    <!-- The File Upload processing plugin -->
    <script src="<?=asset('plugins/fileupload/js/jquery.fileupload-process.js')?>"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="<?=asset('plugins/fileupload/js/jquery.fileupload-image.js')?>"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="<?=asset('plugins/fileupload/js/jquery.fileupload-audio.js')?>"></script>
    <!-- The File Upload video preview plugin -->
    <script src="<?=asset('plugins/fileupload/js/jquery.fileupload-video.js')?>"></script>
    <!-- The File Upload validation plugin -->
    <script src="<?=asset('plugins/fileupload/js/jquery.fileupload-validate.js')?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini" ng-app="portalApp" ng-controller="portalCtrl" >
    <div class="wrapper">
        @include('admin.header')
        @include('admin.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
        <!--<i class="fa fa-fw <% page_path.length <= 1 ? 'fa-medium' : page_icon %>"></i>
        <b><% page_path.length <= 1  ? 'Welcome To New Portal' : page_title %></b>
        <small><% $page_description %></small>-->
      </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Your Page Content Here -->
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('admin.footer')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane active" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript::;">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->
                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript::;">
                                <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->
                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED JS SCRIPTS -->

    <!-- AdminLTE App -->
    @include('admin.plugin')

    <script src="<?=asset('plugins/select2/select2.full.min.js')?>"></script>   <!-- Text select แอดมิน -->
    <script src="<?=asset('plugins/chained/jquery.chained.min.js')?>"></script>
    <!--Nested Sortable-->
    <script src="<?=asset('plugins/nestable/jquery.nestable.js')?>"></script>



    <!-- AngularJS -->
    <script src="<?=asset('plugins/angular/angular.js')?>"></script>
    <script src="<?=asset('plugins/angular-route/angular-route.min.js')?>"></script>
    <script src="<?=asset('plugins/angular-resource/angular-resource.min.js')?>"></script>
    <script src="<?=asset('plugins/angular-touch/angular-touch.min.js')?>"></script>
    <script src="<?=asset('plugins/angular-animate/angular-animate.min.js')?>"></script>
    <script src="<?=asset('plugins/angular-bootstrap/ui-bootstrap-tpls.min.js')?>"></script>

    <!-- AngularJS App -->
    <script src="<?=asset('dist/js/app.min.js')?>"></script>
    <script src="<?=asset('app/app.js')?>"></script>
    <script src="<?=asset('app/controller.js')?>"></script>

    <!--New Portal Custom Javascript-->
    <script src="<?=asset('js/metrop-admin.js')?>"></script>

    <!-- Dashboard -->
    <script src="<?=asset('app/controller/dashboard.controller.js')?>"></script>

    <!-- Content -->
    <script src="<?=asset('app/controller/post.controller.js')?>"></script>
    <script src="<?=asset('app/controller/component.controller.js')?>"></script>
    <script src="<?=asset('app/directive/post.directive.js')?>"></script>
    <script src="<?=asset('app/directive/component.directive.js')?>"></script>

    <!-- Menu -->
    <script src="<?=asset('app/controller/menu.controller.js')?>"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

</body>

</html>

@endif <!--End if of check admin-->