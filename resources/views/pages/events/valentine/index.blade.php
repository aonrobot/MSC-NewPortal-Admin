<!-- Event | Love Event -->
<div class="row">
    <div class="metrop-text-head">
        <h2>Happy Valentine's Day <i class="fa fa-heart"></i></h2>
    </div>
    @if($sentHeart)
    <div id="haveHeart" class="col-md-5">
        <h3><i class="fa fa-gittip" style="color:#E26A6A"></i> ใครกันนะ... ที่คุณอยากจะ<span style="color:#F16278;">ส่งหัวใจ</span>ให้ในวันดีๆแบบนี้ <br>
            <small style="font-size: 70%">สามารถค้นหาชื่อเล่น หรือ ชื่อจริงได้เท่านั้นนะคะ</small>
        </h3>
        <form class="typeahead" role="search">
            <div id="scrollable-dropdown-menu" class="form-group">
                <input id="inputHeart" style="font-size: 22px" type="search" name="q" class="form-control typeahead-input" placeholder="พิมพ์ชื่อคนที่คุณอยากให้หัวใจ" autocomplete="off">
            </div>
            <div class="form-group text-right">
                <a id="sendHeart" class="btn btn-primary">ส่ง <i class="fa fa-heart" style="color:#FFF"></i> </a>
            </div>
        </form>
    </div>
    @else
    <div id="notHaveHeart" class="col-md-5" style="padding-right: 45px;">
        <h3>ไม่เหลือ <i class="fa fa-heart" style="color:#E26A6A"></i> ส่งให้ใครแล้ว <br></h3>
    </div>
    @endif
    <div id="showHeart" class="col-md-7">
        <h3><i class="fa fa-gittip" style="color:#E26A6A"></i> ใครส่งหัวใจให้คุณบ้างในวันนี้</h3>
        <hr>
        <div class="row allHeart">
            @forelse($receiveHeart as $rh)
            <div class="col-md-4 heartReceive">
                @php
                    $strzero = str_repeat("0", 6 - strlen($rh->empCodeSend));
                    $strshow = $strzero . $rh->empCodeSend;

                    $userInfo = App\MainEmployee::where('EmpCode', $strshow)->first();

                    $nickName = $userInfo['NickName'];

                    $orgUnitName = explode('-',$userInfo['OrgUnitName'])[0];

                    if($nickName == '') $nickName = $userInfo['FirstName'];

                @endphp
                <span><i class="fa fa-heart" style="color:#E26A6A"></i> {{$nickName . '@' . $orgUnitName}}</span>
            </div>
            @empty
            <div class="col-md-12 heartReceive">
                <h4>^.^</h4>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- /.row -->
<hr>

<script src="{{asset('plugins/typeahead/typeahead.bundle.js')}}"></script>

<script type="text/javascript" src="{{asset('js/front/home/event/valentine.js')}}"></script>