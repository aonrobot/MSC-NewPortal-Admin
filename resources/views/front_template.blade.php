@if(Session::get('user')->status != 'outsource')
    {{App\Library\Statistic_lib::FirstOfDay()}}
    {{--*/ $em_info = Session::get('em_info')/*--}}
    {{--*/ $user = App\Employee::where('EmpCode', '=', $em_info->EmpCode)->first() /*--}}
@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('/favicon.ico')}}" type="image/x-icon" />
    <title>MSC Portal | Metro Systems Corporation Public Company Limited</title>

    
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Prompt:400,700" rel="stylesheet">
    <!-- Font Awesome -->

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('plugins/ionic/ionic.min.css')}}">

    <!-- Component CSS -->
    <link rel="stylesheet" href="{{asset('plugins/unslider/unslider.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/unslider/unslider-dots.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/yearcalendar/bootstrap-year-calendar.min.css')}}" />
    <link rel="stylesheet" href="{{asset('plugins/lightbox/ekko-lightbox.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('plugins/orgchart/jquery.orgchart.css')}}"> -->
    <link rel="stylesheet" href="{{asset('plugins/imagehover/imagehover.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables/jquery.dataTables.min.css')}}">
    {{--  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables/responsive.bootstrap.min.css')}}">  --}}

    <link rel="stylesheet" href="{{asset('plugins/filetree/jqueryFileTree.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/lightgallery/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/justifiedgallery/justifiedGallery.min.css')}}">
    <!-- Alert -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert/sweetalert.min.css')}}">

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
    <link href="{{asset('css/metrop.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/metrop-component.min.css')}}" rel="stylesheet">
    <!-- Bright Custon CSS -->
    <link href="{{asset('css/custom-style.css')}}" rel="stylesheet">



    <!-- King 9 Gray Style-->
    <!-- Template Color 
    <link href="{{asset('css/template_color/gray/grayscale.css')}}" rel="stylesheet">
    <link href="{{asset('css/template_color/gray/graystyle.css')}}" rel="stylesheet">-->

<!-- christmas Style-->
    <!-- Template Color -->
    <!-- <link href="{{asset('css/template_color/christmas.css')}}" rel="stylesheet"> -->
    
    <!-- Javascript Library -->

    <!-- jQuery 2.2.3 -->
    <script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <script src="{{asset('plugins/jQueryUI/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.mobile.custom.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Modernizr -->
    <script src="{{asset('js/modernizr.min.js')}}"></script> 

    @if(Request::path() != '/')

    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    {{--  <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/responsive.bootstrap.min.js')}}"></script>  --}}
    <script src="{{asset('plugins/filetree/jqueryFileTree.min.js')}}"></script>
    @endif

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="{{asset('plugins/html5shiv/dist/html5shiv.min.js')}}"></script>
        <script src="{{asset('plugins/respond/dest/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>

    <div class="portal-loader">
        <div>
            <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
        </div>
    </div>

    @include('header')

    @yield('head_image')
    <!-- Main Content -->
    <div class="cd-main-content container">

        @yield('content')

    </div>
    <!-- /.row content -->

    <hr>
    @include('footer')

    @if (Request::path() != '/')
        <script src="{{asset('plugins/lightbox/ekko-lightbox.min.js')}}"></script>
        <!-- MixITUp JS -->
        <script src="{{asset('plugins/mixitup/jquery.mixitup.min.js')}}"></script>
    @endif

    @if (strpos(Request::path(), "post") === 0)
        <script src="{{asset('plugins/justifiedgallery/jquery.justifiedGallery.min.js')}}"></script>
        <!-- LightGallery JS -->
        <script src="{{asset('plugins/lightgallery/lib/picturefill.min.js')}}"></script>
        <script src="{{asset('plugins/lightgallery/js/lightgallery.min.js')}}"></script>
        <script src="{{asset('plugins/lightgallery/lib/jquery.mousewheel.min.js')}}"></script>
        <script src="{{asset('plugins/lightgallery/lib/lg-thumbnail.min.js')}}"></script>
    @endif

    <!-- Component JS -->
    <script type="text/javascript" src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('plugins/masonry/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('plugins/classie/classie.min.js')}}"></script>
    <script src="{{asset('plugins/unslider/unslider-min.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('plugins/yearcalendar/bootstrap-year-calendar.min.js')}}"></script>
    
    <script src="{{asset('plugins/back-to-top/js/main.min.js')}}"></script>

    <!-- Imagehover JS -->
    <script src="{{asset('plugins/imagehover/imagehover.js')}}"></script>

    <!-- JReject JS -->
    <script src="{{asset('plugins/jreject/js/jquery.reject.min.js')}}"></script>

    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

    <!-- Alert -->
    <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>

    @stack('page_vendor')

    <!--King 9 Gray Style-->
    <!-- if !IE 11 grayscale img -->
    <!--[if !IE 9]>
    <script type='text/javascript' src="{{asset('plugins/grayscale/js/grayscale.js')}}"></script>
    <script type='text/javascript' src="{{asset('plugins/grayscale/js/functions.js')}}"></script>
    <![endif]-->


    <!-- Custom Theme JavaScript -->
    <script src="{{asset('js/metrop.min.js')}}"></script>
    <script src="{{asset('js/metrop-component.min.js')}}"></script>

    <!-- Custom By Season -->
    <!-- Snow -->
     <!-- <script src="{{asset('plugins/snow/jquery.snow.min.1.0.js')}}"></script>
    <script>$.fn.snow({ minSize: 5, maxSize: 40, newOn: 600, flakeColor: '#b5d8f2' });</script> -->

    <script>


        jQuery(window).load(function () {

            $(".portal-loader").fadeOut("slow"); 

        }); 
        /*jQuery(document).ready(function($) {

            $.reject({
                reject: {
                    safari: false, // Apple Safari
                    chrome: false, // Google Chrome
                    firefox: false, // Mozilla Firefox
                    msie: true, // Microsoft Internet Explorer
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
        });*/ 

        @if(Session::get('user')->status != 'outsource')

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

        @endif

    </script>

    <a href="#0" class="cd-top" data-goto="bottom">Top</a>

    <!--<div id="posi_result" style="position: fixed;height:60px;width:400px;right:30px;bottom:50px;display: none;">0</div>-->

</body>

</html>
