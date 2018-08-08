@if(Session::get('user')->status != 'outsource')

    @inject('menu', 'App\Http\Controllers\FrontMenuController')
    {{-- */$menus = $menu->index()['menus']/* --}}
    {{-- */$main_document_menu = $menu->index()['main_document_menu']/* --}}
    {{-- */$main_document_menu1 = $menu->index()['main_document_menu1']/* --}}
    @inject('fav_app', 'App\Http\Controllers\FrontFavoriteController')
    {{-- */$fav_apps = $fav_app->fetch_fav_app()/* --}}

@endif

<!-- Navigation -->
<header class="metrop-nav metrob__nav cd-main-header">

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" style="height: 90px;">
                <div class="cd-logo logo flex flex-v-center">
                    <a href="{{asset('/')}}"><img src="{{asset('logo.png')}}" height="72px" alt="Logo"></a>
                </div>
            </div>
            <div class="col-md-6 flex flex-v-center pull-right" style="height: 90px;">
                <div style="width: 100%">
                    <div id="search-content" class="navbar-right nav__link-text form-group has-feedback m-15"> 
                        <form action="#" >
                            <input type="search" class="form-control metrob__nav-search disable__outline"  placeholder="ค้นหา" id="input-search" autocomplete="off">
                            <button class="btn btn-link form-control-feedback p-t-5" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <p class="navbar-text navbar-right nav__link-text p-t-5">
                        <a href="#" class="navbar-link">
                            <i class="fa fa-star-o" aria-hidden="true" style="color:#e4ce22"></i> Favorite App
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        </a>
                    </p>
                    <p class="navbar-text navbar-right nav__link-text p-t-5"><a href="#" class="navbar-link">About MSC</a></p>
                </div>
            </div>
            <!-- Hamburger -->
            <ul class="cd-header-buttons">
                <li><a class="cd-nav-trigger" href="#cd-primary-nav">.<span></span></a></li>
            </ul> 
        </div>

        <div class="row metrob__second-nav flex flex-h-center flex-v-center">
            <ul id="cd-primary-nav" class="cd-primary-nav is-fixed metrob__second-nav-menu flex-v-center">

                    @if(Session::get('user')->status != 'outsource')
                    <li data-toggle="tooltip" data-placement="bottom" title="Application ทั้งหมด" class="nav__link-text">
                        <a href="{{asset('/application')}}" class="npt_stat" data-name="application" data-where="top-nav">
                            <img src="../images/icon/MSC-APP.svg" width="25px" /> MSC Apps
                        </a>
                    </li>
                    @endif 

                    <li data-toggle="tooltip" data-placement="bottom" title="สมุดโทรศัพท์" class="nav__link-text">
                        <a href="{{asset('/phonebook')}}" class="npt_stat" data-name="phonebook" data-where="top-nav">
                            <img src="../images/icon/Phonebook.svg" width="25px" /> Phone Book
                        </a>
                    </li>

                    @if(Session::get('user')->status != 'outsource')
                        
                    {{--*/ $policy_id = App\Library\Services::setting_getPostPolicyId()/*--}}

                        <li data-toggle="tooltip" data-placement="bottom" title="Policy ทั้งหมด" class="nav__link-text">
                            <a href="{{asset('/post/' . $policy_id)}}" class="npt_stat" data-name="policy" data-where="top-nav">
                                <img src="../images/icon/Policy.svg" width="20px" /> Policy
                            </a>
                        </li>

                        <li class="disible-dasktop nav__link-text" >
                            <a href="{{url('/calendar')}}">
                                <i class="fa  fa-calendar  text-danger" aria-hidden="true"></i> calendar
                            </a>
                        </li>

                        <li class="has-children nav__link-text" data-toggle="tooltip" data-placement="bottom" title="Application ที่ชื่นชอบทั้งหมด">
                            <a href="#" class="npt_stat" data-name="favoriteApp" data-where="top-nav">
                                @if(empty($fav_apps))
                                    <i class="fa fa-star-o" aria-hidden="true" style="color:#e4ce22"></i> Favorite App
                                @else
                                    <i class="fa fa-star" aria-hidden="true" style="color:#e4ce22"></i> Favorite App
                                @endif

                            </a>
                            <ul class="fav_app_list cd-nav-icons is-hidden">
                                <li class="go-back"><a href="#0">Menu</a></li>
                                <li class="see-all" data-toggle="tooltip" title="Application ทั้งหมด">
                                    <a href="{{asset('/application')}}">{{empty($fav_apps) ? 'Sorry, Not have favorite application now.' : 'All Application'}}</a>
                                </li>
                                @forelse($fav_apps as $fav_app)
                                <li>
                                    <a class="cd-nav-item npt_stat" href="{{asset($fav_app->app_link)}}" data-name="{{$fav_app->app_title}}" data-where="favoriteApp-bar" target="_blank">
                                        {{--*/

                                            if(strlen($fav_app->app_title)>2)
                                                $app_name = substr($fav_app->app_title,0,1) . substr($fav_app->app_title,-1,1);
                                            else
                                                $app_name = substr($fav_app->app_title,0,2);

                                        /*--}}
                                        <div class="item-icon"><span style="font-size:3em;color:rgba(135, 187, 139, 0.39);">{{$app_name}}</span></div>
                                        <h3 {!!empty($fav_app->app_description) ? "style='margin-top:10px;'" : ''!!}>{{$fav_app->app_title}}</h3>
                                        <p>{{$fav_app->app_description}}</p>
                                    </a>
                                </li>
                                @empty
                                <li>
                                    <a class="cd-nav-item" href="{{asset('/application')}}">
                                        <div class="item-icon"><i class="fa fa-2x fa-warning"></i></div>
                                        <h3>Sorry, Not have a favorite application now.</h3>
                                        <p>Please Click Here To Add Favorite App</p>
                                    </a>
                                </li>
                                @endforelse
                            </ul>
                        </li>

                        @if($user->can(['view-menu-'.Config::get('newportal.menubar.department.id')]))
                                
                            <li class="has-children" data-toggle="tooltip" data-placement="bottom" title="หน่วยงานทั้งหมด">
                                <a href="{{asset('/')}}"><i class="fa fa-group"></i> Department</a>
                                <ul class="cd-nav-icons is-hidden">
                                    <li class="go-back"><a href="#0">Menu</a></li>
                                    <li class="see-all"><a href="#">{{empty($menus) ? 'Sorry, Not have a menu now.' : 'All Department'}}</a></li>
                                    {{--*/$i = 0/*--}}
                                    @forelse($menus as $menu)
                                    @if(!$user->can(['view-menu_item-' . $menu->mtid]))
                                        @continue
                                    @endif
                                    <li>
                                        <a class="cd-nav-item npt_stat" data-ff="{{strpos($menu->item_link, "http")}}" href="{{asset($menu->item_link)}}" data-name="{{$menu->item_name}}" data-where="department-bar" @if(strpos($menu->item_link, "http") !== false) target='_blank' @endif>
                                            {{--*/

                                                if(strlen($menu->item_name)>2)
                                                    $menu_name = substr($menu->item_name,0,1) . substr($menu->item_name,-1,1);
                                                else
                                                    $menu_name = substr($menu->item_name,0,2);

                                            /*--}}
                                            <div class="item-icon"><span style="font-size:3em;color:rgba(135, 187, 139, 0.39);"><i class="fa fa-circle-o"></i></span></div>
                                            <h3 {!!empty($menu->item_description) ? "style='margin-top:10px;'" : ''!!}>{{$menu->item_name}}</h3>
                                            <p>{{$menu->item_description}}</p>
                                        </a>
                                    </li>
                                    @empty
                                    <li>
                                        <a class="cd-nav-item" href="#">
                                            <div class="item-icon"><i class="fa fa-2x fa-warning"></i></div>
                                            <h3>Sorry, Not have a menu now.</h3>
                                            <p>Please contact your administrator or call 78451(aon@mis)</p>
                                        </a>
                                    </li>
                                    @endforelse
                                </ul>
                            </li>

                        @endif
            
                        <!-- Meeting Document -->
                        @if($user->can(['view-menu-'.Config::get('newportal.menubar.meetingdocument.id')]))

                            <li class="has-children nav__link-text" data-toggle="tooltip" data-placement="bottom" title="Meeting Document">
                                <a href="{{asset('/')}}"><i class="fa fa-file-text"></i> Meeting Document</a>

                                    <ul class="cd-secondary-nav is-hidden">
                                        <li class="go-back"><a href="#0">Menu</a></li>
                                
                                        @if(count($main_document_menu) != 0)
                                            <!-- Loop Here-->
                                            @foreach($main_document_menu as $key => $value)

                                            <li class="has-children">
                                                <a>{{$key}}</a>

                                                <ul class="is-hidden">
                                                    <li class="go-back"><a href="#0">Meething Document</a></li>
                                                    @foreach($value as $menu)
                                                        @if(!$user->can(['view-menu_item-'.$menu['mtid']]))
                                                            @continue
                                                        @endif
                                                        <li>
                                                            <a class="cd-nav-item npt_stat" data-ff="{{strpos($menu['item_link'], "http")}}" href="{{asset($menu['item_link'])}}" data-name="{{$menu['item_name']}}" data-where="department-bar" @if(strpos($menu['item_link'], "http") !== false) target='_blank' @endif>
                                                            {{$menu['item_name']}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach

                                        @endif

                                    </ul>
                            </li>

                        @endif


                        <!--Financial Statement-->                            
                        @if($user->can(['view-trop-'.Config::get('newportal.trop.Financialstatement.id')]))

                            <li data-toggle="tooltip" data-placement="bottom" title="Financial statement">
                                <a href="{{asset(Config::get('newportal.post.Financialstatement.url'))}}" class="npt_stat" data-name="document" data-where="top-nav">
                                    <i class="fa fa-book" aria-hidden="true" style="color:#52ec83"></i> Financial statement</a>
                            </li>

                        @endif

                        @if($user->can(['view-menu-'.Config::get('newportal.menubar.AccountingKM.id')]))

                            <li class="has-children" data-toggle="tooltip" data-placement="bottom" title="Accounting KM">
                                <a href="{{asset('/')}}"><i class="fa fa-file-text"></i> Accounting KM</a>

                                    <ul class="cd-secondary-nav is-hidden">
                                        <li class="go-back"><a href="#0">Menu</a></li>
                                
                                        @if(count($main_document_menu1) != 0)
                                            <!-- Loop Here-->
                                            @foreach($main_document_menu1 as $key => $value)

                                            <li class="has-children">
                                                <a>{{$key}}</a>

                                                <ul class="is-hidden">
                                                    <li class="go-back"><a href="#0">Accounting KM</a></li>
                                                    @foreach($value as $menu)
                                                        @if(!$user->can(['view-menu_item-'.$menu['mtid']]))
                                                            @continue
                                                        @endif
                                                        <li>
                                                            <a class="cd-nav-item npt_stat" data-ff="{{strpos($menu['item_link'], "http")}}" href="{{asset($menu['item_link'])}}" data-name="{{$menu['item_name']}}" data-where="department-bar" @if(strpos($menu['item_link'], "http") !== false) target='_blank' @endif>
                                                            {{$menu['item_name']}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach

                                        @endif

                                    </ul>
                            </li>

                        @endif
                    @endif <!-- End check outsource -->

            </ul>
        </div>
            <!-- primary-nav -->
    </div>
</nav>
<!-- cd-nav -->
</header>
<!--
<div class="search-form-wrap" id="search-content">
    <form action="#" class="search-form">
        <input type="search" class="search-input" placeholder="Search" id="input-search" autocomplete="off">
        <button class="search-input-clear" type="reset">
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>
        <br>
        <button class="btn btn-default btn-search-submit" type="submit">
            <i class="fa fa-search"></i> Search
        </button>
    </form>
</div>
-->
<div class="cd-overlay"></div>
<!-- <nav class="cd-nav"> -->