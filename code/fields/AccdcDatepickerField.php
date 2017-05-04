<?php

class AccdcDatepickerField extends EditableFormField {

    private static $singular_name = 'Datepicker Field (accessible)';

    private static $plural_name = 'Datepicker Fields (accessible)';

    public function getCMSFields()
    {

        return parent::getCMSFields();
    }

    public function getFormField()
    {
        Requirements::javascript(USERFORMS_DATEPICKER_DIR . '/javascript/bootstrap-jquery/js/Acc.DC.API.js');
        Requirements::javascript(USERFORMS_DATEPICKER_DIR . '/javascript/bootstrap-jquery/js/modules/calendar_generator.js');
        Requirements::javascript(USERFORMS_DATEPICKER_DIR . '/javascript/datepicker-setup.js');

        Requirements::css(USERFORMS_DATEPICKER_DIR . '/javascript/bootstrap-jquery/css/calendar.css');

        $field = TextField::create(
            $this->Name,
            $this->EscapedTitle,
            $this->Default)
            ->setFieldHolderTemplate('UserFormsField_holder')
            ->setTemplate('UserFormsDatePickerField')
            ;
        $this->doUpdateFormField($field);

        return $field;
    }
}
