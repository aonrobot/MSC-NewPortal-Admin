$(function() {
    'use strict';

    //For Event Valentine
    //

    var engine = new Bloodhound({
        remote: {
            url: 'valentine/find?q=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    engine.initialize();

    $("#scrollable-dropdown-menu .typeahead-input").typeahead({
        //hint: true,
        highlight: true,
        minLength: 1
    }, {
        displayKey: 'EmpCode',
        source: engine.ttAdapter(),

        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        name: 'usersList',
        limit: 10,

        display: function(item){ return item.EmpCode+'– @'+ item.FirstName + ' ' + item.LastName +' ('+item.NickName+')'},

        // the key from the array we want to display (name,id,email,etc...)
        templates: {
            empty: [

                '<div class="list-group search-results-dropdown"><div class="list-group-item">ค้นหาไม่พบ.</div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                var img_link = 'http://appmetro.metrosystems.co.th/empimages/' + parseInt(data.EmpCode) + '.jpg?' + Math.floor((Math.random() * 10000) + 1)

                return '<a class="list-group-item">'+
                            '<img src="'+ img_link +'" class="img-reponsive" height="80"><br><br>'+
                            data.NickName + ' - ' + data.OrgUnitName    +
                         '</a>'
            }
        }
    });

    $('#sendHeart').click(function(){

        $.get("valentine/store",{sendToId: $('#inputHeart').val()})
            .done(function(data){
                data = JSON.parse(data);

                if(data.type == 1)
                    swal("ส่งหัวใจเรียบร้อยแล้ว", ":)", "success");
                else
                    swal("ส่งหัวใจไม่สำเร็จ", data.message, "error");
            })
     });

    //
    //End For Event Valentine
});