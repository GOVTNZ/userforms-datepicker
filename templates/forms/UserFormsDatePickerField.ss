<div class="datepicker-desktop">
    <div class="inline-details">
        <noscript>
            Enter a date in the following format YYYY-MM-DD.
        </noscript>
    </div>

    <input type="hidden" name="{$Name}_formatted" >
    <input data-date-inputformat="D/M/YYYY"
           data-date-displayformat="DD/MM/YYYY"
           data-date-inputmask="99/99/9999"
           type="text"
           name="{$Name}"
           id="{$Id}"
        <% if $RightTitle %>aria-describedby="{$Name}_right_title" <% end_if %>/>

    <a role="button" aria-describedby="date" href="#" id="dateIcon" class="accCalendar datePicker" aria-expanded="false">
        <img src="userforms-datepicker/javascript/bootstrap-jquery/img/calendar/calendar-button.svg" alt="Calendar" title="Calendar">
    </a>
    <div class="clear"></div>
</div>