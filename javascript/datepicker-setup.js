(function(){

    'use strict';

    $( document ).ready(function() {


        $A.bind(window, 'load', function(){

            // Syntax : setCalendar( ID , TriggeringElement , TargetEditField , EnableComments , clickHandler , config )
            $('.accCalendar').each(function(i, e) {

                $A.setCalendar(
                    $(e).prev()[0].name + '-calendar',
                    e,
                    $(e).prev()[0],
                    false,
                    function(ev, dc, targ){
                        // targ is the Input field with id="date"
                        // Save the desired date string
                        targ.value = dc.range.wDays[dc.range.current.wDay].lng + ' ' + dc.range[dc.range.current.month].name + ' '
                            + dc.range.current.mDay + ', ' + dc.range.current.year;

                        targ.value = dc.range.current.year + '-' + pad(dc.range.current.month, 2) + '-' + pad(dc.range.current.wDay, 2);

                        // Then close the date picker
                        dc.close();
                    },
                    {
                        // Set CSS positioning calculation for the calendar
                        autoPosition: 10,
                        // Customize with positive or negative offsets
                        offsetTop: 50,
                        offsetLeft: -300
                    });
            });

            function pad(num, size) {
                var s = "000000000" + num;
                return s.substr(s.length-size);
            }

            /*
            $A.setCalendar('UniqueCalendarId', document.getElementById('dateIcon'), document.getElementById('date'), false,
                function(ev, dc, targ){
                    // targ is the Input field with id="date"
                    // Save the desired date string
                    targ.value = dc.range.wDays[dc.range.current.wDay].lng + ' ' + dc.range[dc.range.current.month].name + ' '
                        + dc.range.current.mDay + ', ' + dc.range.current.year;

                    // Then close the date picker
                    dc.close();
                },
                {
                    // Set CSS positioning calculation for the calendar
                    autoPosition: 3,
                    // Customize with positive or negative offsets
                    offsetTop: 0,
                    offsetLeft: 5
                });
                */
        });



    });

})();


