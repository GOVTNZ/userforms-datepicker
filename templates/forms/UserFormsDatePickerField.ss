<div class="datepicker-desktop">
    <div class="inline-details">
        <noscript>
            Enter a date in the following format YYYY-MM-DD.
        </noscript>
    </div>

    <input type="hidden" name="{$Name}_formatted" >
    <input data-date-inputformat="D/M/YYYY"
           data-date-displayformat="DD/MM/YYYY"
           type="text"
           name="{$Name}"
           id="{$Id}"
           placeholder="e.g. 27/3/1972"
        <% if $RightTitle %>aria-describedby="{$Name}_right_title" <% end_if %>/>

    <a role="button" aria-describedby="{$Id}" href="#" id="dateIcon_{$Id}" class="accCalendar datePicker" aria-expanded="false">
        <img src="userforms-datepicker/javascript/bootstrap-jquery/img/calendar/calendar-button.svg"
             alt="You can use this calendar to pick a date"
             title="You can use this calendar to pick a date">
    </a>
    <div class="clear"></div>
</div>