<?php

namespace GovtNZ\SilverStripe\UserFormsDatePicker;

use SilverStripe\UserForms\Model\EditableFormField;
use SilverStripe\Forms\TextField;
use SilverStripe\View\Requirements;
use Mobile_Detect;

class AccdcDatepickerField extends EditableFormField
{

    private static $singular_name = 'Datepicker Field (accessible)';

    private static $plural_name = 'Datepicker Fields (accessible)';

    /**
     * @return TextField
     */
    public function getFormField()
    {
        $detect = new Mobile_Detect;

        $field = ( $detect->isMobile() )
            ? $this->getDesktopField()
            : $this->getDesktopField();
        $field->addExtraClass('datepickeraccessible');

        return $field;
    }

    /**
     * @return TextField
     */
    public function getMobileField()
    {
        Requirements::css('govtnz/silverstripe-userforms-datepicker:client/css/userform-datepicker-mobile.css');
        Requirements::javascript('govtnz/silverstripe-userforms-datepicker:client/javascript/moment.js');

        $field = TextField::create(
            $this->Name,
            $this->EscapedTitle,
            $this->Default
        )
            ->setFieldHolderTemplate('UserFormsField_holder')
            ->setTemplate('UserFormsDatePickerField-mobile');

        $this->doUpdateFormField($field);

        return $field;
    }

    /**
     * @return TextField
     */
    public function getDesktopField()
    {
        Requirements::combine_files('userform-datepicker.js',
            'govtnz/silverstripe-userforms-datepicker:client/javascript/bootstrap-jquery/js/Acc.DC.API.js',
            'govtnz/silverstripe-userforms-datepicker:client/javascript/bootstrap-jquery/js/modules/calendar_generator.js',
            'govtnz/silverstripe-userforms-datepicker:client/javascript/moment.js',
            'govtnz/silverstripe-userforms-datepicker:client/javascript/datepicker-setup.js'
        );

        Requirements::css('govtnz/silverstripe-userforms-datepicker:client/javascript/bootstrap-jquery/css/calendar.css');
        Requirements::css('govtnz/silverstripe-userforms-datepicker:client/css/userform-datepicker.css');

        $field = TextField::create(
            $this->Name,
            $this->EscapedTitle,
            $this->Default
        )
            ->setFieldHolderTemplate('UserFormsField_holder')
            ->setTemplate('UserFormsDatePickerField');

        $this->doUpdateFormField($field);

        return $field;
    }
}
