<header class="intro-header">
    <div class="header-slider" style="height: 600px; width: 100%; background: url('images/BGkratong.jpg'); 
    background-repeat : no-repeat; background-position: center center; background-size: cover; z-index: 9999;">
    <!-- <img class="" src="images/BGkratong.jpg"> -->
        <div class="clouds" id="river">
            {{-- <div class="cloud s1">
                <div class="message" style="">
                    <p>Hello This A Blessing from GOD!</p>
                </div>
                <img class="" src="images/LKT.png" />
            </div>
            <div class="cloud s2"><img class="" src="images/LKT.png"></div>
            <div class="cloud s3"><img class="" src="images/LKT.png"></div>
            <div class="cloud s4"><img class="" src="images/LKT.png"></div>
            <div class="cloud s5"><img class="" src="images/LKT.png"></div>

            <div class="cloud s6">
                <div class="message" style="">
                    <p>Hello This A Blessing from GOD!</p>
                </div>
                <img class="" src="images/LKT.png" />
            </div>
            <div class="cloud s7"><img class="" src="images/LKT.png"></div>
            <div class="cloud s8"><img class="" src="images/LKT.png"></div>
            <div class="cloud s9"><img class="" src="images/LKT.png"></div>
            <div class="cloud s10"><img class="" src="images/LKT.png"></div> --}}
        </div>
    
        <div style="margin-left: auto; margin-right: auto;">
                <img class="" src="images/Bannerloykratong.png" style="height:20%; width:20%;" />
        </div>

        <h1 style="    bottom: 0;
        position: absolute; color: yellow;
        right: 10px;" id="kratong_count">จำนวนกระทง : 0</h1>
        
    </div>
</header>
    <div class="row" id="blessing_form" style="background:linear-gradient(to right,rgba(168, 245, 255,1) ,rgba(172,182,229,0.4));" >
    <div class="container">
            <h3 class="text-warning" id="warning">
            </h3>
            <select name="loykrathonglist" id="loykrathonglist">
                <option disabled selected value="0">-- เลือกคำอวยพร --</option>
                <option value="1">ขอให้มีความสุข</option>
                <option value="2">ขอให้มีสุขภาพร่างกายแข็งแรง</option>
                <option value="3">ขอให้ร่ำรวย มีเงินทองใช้</option>
                <option value="4">ขอให้เจริญในหน้าที่การงาน</option>
                <option value="5">ขอขมาแม่คงคา ขอสิ่งศักดิ์สิทธิ์คุ้มครอง</option>
            </select>
            <button type="submit" value="Submit" id="submitBtn">คลิกลอยกระทง</button>
            
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <p id="modal_text">ขอบคุณที่ร่วมกิจกรรม</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    
<script type="text/javascript">
    
    'use strict';
var total_count ;
render_kratong();

function render_kratong() {
    $('#river').html('');
    $.get('loykrathong/showall', function (res) {
        
        var data = res.reverse();
            total_count = data[0].total;
        $('#kratong_count').html('จำนวนกระทง : ' + data[0].total);
        var kratong = '';
        var count = 1;
        for (var i = 0; i < data.length; i++) {
            kratong += '<div class="cloud s' + count + ' ">\n                    <div class="message" style="">\n                        <p><strong>' + data[i].display_name + ' :  </strong>' + data[i].word + '</p>\n                        \n                    </div>\n                    <img class="" src="images/LKT.png" />\n                </div>\n                ';
            count++;
        }
        $('#river').append(kratong);
    });
}
function add_kratong() {
    
    var river = $('#river');
    $.get('loykrathong/showall', function (response) {
        
        if (response[0].total != total_count) {
            console.log('have change');
            var diff = Number(response[0].total) - Number(total_count);
            var data_new = response.reverse();
                data_new.slice(0, diff);

            
                var total_new  = response[0].total;
                $('#kratong_count').html('จำนวนกระทง : ' + response[0].total);
                var kratong = '';
                var count = 1;
                for (var i = 0; i < diff ; i++) {
                    kratong += '<div class="cloud s' + count + ' ">\n                    <div class="message" style="">\n                        <p><strong>' + data_new[i].display_name + ' :  </strong>' + data_new[i].word + '</p>\n                        \n                    </div>\n                    <img class="" src="images/LKT.png" />\n                </div>\n                ';
                    count++;
                }
                $('#river').append(kratong);

                total_count = response[0].total;
        }else {
            console.log('no change');
        }
    });
    
}
setInterval(add_kratong,36000);
setInterval(render_kratong,36000);

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#submitBtn").click(function () {
    var blessing = $('#loykrathonglist').val();
    var waring = $('#warning');
    $(warning).html('');
    if (blessing) {

        var data = {
            login: "{{Session::get('em_info')['EmpID']}}",
            word_id: $('#loykrathonglist').val()
        };
        $.post('loykrathong/word/add', data, function (data) {
            if (data === 'true') {
                render_kratong();
                $('#modal_text').html('ขอบคุณที่ร่วมกิจกรรมค่ะ');
                $('#myModal').modal('show');
                // $(blessing).get(0).selectedIndex = 1;   
            } else {
                $('#modal_text').html('คุณขอพรครบแล้วค่ะ');
                $('#myModal').modal('show');
            }
        });
    } else {
        $(warning).append('กรุณาเลือกคำอวยพร');
    }
});
</script>