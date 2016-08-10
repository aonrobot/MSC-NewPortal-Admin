<!DOCTYPE html>
<html lang="en">
<head>
<style>
body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 15%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #4CAF50;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style>
</head>
<body>

<ul>

 <li><a></a></li>
 <li><a></a></li>
  <li><a></a></li>
  <li><a></a></li>
   <li><a></a></li>
  <li><a   href="#home">Home</a></li>
  <li><a class="active" href="#about">Trop</a></li>
  <li><a href="/category">Category</a></li>
  <li><a href="#contact">Content</a></li>
  <li><a href="#about">Menu</a></li>
  <li><a href="#about">Slide</a></li>


</ul>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>New Portal | Metro Systems Corporation Public Company Limited</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/metrop.css" rel="stylesheet">
    <link href="/css/metrop-component.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/unslider.css">
    <link rel="stylesheet" href="/css/unslider-dots.css">

    <!-- Component CSS -->
    <link rel="stylesheet" href="/css/datepicker.css" />
    <link rel="stylesheet" href="/css/bootstrap-year-calendar.min.css" />
    <link rel="stylesheet" href="/css/ekko-lightbox.min.css">

    <!-- Modernizr -->
    <script src="/js/modernizr.js"></script>

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

    <!-- Navigation -->
    <header class="metrop-nav">
        <div class="cd-logo">
            <a href="#0"><img src="/logo.png" height="52px" alt="Logo"></a>
        </div>

        <nav class="cd-main-nav-wrapper">
            <ul class="cd-main-nav">
                <li><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                <li><a href="about.html"><i class="fa fa-globe" aria-hidden="true"></i> About MSC</a></li>
                <li><a href="phone_book.html"><i class="fa fa-phone" aria-hidden="true"></i> Phone Book</a></li>
                <li><a href="app.html"><i class="fa fa-desktop" aria-hidden="true"></i> MSC App</a></li>
                <li><a href="content_policy.html"><i class="fa fa-university" aria-hidden="true"></i> Policy</a></li>
                <li><a href="#0" aria-hidden="true" data-toggle="collapse" data-target="#collapseApp" aria-expanded="false" aria-controls="collapseApp"><i class="fa fa-star" aria-hidden="true" style="color:#e4ce22"></i> Favorite App</a></li>
                <li>
                    <a href="#0" class="cd-subnav-trigger"><span> More</span></a>
                    <ul>
                        <li class="go-back"><a href="#0">Menu</a></li>
                        <li><a href="#0"><i class="fa fa-circle-thin" aria-hidden="true"></i> HR Channel</a></li>
                        <li><a href="#0"><i class="fa fa-circle-thin" aria-hidden="true"></i> CSR</a></li>
                        <li><a href="#0"><i class="fa fa-circle-thin" aria-hidden="true"></i> IT</a></li>
                        <li><a href="#0"><i class="fa fa-circle-thin" aria-hidden="true"></i> Building</a></li>
                        <li><a href="#0"><i class="fa fa-circle-thin" aria-hidden="true"></i> Business Procress</a></li>
                        <li><a href="#0"><i class="fa fa-circle-thin" aria-hidden="true"></i> CSB</a></li>
                        <li><a href="#0"><i class="fa fa-circle-thin" aria-hidden="true"></i> Procure Ment</a></li>
                        <li><a href="#0" class="placeholder">Placeholder</a></li>
                    </ul>
                </li>
            </ul>
            <!-- .cd-main-nav -->

            <!--App Menu-->
            <div class="collapse nav-app-content" id="collapseApp">
                <h1 class="nav-app-head"><i class="fa fa-cubes"></i> Most Use Application</h1>
                <div class="row">
                    <h3 class="nav-app-subhead">Sale & Services |</h3>
                    <div class="nav-app-item">
                        <i class="fa fa-medium fa-2x"></i>
                        <h4>Initiate New Customer</h4>
                    </div>
                    <div class="nav-app-item">
                        <i class="fa fa-medium fa-2x"></i>
                        <h4>Adjust Customer Info.</h4>
                    </div>
                    <div class="nav-app-item">
                        <i class="fa fa-medium fa-2x"></i>
                        <h4>Revise Customer Credit</h4>
                    </div>
                    <div class="nav-app-item">
                        <i class="fa fa-medium fa-2x"></i>
                        <h4>Inactive Customer List</h4>
                    </div>
                </div>

                <div class="row">
                    <h3 class="nav-app-subhead">Employee Services |</h3>
                    <div class="nav-app-item">
                        <i class="fa fa-medium fa-2x"></i>
                        <h4>Initiate New Customer</h4>
                    </div>
                    <div class="nav-app-item">
                        <i class="fa fa-medium fa-2x"></i>
                        <h4>Adjust Customer Info.</h4>
                    </div>
                    <div class="nav-app-item">
                        <i class="fa fa-medium fa-2x"></i>
                        <h4>Revise Customer Credit</h4>
                    </div>
                    <div class="nav-app-item">
                        <i class="fa fa-medium fa-2x"></i>
                        <h4>Inactive Customer List</h4>
                    </div>
                </div>

            </div>
        </nav>
        <!-- .cd-main-nav-wrapper -->

        <a href="#0" class="cd-nav-trigger">Menu<span></span></a>
    </header>
    <!-- /.container -->


    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header">
        <div class="header-slider">
            <ul>
                <li></li>
            </ul>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-15">
                <h1><i class="fa fa-newspaper-o" aria-hidden="true"> {{$menuname}}</i></h1>
                <hr>
				<br>
				<br>
				<br>
				<br>
                <br>
<div class="styled-select black rounded"><center>Trop
  <select>
  
    <option>Here is the first option</option>
    <option>The second option</option>
    <option>The third option</option>
  </select>
  </center>
</div>

		
				<br>
				<br>
				<br>
				<br>
				<div> <center><INPUT class="button4" TYPE="submit" VALUE="summit"></center></div>
                <br>
</div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.row content -->
    <hr>

    <!-- Footer -->
    <footer>

                    <p class="copyright text-muted">Copyright &copy; New Portal | Metro Systems Corporation Public Company Limited 2016</p>


    </footer>

    <!-- Component JS -->
    <script type="text/javascript" src="/js/moment.min.js"></script>
    <script src="/js/unslider.js"></script>
    <script type="text/javascript" src="/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap-year-calendar.min.js"></script>
    <script src="/js/ekko-lightbox.min.js"></script>

    <!-- Custom Component JS -->
    <script src="/js/imagesloaded.pkgd.min.js"></script>
    <script src="/js/masonry.pkgd.min.js"></script>
    <script src="/js/classie.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/js/metrop.js"></script>
    <script src="/js/metrop-component.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $('.header-slider').unslider({
                arrows: false,
                speed: 1000,
                delay: 3500,
            });
        });
    </script>

</body>

</html>
