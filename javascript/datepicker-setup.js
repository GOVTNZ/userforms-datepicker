(function(){

    'use strict';

    $( document ).ready(function() {

        $A.bind(window, 'load', function () {

            // Syntax : setCalendar( ID , TriggeringElement , TargetEditField , EnableComments , clickHandler , config )
            $('.accCalendar').each(function (i, e) {

                $A.setCalendar(
                    $(e).prev()[0].name + '-calendar',
                    e,
                    $(e).prev()[0],
                    false,
                    function (ev, dc, targ) {
                        targ.value = dc.range.current.year + '-' + pad(dc.range.current.month, 2) + '-' + pad(dc.range.current.wDay, 2);
                        dc.close();
                    },
                    {
                        // Set CSS positioning calculation for the calendar
                        autoPosition: 6,
                        // Customize with positive or negative offsets
                        offsetTop: -320,
                        offsetLeft: -170
                    });
            });

            function pad(num, size) {
                var s = "000000000" + num;
                return s.substr(s.length - size);
            }
        });

    });

})();


