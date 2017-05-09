(function(){

    'use strict';

    $( document ).ready(function() {

        $A.bind(window, 'load', function () {

            // Syntax : setCalendar( ID , TriggeringElement , TargetEditField , EnableComments , clickHandler , config )
            $('.accCalendar').each(function (i, e) {

                var input = $(e).prev()[0],
                    formatted = $(input).prev()[0],
                    inputFormat = $(input).attr('data-date-inputformat'),
                    displayFormat = $(input).attr('data-date-displayformat'),
                    id = input.name + '-calendar';

                // switch names between input field and hidden field
                formatted.name = input.name;
                input.name = formatted.name + '_u';

                $A.setCalendar(
                    id,
                    e,
                    input,
                    false,
                    function (ev, dc, targ) {
                        var gen = $(targ).prev()[0];
                        gen.value = moment(dc.date).format('YYYY-MM-DD');
                        targ.value = moment(dc.date).format(displayFormat);

                        dc.close();
                    }, {
                        // Set CSS positioning calculation for the calendar
                        autoPosition: 6,
                        // Customize with positive or negative offsets
                        offsetTop: -320,
                        offsetLeft: -170
                    });

                $($(e).prev()[0]).focusout(function(e) {
                    var elem = $(e.target),
                        target = $(e.target).prev()[0],
                        value = elem.val();

                    target.value = value;
                    var m = moment(value, [inputFormat, displayFormat], true);
                    if (m.isValid()) {
                        elem[0].value = m.format(displayFormat);
                        target.value = m.format('YYYY-MM-DD');
                    }
                });
            });

        });

    });

})();
