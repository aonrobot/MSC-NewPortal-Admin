<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<style>
    @font-face {
        font-family: chinese;
        src: url('./fonts/chinese/DSN YaoWaRat.ttf');
    }
    .chinese {
        font-family: chinese;
        color: #FFEB3B;
        font-size: 120px;
        font-weight: 100;
        text-shadow: 5px 4px #000000;
    }
    .metrop-nav {
        background-color: rgb(159, 1, 26) !important;
        border-bottom: 1px solid #cc2e2e;
    }
    .blackdrop {
        z-index: 1001;
        position: fixed;
        background: rgba(0, 0, 0, .8);
        top: 0;
        left: 0;
        width: 100%;
        height:100%;
        text-align: center;
    }
    .hands {
        max-width: 100%;
        max-height: 100%;
    }
    .seamsi {
        max-width: 80%;
        height: 100%;
    }
    .seamsi-wrap { 
        height: 100%;
        position: fixed;
        display: flex;
        flex-direction: column;
        left: 50%;
        transform: translate(-50%, 0);
        align-items: center;
    }
    .btn-wrap {
        width: 100%;
        display: flex;
        justify-content: space-evenly;
    }
    .btn-wrap > button{ 
        min-width: 340px;
        font-family: 'cloud_light';
        font-size: 30px;
        color: #FFEB3B;
        border: 3px solid #FFEB3B;
        background: #ff2121;
        font-weight: bold;
    }
    .btn-wrap > .btn-renew {}
    .btn-wrap > .btn-collect {}

    .btn-wrap > button:hover,
    .btn-wrap > button:active,
    .btn-wrap > button:focus {
        border: 3px solid #fff;
        background: #ff2121 !important;
    } 

    .btn-close { 
        position: fixed;
        top: 0;
        right: 0;
        color: white;
        font-size: 20px;
    }
    .btn-close:hover,
    .btn-close:active,
    .btn-close:focus { 
        font-size: bold;
        color:#FFEB3B;
    }

    .btn-chinese {
        background: #f8be05;
        color: white;
        border: 3px solid #9a7300;
    }
    .btn-white {
        color: white;
    }
    #showMineSeamsi .modal-header {
        background: url('./images/chinese-newyear/header.jpg');
        min-height: 280px;
        background-size: cover;
        border-bottom: none;
    }
    #showMineSeamsi .modal-content {
        background: #d83f41;
    }
    #showMineSeamsi .modal-body {
        min-height: 100px;
    }
    #showMineSeamsi .modal-footer {
        border-top: none;
        text-align: center;
        background: url('./images/chinese-newyear/footer.png');
        background-position: center bottom;
        min-height: 150px;
    }



 .title-animate {
  font-size: 60px;
  text-align: center;
}

.title-animate span { display:inline-block; animation:float .2s ease-in-out infinite; }    
.title-animate span{ 
  color: #FFEB3B; 
  text-shadow:1px 1px #9a7300, 2px 2px #9a7300, 3px 3px #9a7300, 4px 4px #9a7300; 
} 
@keyframes float {
  0%,100%{ transform:none; }
  33%{ transform:translateY(-1px) rotate(-2deg); }
  66%{ transform:translateY(1px) rotate(2deg); }
}
.modal-body:hover span { animation:bounce .6s; }
@keyframes bounce {
  0%,100%{ transform:translate(0); }
  25%{ transform:rotateX(20deg) translateY(2px) rotate(-3deg); }
  50%{ transform:translateY(-20px) rotate(3deg) scale(1.1);  }
}

.title-animate span:nth-child(2){ animation-delay:.05s; }
.title-animate span:nth-child(3){ animation-delay:.1s; }
.title-animate span:nth-child(4){ animation-delay:.15s; }


.seamsi-item { 
    border-radius: 15px;
    display: flex;
    padding: 10px;
    background: #c72f31;
    align-items: center;
    margin-top: 20px;
}   
.seamsi-item img { 
    height: 100%;
    width: 50px;
}
.seamsi-item h4 { 
    color: white;
    margin-left: 10px;
    width: 100%;
}

/** LIGHTBOX MARKUP **/

.lightbox {
	/** Default lightbox to hidden */
	display: none;

	/** Position and style */
	position: fixed;
	z-index: 999;
	width: 100%;
	height: 100%;
	text-align: center;
	top: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
}

.lightbox img {
	/** Pad the lightbox image */
	max-width: 100%;
	max-height: 100%;
}

.lightbox:target {
	/** Remove default browser outline */
	outline: none;

	/** Unhide lightbox **/
	display: block;
}
.lion {
    position: absolute;
bottom: 0 ;
left: 0 ; 
}

.pig:hover{ 
    cursor: pointer;
    -webkit-animation: tada 1s;
    animation: tada 1s;
}

.header-detail {
    position: absolute;
    right: 20px;
    bottom: 20px;

}
    .btn-showlist { 
        font-family: 'cloud_light'; 
    }
</style>

<!-- Event | Chinese Event -->
<header class="intro-header">
    <div class="header-slider" style="height: 600px; width: 100%; background: url('images/chinese-newyear/chn1.jpg'); 
        background-repeat : no-repeat; background-position: center center; background-size: cover; z-index: 9999; text-align:center;"> 

        <h1 class="chinese">ซินเจียยู่อี่ ซินนี้ฮวดไช้</h1>
        <img src="./images/chinese-newyear/pig.png" id="shake" class="pig" />
        <img src="./images/chinese-newyear/lion.png" class="lion" />


        <div class="header-detail">
            <h3 style="color: white;">มีเซียมซีถูกเก็บทั้งหมด : <span id="total_seamsi"></span></h3>
            <h3 style="color: white;">ฉันเก็บเซียมซีไปแล้ว : <span id="your_seamsi"></span>  ใบ</h3>
            <button class="btn btn-warning btn-showlist" type="button" data-toggle="modal" data-target="#showMineSeamsi">
                ดูเซียมซีของฉัน 
            </button> 
        </div>
    </div>
    
