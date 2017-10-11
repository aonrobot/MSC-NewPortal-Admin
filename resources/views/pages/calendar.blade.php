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
            }
        ]
    });
    
});

</script>

@stop

@push('page_vendor')
<script src="{{asset('plugins/fullcalendar/fullcalendar.min.js')}}"></script>
@endpush
