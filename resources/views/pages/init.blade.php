<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>MSC Portal | Metro Systems Corporation Public Company Limited</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('css/metrop.css')}}" rel="stylesheet">
        <link href="{{asset('css/metrop-component.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
         <!-- Custom Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Prompt:300,400,700" rel="stylesheet">
        <!-- <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'> -->

        <!-- jQuery -->
        <script src="{{asset('js/jquery.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
       


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> <![endif]-->

    </head>

    <body>
        <!-- Navigation -->
        <header class="metrop-nav">
            <div class="cd-logo">
                <a href="{{asset('/')}}"><img src="{{asset('logo.png')}}" height="52px" alt="Logo"></a>
            </div>
            <nav class="cd-main-nav-wrapper">
                <ul class="cd-main-nav">

                </ul>
                <!-- .cd-main-nav -->
            </nav>
            <!-- .cd-main-nav-wrapper -->
        </header>
        <!-- /.container -->

        <!-- Main Content -->
        <div class="container" style="margin-top:15%;margin-bottom:15%;">
			<div class="row">
				<div class="col-md-12 text-center">
                    <h2><small>ขออภัยในความไม่สะดวกครับ, คุณ{{Session::get('em_info')->FirstName}} {{Session::get('em_info')->LastName}}</small><h2>
                    <div style="border:1px solid">
                        <h1><i class="fa fa-heart" style="color:#E26A6A"></i> Please Set Up New Portal First<br><small>{{$error}}</small></h1>
                    </div>
                    <hr>
                    <h2><small>Please contact your administrator or call 78451(aon@mis), 75119(pop@mis)</small> <h2>
				</div>
                <div class="col-md-12 text-center">
                    <br><br>
                    <a href="{{asset('/')}}"><button class="btn btn-default">< กลับไปยังหน้าหหลัก</button></a>
                </div>
			</div>
        </div>
        <!-- /.row content -->
        <hr>

    </body>

</html>


