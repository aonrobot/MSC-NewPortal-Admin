@extends('front_template')

@section('head_image')
<header class="intro-header-empty">
</header>
@stop

@section('content')

<link href='{{asset('plugins/fullcalendar/fullcalendar.min.css')}}' rel='stylesheet' />
<link href='{{asset('plugins/fullcalendar/fullcalendar.print.min.css')}}' rel='stylesheet' media='print' />

<style>
.fc-toolbar button:focus{
    z-index: 2!important;
}
.fc-toolbar .fc-state-active, .fc-toolbar .ui-state-active{
    z-index: 2!important;
}
.fc-center{
    margin-top: 1.5em!important;
}
.fc-button{
    margin-top: 2em!important;
}
</style>

<h3>MSC Calendar <br></h3>

<div id='calendar'></div>

<br>

<h5><small>Thank Mr.Teerapong Prawanno(ITS) for giving inspiration to make this during end of this job by great result</small></h5>

<script type="text/javascript">

$(document).ready(function() {

    var currentYear = new Date().getFullYear();
    var d = new Date();
		
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'listMonth, month'
        },
        views: {
            listMonth: { buttonText: 'ลิสของเดือนนี้' },
            month: { buttonText: 'ภาพรวมของเดือนนี้' }
        },
        contentHeight: 485,
        defaultView: 'listMonth',
        defaultDate: new Date(currentYear, d.getMonth(), d.getDate()),
        navLinks: false, // can click day/week titles to navigate views
        editable: false,
        eventLimit: true, // allow "more" link when too many events
        events: [
            {
                id: 0,
                title: 'หยุดชดเชยวันขึ้นปีใหม่',
                start: new Date(2017, 0, 2),
                end: new Date(2017, 0, 3)
            }, 
            {
                id: 1,
                title: 'วันตรุษจีน',
                start: new Date(2017, 0, 27),
                end: new Date(2017, 0, 30)
            }, 
            {
                id: 2,
                title: 'ชดเชยวันมาฆบูชา',
                start: new Date(2017, 1, 13),
                end: new Date(2017, 1, 13)
            }, 
            {
                id: 3,
                title: 'วันจักรี',
                start: new Date(2017, 3, 6),
                end: new Date(2017, 3, 6)
            }, 
            {
                id: 4,
                title: 'วันสงการนต์',
                start: new Date(2017, 3, 13),
                end: new Date(2017, 3, 14)
            }, 
            {
                id: 5,
                title: 'วันแรงงานแห่งชาติ',
                start: new Date(2017, 4, 1),
                end: new Date(2017, 4, 1)
            }, 
            {
                id: 6,
                title: 'วันฉัตรมงคล',
                start: new Date(2017, 4, 5),
                end: new Date(2017, 4, 5)
            }, 
            {
                id: 7,
                title: 'วันวิสาขบูชา',
                start: new Date(2017, 4, 10),
                end: new Date(2017, 4, 10),
                linkUrl: 'event.html'
            }, 
            {
                id: 8,
                title: 'ชดเชยวันอาสาฬหบูชา',
                
                start: new Date(2017, 6, 10),
                end: new Date(2017, 6, 10)
            }, {
                id: 9,
                title: 'วันเฉลิมพระชนมพรรษา ร.10',
                
                start: new Date(2017, 6, 28),
                end: new Date(2017, 6, 28)
            },
            {
                id: 10,
                title: 'ชดเชยวันเฉลิมพระชนมพรรษา สมเด็จพระนางเจ้า พระบรมราชาชินีนาถ',
                
                start: new Date(2017, 7, 14),
                end: new Date(2017, 7, 14)
            },
            {
                id: 11,
                title: 'วันคล้ายวันสวรรคต ร.9',
                
                start: new Date(2017, 9, 13),
                end: new Date(2017, 9, 13)
            },
            {
                id: 12,
                title: 'วันปิยมหาราช',
                
                start: new Date(2017, 9, 23),
                end: new Date(2017, 9, 23)
            }, 
            {
                id: 13,
                title: 'วันพระราชพิธีถวายพระเพลิงพระบรมศพ ร.9',
                
                start: new Date(2017, 9, 26),
                end: new Date(2017, 9, 26)
            },
            {
                id: 14,
                title: 'วันเฉลิมพระชนมพรรษา พระบาทสมเด็จพระเจ้าอยู่หัว',
                
                color: '#000',
                start: new Date(2017, 11, 5),
                end: new Date(2017, 11, 5)
            }, 
            {
                id: 15,
                title: 'หยุดชดเชยวันพระราชทานรัฐธรรมนูญ',
                
                start: new Date(2017, 11, 11),
                end: new Date(2017, 11, 11)
            }, {
                id: 16,
                title: 'วันขึ้นปีใหม่',
                
                start: new Date(2018, 0, 1),
                end: new Date(2018, 0, 1)
            }, {
                id: 17,
                title: 'ชดเชยวันสิ้นปี (อาทิตย์ที่ 31 ธันวาคม 2560)',
                
                start: new Date(2018, 0, 2),
                end: new Date(2018, 0, 2)
            }, {
                id: 18,
                title: 'วันตรุษจีน',
               
                start: new Date(2018, 1, 15),
                end: new Date(2018, 1, 16)
            }, {
                id: 19,
                title: 'วันมาฆบูชา',
                
                start: new Date(2018, 2, 1),
                end: new Date(2018, 2, 1)
            }, {
                id: 20,
                title: 'วันพระบาทสมเด็จพระพุทธยอดฟ้าจุฬาโลกมหาราช และวันที่ระลึกมหาจักรีบรมราชวงศ์',
                
                start: new Date(2018, 3, 6),
                end: new Date(2018, 3, 6)
            }, {
                id: 21,
                title: 'วันสงกรานต์',
                
                start: new Date(2018, 3, 13),
                end: new Date(2018, 3, 13)
            }, {
                id: 22,
                title: 'ชดเชยวันสงการนต์',
                
                start: new Date(2018, 3, 16),
                end: new Date(2018, 3, 16)
            }, {
                id: 23,
                title: 'วันแรงงานแห่งชาติ',
                
                start: new Date(2018, 4, 1),
                end: new Date(2018, 4, 1)
            }, {
                id: 24,
                title: 'วันวิสาขบูชา',
                
                start: new Date(2018, 4, 29),
                end: new Date(2018, 4, 29)
            }, {
                id: 25,
                title: 'วันอาสาฬหบูชา',
                
                start: new Date(2018, 6, 27),
                end: new Date(2018, 6, 27)
            }, {
                id: 26,
                title: 'วันคล้ายวันเฉลิมพระชนมพรรษา พระบาทสมเด็จพระเจ้าอยู่หัวมหาวชิราลงกรณบดินทรเทพยวรางกูร',
                
                start: new Date(2018, 6, 30),
                end: new Date(2018, 6, 30)
            }, {
                id: 27,
                title: 'ชดเชยวันเฉลิมพระชนมพรรษา สมเด็จพระนางเจ้าพระบรมราชาชินีนาถในพระบาทสมเด็จพระปรมิทรมหาภูมิพลอดุลยเดช บรมนาถบพิตร',
                
                start: new Date(2018, 7, 13),
                end: new Date(2018, 7, 13)
            }, {
                id: 28,
                title: 'ชดเชยวันคล้ายวันสวรรคตพระบาทสมเด็จพระปรมินทรมหาภูมิพลอดุลยเดช บรมนาถบพิตร',
                
                start: new Date(2018, 9, 15),
                end: new Date(2018, 9, 15)
            }, {
                id: 29,
                title: 'วันปิยมหาราช',
                
                start: new Date(2018, 9, 23),
                end: new Date(2018, 9, 23)
            }, {
                id: 30,
                title: 'วันคล้ายวันเฉลิมพระชนมพรรษา พระบามสมเด็จพระปรมินทรมหาภูมิพลอดุลยเดช บรมนาถบพิตร วันชาติ และวันพ่อแห่งชาติ',
                
                start: new Date(2018, 11, 5),
                end: new Date(2018, 11, 5)
            }, {
                id: 31,
                title: 'วันพระราชทานรัฐธรรมนูญ',
                
                start: new Date(2018, 11, 10),
                end: new Date(2018, 11, 10)
            }, {
                id: 32,
                title: 'วันสิ้นปี',
                
                start: new Date(2018, 11, 31),
                end: new Date(2018, 11, 31)
            }
        ]
    });
    
});

</script>

@stop

@push('page_vendor')
<script src="{{asset('plugins/fullcalendar/fullcalendar.min.js')}}"></script>
@endpush
