@inject('menu', 'App\Http\Controllers\FrontMenuController')
{{-- */$menus = $menu->index()/* --}}

<!-- Navigation -->
<header class="metrop-nav">
    <div class="cd-logo">
        <a href="#0"><img src="<?=asset('logo.png')?>" height="52px" alt="Logo"></a>
    </div>
    <!-- Search btn -->
    <div class="cd-search-btn">
        <a href="#" id="search-btn">
            <i class="fa fa-search" id="search-icon"></i>
        </a>
    </div>
    <nav class="cd-main-nav-wrapper">
        <ul class="cd-main-nav">
            <li><a href="{{asset('/')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a href="about.html"><i class="fa fa-globe" aria-hidden="true"></i> About MSC</a></li>
            <li><a href="phone_book.html"><i class="fa fa-phone" aria-hidden="true"></i> Phone Book</a></li>
            <li><a href="app.html"><i class="fa fa-desktop" aria-hidden="true"></i> MSC App</a></li>
            <li><a href="content_policy.html"><i class="fa fa-university" aria-hidden="true"></i> Policy</a></li>
            <li><a href="#0" id="collapse-toggle" aria-hidden="true" data-toggle="collapse" data-target="#collapseApp" aria-expanded="false" aria-controls="collapseApp"><i class="fa fa-star" aria-hidden="true" style="color:#e4ce22"></i> Favorite App</a></li>
            <li>
                <a href="#0" class="cd-subnav-trigger"><span> More</span></a>
                <ul>
                    <li class="go-back"><a href="#0">Menu</a></li>
                    @foreach($menus as $menu)
                    <li><a href="{{asset($menu->item_link)}}"><i class="fa fa-circle-thin" aria-hidden="true"></i> {{$menu->item_name}}</a></li>
                    @endforeach
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
    <a href="#0" class="cd-nav-trigger"><span></span></a>
</header>
<!-- /.container -->

<!-- Search -->
<div class="search-form-wrap" id="search-content">
    <form action="#" class="search-form">
        <input type="search" class="search-input" placeholder="Search" id="input-search" autocomplete="off">
        <button class="search-input-clear" type="reset">
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>
        <br>
        <button class="btn btn-default btn-search-submit" type="submit"><i class="fa fa-search"></i> Search</button>
    </form>
</div>
<!-- /.search-form-wrap -->
<!-- /.header-search-form -->


