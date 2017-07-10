<?php

/**
 * Class MailChimpSubscriberDataExtension
 */
class MailChimpSubscriberDataExtension extends DataExtension
{

    /**
     * @var array
     */
    private static $has_one = [
        'MailChimpForm' => 'MailChimpSubscriberForm',
    ];

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.Main',
            DropdownField::create('MailChimpFormID')
                ->setTitle('MailChimp Form')
                ->setSource(MailChimpSubscriberForm::get()->sort('Title')->map('ID', 'Title'))
                ->setEmptystring('Select MailChimp Form'),
            'Content'
        );
    }

}