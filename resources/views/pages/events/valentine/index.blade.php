<!-- Event | Love Event -->
<header class="intro-header">
    <div class="header-slider" style="height: 600px; width: 100%; background: url('images/valentine/BG-valentine.png'); 
        background-repeat : no-repeat; background-position: center center; background-size: cover; z-index: 9999; text-align:center;"> 

        <div class="row">
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
    </div>


    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    
</header>


<!-- /.row -->
<hr>

<script src="{{asset('plugins/typeahead/typeahead.bundle.js')}}"></script>

<script type="text/javascript" src="{{asset('js/front/home/event/valentine.js')}}"></script>