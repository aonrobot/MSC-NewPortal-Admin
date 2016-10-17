{{App\Library\Statistic_lib::FirstOfDay()}}
{{--*/ $em_info = Session::get('em_info')/*--}}
{{--*/ $user = App\Employee::where('EmpCode', '=', $em_info->EmpCode)->first() /*--}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('/favicon.ico')}}" type="image/x-icon" />
    <title>New Portal | Metro Systems Corporation Public Company Limited</title>


    <!-- Custom Fonts -->
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Component CSS -->
    <link rel="stylesheet" href="{{asset('plugins/unslider/unslider.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/unslider/unslider-dots.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}" />
    <link rel="stylesheet" href="{{asset('plugins/yearcalendar/bootstrap-year-calendar.min.css')}}" />
    <link rel="stylesheet" href="{{asset('plugins/lightbox/ekko-lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/orgchart/jquery.orgchart.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/imagehover/imagehover.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/filetree/jqueryFileTree.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/lightgallery/css/lightgallery.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/justifiedgallery/justifiedGallery.min.css')}}">

    <!--Back to top css-->
    <link rel="stylesheet" href="{{asset('plugins/back-to-top/css/style.css')}}">

    <!-- JReject CSS -->
    <link rel="stylesheet" href="{{asset('plugins/jreject/css/jquery.reject.css')}}">

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

    <link href="{{asset('plugins/jQueryUI/jquery-ui-1.10.0.custom.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- King 9 Gray Style -->
    <link href="{{asset('css/graystyle.css')}}" rel="stylesheet">

    <link href="{{asset('css/metrop.css')}}" rel="stylesheet">

    <link href="{{asset('css/metrop-component.css')}}" rel="stylesheet">

    <!-- IE 11 grayscale img-->
    <link href="{{asset('plugins/grayscale/css/grayscale.css')}}" rel="stylesheet">


    <!-- jQuery 2.2.3 -->
    <script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('plugins/jQueryUI/jquery-ui.min.js')}}"></script>

	<script src="{{asset('js/jquery.mobile.custom.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Modernizr -->
    <script src="{{asset('js/modernizr.js')}}"></script>

    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('plugins/orgchart/jquery.orgchart.js')}}"></script>

    <script src="{{asset('plugins/filetree/jqueryFileTree.js')}}"></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="portal-loader"><div><img src="{{asset('loader_gray.gif')}}"><h4>New Portal</h4></div></div>

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
    <script type="text/javascript" src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('plugins/masonry/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('plugins/classie/classie.js')}}"></script>
    <script src="{{asset('plugins/unslider/unslider.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/yearcalendar/bootstrap-year-calendar.min.js')}}"></script>
    <script src="{{asset('plugins/lightbox/ekko-lightbox.min.js')}}"></script>
    <script src="{{asset('plugins/back-to-top/js/main.js')}}"></script>

    <!-- Imagehover JS -->
    <script src="{{asset('plugins/imagehover/imagehover.js')}}"></script>

    <!-- MixITUp JS -->
    <script src="{{asset('plugins/mixitup/jquery.mixitup.min.js')}}"></script>

    <!-- Toastr JS -->
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

    <!-- JReject JS -->
    <script src="{{asset('plugins/jreject/js/jquery.reject.js')}}"></script>

    <!-- LightGallery JS -->
    <script src="{{asset('plugins/lightgallery/lib/picturefill.min.js')}}"></script>
    <script src="{{asset('plugins/lightgallery/js/lightgallery.min.js')}}"></script>
    <script src="{{asset('plugins/lightgallery/lib/jquery.mousewheel.min.js')}}"></script>
    <script src="{{asset('plugins/lightgallery/lib/lg-thumbnail.min.js')}}"></script>

    <!-- justifiedGallery -->
    <script src="{{asset('plugins/justifiedgallery/jquery.justifiedGallery.min.js')}}"></script>

    <!-- IE 11 grayscale img -->
    <script type='text/javascript' src='{{asset('plugins/grayscale/js/grayscale.js')}}'></script>
    <script type='text/javascript' src="{{asset('plugins/grayscale/js/functions.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('js/metrop.js')}}"></script>
    <script src="{{asset('js/metrop-component.js')}}"></script>

    <!-- Custom Component JS -->
    <!--<script src="{{asset('plugins/gallery/gallery.js')}}"></script>-->

    <script>


        jQuery(window).load(function () {

            $(".portal-loader").fadeOut("slow");

        });

        jQuery(document).ready(function($) {

            $.reject({
                reject: {
                    safari: false, // Apple Safari
                    chrome: false, // Google Chrome
                    firefox: true, // Mozilla Firefox
                    msie: false, // Microsoft Internet Explorer
                    opera: true, // Opera
                    konqueror: true, // Konqueror (Linux)
                    unknown: true // Everything else
                },
                closeCookie: true,
                display: ['chrome', 'safari'], // Displays only firefox, chrome, and opera
                header: 'ต้องขออภัยในความไม่สะดวกด้วยนะครับ Browser ที่คุณใช้ในขนาดนี้ไม่ Support Portal ตัวใหม่', // Header Text
                paragraph1: 'ถ้าเลือกใช้ Browser ตัวนี้บางอย่างอาจจะแสดงผลได้ไม่ถูกต้อง', // Paragraph 1
                paragraph2: 'ถ้าเป็นไปได้โปรดเลือกใช้ Browser ตามด้านล่างนี้เพื่อเปิดเท่านั้น ขอบคุณมากๆครับ ^^',
                closeMessage: 'NewPortal Connect Everyone', // Message below close window link

            }); // Customized Browsers

            return false;
        });


        //Statistic
        jQuery(document).ready(function($) {



            crono = new Date().getTime();

            $('.npt_stat').click(function(){
                $.ajax({
                  method: "GET",
                  url: '{{Config::get('newportal.root_url')}}' + '/statistic/linkclick',
                  data: {
                            name: $(this).data('name'),
                            where: $(this).data('where'),
                            current: '{{Request::fullUrl()}}',
                            destination: $(this).attr('href'),
                            duration: (new Date().getTime() - crono),
                    }
                })
            });
        });
    </script>

    <a href="#0" class="cd-top" data-goto="bottom">Top</a>

    <div id="posi_result" style="position: fixed;height:60px;width:400px;right:30px;bottom:50px;display: none;">0</div>

</body>

</html>
