@if(Session::get('user')->status != 'outsource')

@inject('menu', 'App\Http\Controllers\FrontMenuController')
{{-- */$menus = $menu->index()['menus']/* --}}
{{-- */$meeting_menus = $menu->index()['meeting_menus']/* --}}
@inject('fav_app', 'App\Http\Controllers\FrontFavoriteController')
{{-- */$fav_apps = $fav_app->fetch_fav_app()/* --}}

@endif

<!-- Navigation -->
<header class="metrop-nav cd-main-header">
    <div class="cd-logo">
        <a href="{{asset('/')}}"><img src="{{asset('logo.png')}}" height="52px" alt="Logo"></a>
    </div>
    <!-- Search btn -->
    <div class="cd-search-btn">
        <a href="#" id="search-btn">
            <i class="fa fa-search" id="search-icon"></i>
        </a>
    </div>
    <ul class="cd-header-buttons">
        <li><a class="cd-nav-trigger" href="#cd-primary-nav">.<span></span></a></li>
    </ul>
    <!-- cd-header-buttons -->
    <!-- .cd-main-nav -->
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
        <button class="btn btn-default btn-search-submit" type="submit">
            <i class="fa fa-search"></i> Search
        </button>
    </form>
</div>
<!-- /.search-form-wrap -->

<!-- /.header-search-form -->
<div class="cd-overlay"></div>
<nav class="cd-nav">
    <ul id="cd-primary-nav" class="cd-primary-nav is-fixed">
        <li data-toggle="tooltip" data-placement="bottom" title="หน้าแรก">
            <a href="{{asset('/')}}" class="npt_stat" data-name="home" data-where="top-nav" target="_parent">
                <i class="fa fa-home" aria-hidden="true"></i> Home
            </a>
        </li>

        @if(Session::get('user')->status != 'outsource')
        <li data-toggle="tooltip" data-placement="bottom" title="เกี่ยวกับบริษัท">
            <a href="{{asset(Config::get('newportal.trop.aboutmsc.url'))}}" class="npt_stat" data-name="about" data-where="top-nav">
                <i class="fa fa-globe" aria-hidden="true"></i> About MSC
            </a>
        </li>
        @endif

        <li data-toggle="tooltip" data-placement="bottom" title="สมุดโทรศัพท์">
            <a href="{{asset('/phonebook')}}" class="npt_stat" data-name="phonebook" data-where="top-nav">
                <i class="fa fa-phone" aria-hidden="true"></i> Phone Book
            </a>
        </li>

        @if(Session::get('user')->status != 'outsource')

        {{--*/ $policy_id = App\Library\Services::setting_getPostPolicyId()/*--}}
        <li data-toggle="tooltip" data-placement="bottom" title="Policy ทั้งหมด">
            <a href="{{asset('/post/' . $policy_id)}}" class="npt_stat" data-name="policy" data-where="top-nav">
                <i class="fa fa-file-text" aria-hidden="true"></i> Policy
            </a>
        </li>
        <li data-toggle="tooltip" data-placement="bottom" title="Application ทั้งหมด">
            <a href="{{asset('/application')}}" class="npt_stat" data-name="application" data-where="top-nav">
                <i class="fa fa-desktop" aria-hidden="true"></i> MSC App
            </a>
        </li>
        <li class="disible-dasktop">
            <a href="{{url('/calendar')}}">
                <i class="fa  fa-calendar  text-danger" aria-hidden="true"></i> calendar
            </a>
        </li>

        <li class="has-children" data-toggle="tooltip" data-placement="bottom" title="Application ที่ชื่นชอบทั้งหมด">
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

        <li class="has-children" data-toggle="tooltip" data-placement="bottom" title="หน่วยงานทั้งหมด">
            <a href="{{asset('/')}}"><i class="fa fa-group"></i> Department</a>
            <ul class="cd-nav-icons is-hidden">
                <li class="go-back"><a href="#0">Menu</a></li>
                <li class="see-all"><a href="#">{{empty($menus) ? 'Sorry, Not have a menu now.' : 'All Department'}}</a></li>
                {{--*/$i = 0/*--}}
                @forelse($menus as $menu)
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

        <!-- Meeting Document -->
        @if($user->can(['view-menu-'.Config::get('newportal.menubar.meetingdocument.id')]))

        <li class="has-children" data-toggle="tooltip" data-placement="bottom" title="Meeting Document">
            <a href="{{asset('/')}}"><i class="fa fa-file-text"></i> Meeting Document</a>

                <ul class="cd-secondary-nav is-hidden">
                    <li class="go-back"><a href="#0">Menu</a></li>

<?php

$main_cat_list = [];

foreach ($meeting_menus as $menu) {
	$cat_name = $menu->item_description;

	if (strpos($cat_name, '~') > -1) {
		$cat_name = explode('~', $cat_name)[0];
	}
	if (!in_array($cat_name, $main_cat_list)) {
		array_push($main_cat_list, $cat_name);
	}

}

?>                  
                    @if(count($meeting_menus) != 0)
                    <!-- Loop Here-->
                    @foreach($main_cat_list as $main_cat)

                    <li class="has-children">
                        <a>{{$main_cat}}</a>

                        <ul class="is-hidden">
                            <li class="go-back"><a href="#0">Meething Document</a></li>
                            @foreach($meeting_menus as $menu)

                                @if(!$user->can(['view-menu_item-'.$menu->mtid]))
                                    @continue
                                @endif

                                @if(!is_null($menu->item_description))
                                    @if(strpos($menu->item_description, $main_cat) > -1)
                                        <li>
                                            <a class="cd-nav-item npt_stat" data-ff="{{strpos($menu->item_link, "http")}}" href="{{asset($menu->item_link)}}" data-name="{{$menu->item_name}}" data-where="department-bar" @if(strpos($menu->item_link, "http") !== false) target='_blank' @endif>
                                            {{$menu->item_name}}
                                            </a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    @endforeach

                    @endif

                </ul>
        </li>

        @endif

        @endif <!-- End Check OutSource-->

    </ul>
    <!-- primary-nav -->
</nav>
<!-- cd-nav -->
