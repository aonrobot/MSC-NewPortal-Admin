<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>New Portal | Metro Systems Corporation Public Company Limited</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=asset('css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=asset('css/metrop.css')?>" rel="stylesheet">
    <link href="<?=asset('css/metrop-component.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Component CSS -->
    <link rel="stylesheet" href="<?=asset('plugins/unslider/unslider.css')?>">
    <link rel="stylesheet" href="<?=asset('plugins/unslider/unslider-dots.css')?>">
    <link rel="stylesheet" href="<?=asset('plugins/datepicker/datepicker3.css')?>" />
    <link rel="stylesheet" href="<?=asset('plugins/yearcalendar/bootstrap-year-calendar.min.css')?>" />
    <link rel="stylesheet" href="<?=asset('plugins/lightbox/ekko-lightbox.min.css')?>">
    <link rel="stylesheet" href="<?=asset('plugins/orgchart/jquery.orgchart.css')?>">
    <link rel="stylesheet" href="<?=asset('plugins/imagehover/imagehover.css')?>">
    <link rel="stylesheet" href="<?=asset('plugins/datatables/jquery.dataTables.min.css')?>">
    <link rel="stylesheet" href="<?=asset('plugins/toastr/toastr.min.css')?>">
    <link rel="stylesheet" href="<?=asset('plugins/filetree/jqueryFileTree.css')?>">

    <!-- jQuery 2.2.3 -->
    <script src="<?=asset('plugins/jQuery/jquery-2.2.3.min.js')?>"></script>

	<script src="<?=asset('js/jquery.mobile.custom.min.js')?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=asset('js/bootstrap.min.js')?>"></script>
    <!-- Modernizr -->
    <script src="<?=asset('js/modernizr.js')?>"></script>

    <script src="<?=asset('plugins/datatables/jquery.dataTables.min.js')?>"></script>

    <script src="<?=asset('plugins/orgchart/jquery.orgchart.js')?>"></script>

    <script src="<?=asset('plugins/filetree/jqueryFileTree.js')?>"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="portal-loader"><div><img src="{{asset('loader.gif')}}"><h4>New Portal</h4></div></div>

    @include('header')

    @yield('head_image')
    <!-- Main Content -->
    <div class="cd-main-content container">

    @yield('content')

    </div>
    <!-- /.row content -->

    <hr>
    @include('footer')



    <!-- Component JS -->
    <script type="text/javascript" src="<?=asset('plugins/moment/moment.min.js')?>"></script>
    <script src="<?=asset('plugins/imagesloaded/imagesloaded.pkgd.min.js')?>"></script>
    <script src="<?=asset('plugins/masonry/masonry.pkgd.min.js')?>"></script>
    <script src="<?=asset('plugins/classie/classie.js')?>"></script>

    <script src="<?=asset('plugins/unslider/unslider.js')?>"></script>

    <script type="text/javascript" src="<?=asset('plugins/datepicker/bootstrap-datepicker.js')?>"></script>
    <script type="text/javascript" src="<?=asset('plugins/yearcalendar/bootstrap-year-calendar.min.js')?>"></script>
    <script src="<?=asset('plugins/lightbox/ekko-lightbox.min.js')?>"></script>

    <!-- Imagehover JS -->
    <script src="<?=asset('plugins/imagehover/imagehover.js')?>"></script>

    <!-- MixITUp JS -->
    <script src="<?=asset('plugins/mixitup/jquery.mixitup.min.js')?>"></script>

    <!-- Toastr JS -->
    <script src="<?=asset('plugins/toastr/toastr.min.js')?>"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?=asset('js/metrop.js')?>"></script>
    <script src="<?=asset('js/metrop-component.js')?>"></script>

    <!-- Custom Component JS -->
    <script src="<?=asset('plugins/gallery/gallery.js')?>"></script>

    <script>
        jQuery(window).load(function () {
            $(".portal-loader").fadeOut("slow");
        });
    </script>

</body>

</html>