</header>

<div class="blackdrop">
    <button class="btn btn-link btn-close" id="close" onclick="closeSeamsi();" type="button">
        <i class="fa fa-times"></i>
    </button>
    <img src="./images/chinese-newyear/hand.png" id="hands" class="hands" />

    {{-- <img src="" class="animated bounceIn" /> --}}
</div>

<!-- Modal -->
<div class="modal fade" id="showMineSeamsi" tabindex="-1" role="dialog" aria-labelledby="showMineSeamsi" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog " role="document">
        <div class="modal-content" style="overflow: hidden;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white; font-weight: bold; font-size: 40px;">&times;</span>
                </button>
               
            </div>
            <div class="modal-body">
                <h1  class="modal-title title-animate" id="showMineSeamsiLabel">
                    <span>ใบ</span><span>เซียมซี</span><span>ของ</span><span>ฉัน</span>
                </h1>

                <div id="seamsi_lists">
                    <h5 class="text-center" style="color: white;">ยังไม่มีใบเซียมซีเลย ร่วมสนุกโดยการเสี่ยงเซียมซีกับเราสิ!</h5>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-chinese" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>

    var LOGIN_NAME = '{{Session::get('em_info')->Login}}';
    $('.blackdrop').hide();
    $( "#shake" ).click(function() {

        $('.blackdrop').show();
        shake();
    });

    function randomSeamsi(max, min) {
        return Math.floor(Math.random() * (max - min + 1)) + min;        
    }

    function showSeamsi() {

        $("#hands").hide();
        $('.blackdrop').append(
            
            '<div class="seamsi-wrap" id="seamsi"><img id="seamsi_paper" class="animated bounceIn seamsi" src="./images/chinese-newyear/seamsi/' +  randomSeamsi(28,1)  + '.png" alt="..." /><span style="color:white; font-size:19px;">เซียมซีนี้มาจากวัดหลวงพ่อโสธร</span>' +
            '<div class="btn-wrap"><button class="btn btn-primary btn-renew" onclick="shake();" type="button"> เสี่ยงใหม่อีกครั้ง</button>' +
            '<button class="btn btn-primary btn-collect" onclick="collect();" type="button"> เก็บเซียมซี</button></div></div>'
        );
    }   

    function shake () {

        $("#seamsi").remove();
        $("#hands").show();
        $( "#hands" ).effect( 
            "shake", 
            { times: 10, distance: 10}, 2000 , function() {
                showSeamsi();
            }
        );
    }

    function closeSeamsi(){

        $("#hands").stop(true, true)
        $("#seamsi").remove();
        $('.blackdrop').hide();
    }


    function collect() {

        alert('ขอบคุณที่ร่วมสนุก! เก็บใบเซียมซีของคุณเรียบร้อยแล้ว');
        // Get Seamsi Name
        var fullPath = document.getElementById("seamsi_paper").src;
        var filename = fullPath.replace(/^.*[\\\/]/, '');
        console.log(filename);
        $.ajax({
            url: "/newportal/chinese/store", 
            method: "POST",
            data: {
                "login": LOGIN_NAME,
                "cardid": filename
            }
        }).done(function (res) {
            
            if (res === '200' ) {
                closeSeamsi();
                getSeamsi ();
            }else {
                alert('มีบางอย่างผิดพลาดกรุณราลองใหม่อีกครั้ง');
            }
        });
    }

    function getSeamsi () {
        console.log('hello');
        $.ajax({
            url: "/newportal/chinese/show/" + LOGIN_NAME, 
            method: "GET",
        }).done(function (res) {
            $('#total_seamsi').html(
                res.all
            )
            $('#your_seamsi').html(
                res.allLogin
            )
            if (res.data.length !== 0) {
                listMySeamsi(res.data);
            }
        });
    }
    getSeamsi();
    setInterval(function() {
        getSeamsi();
    }, 5000);


    function listMySeamsi( arr ) {

        var list = arr.reverse();
        var elem = $('#seamsi_lists'); 
        var htmlList = '';

        for ( var i =0 ; i < list.length ;i++) {
            htmlList += 
            '<div class="seamsi-item">' + 
            '    <img class="" src="./images/chinese-newyear/seamsi/' + list[i].img_id +'.png" alt="..." width="50px" />' + 
            '    <h4>เซียมซีใบที่ '+ list[i].img_id + '</h4>' +
            '    <a href="#img' + list[i].img_id + '" class="btn-white">' +
            '        <i class="fa fa-search"></i>' +
            '    </a>' +
            '</div>' + 
            '<a href="#_" class="lightbox" id="img' + list[i].img_id + '">' + 
            '   <img class="img-responsive" src="./images/chinese-newyear/seamsi/' + list[i].img_id +'.png" alt="..." />' +
            '   <h4 class="text-center" style="color: white; font-weight: bold;">คลิ๊กที่รูปเพื่อปิด</h4>' +
            '</a>'
        }
        elem.html(htmlList);

    } 

</script>