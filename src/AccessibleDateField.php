<?php

namespace GovtNZ\SilverStripe\UserFormsDatePicker;

use SilverStripe\UserForms\Model\EditableFormField;
use SilverStripe\Forms\TextField;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Core\Manifest\ModuleResourceLoader;
use SilverStripe\View\Requirements;
use Mobile_Detect;

class AccessibleDateField extends TextField
{
    public function Field($properties = [])
    {
        $detect = new Mobile_Detect;

        if ($detect->isMobile()) {
            $this->prepareMobileField();
        } else {
            $this->prepareDesktopField();
        }
        
        $this->addExtraClass('datepickeraccessible');
        $this->setAttribute('type', 'text');

        return parent::Field($properties);
    }
    
    public function prepareMobileField()
    {
        Requirements::css('govtnz/silverstripe-userforms-datepicker:client/css/userform-datepicker-mobile.css');
        Requirements::javascript('govtnz/silverstripe-userforms-datepicker:client/javascript/moment.js');

        $this->setFieldHolderTemplate('UserFormsField_holder');
        $this->setTemplate('UserFormsDatePickerField-mobile');
    }

    public function prepareDesktopField()
    {
        $loader = Injector::inst()->get(ModuleResourceLoader::class);

        Requirements::combine_files('userform-datepicker.js', [
            $loader->resolvePath('govtnz/silverstripe-userforms-datepicker:client/javascript/bootstrap-jquery/js/Acc.DC.API.js'),
            $loader->resolvePath('govtnz/silverstripe-userforms-datepicker:client/javascript/bootstrap-jquery/js/modules/calendar_generator.js'),
            $loader->resolvePath('govtnz/silverstripe-userforms-datepicker:client/javascript/moment.js'),
            $loader->resolvePath('govtnz/silverstripe-userforms-datepicker:client/javascript/datepicker-setup.js')
        ]);

        Requirements::css('govtnz/silverstripe-userforms-datepicker:client/javascript/bootstrap-jquery/css/calendar.css');
        Requirements::css('govtnz/silverstripe-userforms-datepicker:client/css/userform-datepicker.css');

        $this->setFieldHolderTemplate('UserFormsField_holder');
        $this->setTemplate('UserFormsDatePickerField');
    }
}
