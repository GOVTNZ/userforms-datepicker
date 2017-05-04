<div class="datepicker">
    <input $AttributesHTML<% if $RightTitle %>aria-describedby="{$Name}_right_title" <% end_if %>/>
    <a role="button" aria-describedby="date" href="#" id="dateIcon" class="accCalendar datePicker" aria-expanded="false">
        <img src="userforms-datepicker/javascript/bootstrap-jquery/img/calendar/calendar-button.svg" alt="Calendar" title="Calendar">
    </a>
    <div class="clear"></div>
</div>

<style>
    .datepicker {

    }

    .datepicker input {
        width: 90% !important;
        float: left;
    }

    .datepicker a {
        float: left;
        border-bottom: none !important;
    }

    .datepicker a img {
        height: 41px !important;
    }

    .datepicker .clear {
        clear: both;
    }
</style>