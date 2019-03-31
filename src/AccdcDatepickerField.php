<?php

namespace GovtNZ\SilverStripe\UserFormsDatePicker;

use SilverStripe\UserForms\Model\EditableFormField;
use SilverStripe\Forms\TextField;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Core\Manifest\ModuleResourceLoader;
use SilverStripe\View\Requirements;
use Mobile_Detect;

class AccdcDatepickerField extends EditableFormField
{

    private static $singular_name = 'Datepicker Field (accessible)';

    private static $plural_name = 'Datepicker Fields (accessible)';

    private static $table_name = 'AccdcDatepickerField';
    
    /**
     * @return TextField
     */
    public function getFormField()
    {
        $field = Injector::inst()->create(AccessibleDateField::class);
        $this->doUpdateFormField($field);

        return $field;
    }
}
