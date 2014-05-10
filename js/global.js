/**
 * Created by clen on 1/29/14.
 */


var urlParams;


$(window).load(function() {

    $(document).ready(function() {
        $('.top-bar').scrollToFixed();
    });


});

function clearMe() {

    var form = document.getElementById("formPost");
    form.reset();

    /* var e = document.getElementById('sendTo');
     document.getElementById("myList").innerHTML = "";
     alert(e.options[e.selectedIndex].value);*/
}

$(function () {

    $(window).load(function() {


        window.prettyPrint && prettyPrint();
        $('#dp01').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp02').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp03').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp04').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp05').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp06').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp07').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp08').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp09').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp10').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp11').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp12').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp13').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp14').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp15').fdatepicker({
            format: 'mm/dd/yyyy'
        });
        $('#dp16').fdatepicker({
            closeButton: true
        });
        $('#dp17').fdatepicker();
        $('#dp18').fdatepicker();
        $('#dp-margin').fdatepicker();
        $('#dpYears').fdatepicker();
        $('#dpMonths').fdatepicker();
        var startDate = new Date(2012, 1, 20);
        var endDate = new Date(2012, 1, 25);
        $('#dp19').fdatepicker()
            .on('changeDate', function (ev) {
                if (ev.date.valueOf() > endDate.valueOf()) {
                    $('#alert').show().find('strong').text('The start date can not be greater then the end date');
                } else {
                    $('#alert').hide();
                    startDate = new Date(ev.date);
                    $('#startDate').text($('#dp4').data('date'));
                }
                $('#dp4').fdatepicker('hide');
            });
        $('#dp20').fdatepicker()
            .on('changeDate', function (ev) {
                if (ev.date.valueOf() < startDate.valueOf()) {
                    $('#alert').show().find('strong').text('The end date can not be less then the start date');
                } else {
                    $('#alert').hide();
                    endDate = new Date(ev.date);
                    $('#endDate').text($('#dp5').data('date'));
                }
                $('#dp20').fdatepicker('hide');
            });
        // implementation of disabled form fields
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        var checkin = $('#dpd1').fdatepicker({
            onRender: function (date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
                if (ev.date.valueOf() > checkout.date.valueOf()) {
                    var newDate = new Date(ev.date)
                    newDate.setDate(newDate.getDate() + 1);
                    checkout.setValue(newDate);
                }
                checkin.hide();
                $('#dpd2')[0].focus();
            }).data('datepicker');
        var checkout = $('#dpd2').fdatepicker({
            onRender: function (date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
                checkout.hide();
            }).data('datepicker');

    });

});



(window.onpopstate = function () {
    var match,
        pl     = /\+/g,  // Regex for replacing addition symbol with a space
        search = /([^&=]+)=?([^&]*)/g,
        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
        query  = window.location.search.substring(1);

    urlParams = {};
    while (match = search.exec(query))
        urlParams[decode(match[1])] = decode(match[2]);
})();

