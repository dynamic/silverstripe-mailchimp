<?php

/**
 * Class MailChimpSubscriberFormTest
 *
 * @mixin PHPUnit_Framework_TestCase
 */
class MailChimpSubscriberFormTest extends SapphireTest
{

    /**
     * @var string
     */
    public static $fixture_file = 'mailchimp/tests/fixture.yml';

    protected $extraDataObjects = array(
        'MailChimpTestSubscriberForm',
        'MailChimpTestPage',
    );

    /**
     *
     */
    public function testCanCreate()
    {
        $form = Injector::inst()->get('MailChimpTestSubscriberForm');

        $this->assertFalse($form->canCreate($this->objFromFixture('Member', 'cantcreate')));
        $this->assertTrue($form->canCreate($this->objFromFixture('Member', 'cancreate')));
    }

    /**
     *
     */
    public function testCanEdit()
    {
        $form = MailChimpTestSubscriberForm::get()->first();
        $this->assertFalse($form->canEdit($this->objFromFixture('Member', 'cantcreate')));
        $this->assertTrue($form->canEdit($this->objFromFixture('Member', 'cancreate')));
    }

    /**
     *
     */
    public function testCanDelete()
    {
        $form = MailChimpTestSubscriberForm::get()->first();
        $this->assertFalse($form->canDelete($this->objFromFixture('Member', 'cantcreate')));
        $this->assertFalse($form->canDelete($this->objFromFixture('Member', 'cancreate')));

        $newForm         = MailChimpTestSubscriberForm::create();
        $newForm->Title  = 'Not used';
        $newForm->ListID = '012345';
        $newForm->write();

        $this->assertTrue($newForm->canDelete($this->objFromFixture('Member', 'cancreate')));
    }

    /**
     *
     */
    public function testCanView()
    {
        $this->assertTrue(Injector::inst()->get('MailChimpSubscriberForm')->canView());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        /*$newFields = Injector::inst()->get('MailChimpSubscriberForm')->getCMSFields();

        $this->assertNull($newFields->dataFieldbyName('FieldsToShow'));
        $this->assertNull($newFields->dataFieldbyName('InterestCategoriesToShow'));
        $this->assertNull($newFields->dataFieldbyName('Pages'));

        $existing = $this->objFromFixture('MailChimpTestSubscriberForm', 'one');
        $fields   = $existing->getCMSfields();

        $this->assertInstanceOf('CheckboxsetField', $fields->dataFieldbyName('FieldsToShow'));
        $this->assertInstanceOf('CheckboxsetField', $fields->dataFieldbyName('InterestCategoriesToShow'));
        $this->assertInstanceOf('GridField', $fields->dataFieldbyName('Pages'));
        //*/
    }

    /**
     *
     */
    public function testGetCMSValidator()
    {
        $this->assertInstanceOf('RequiredFields', Injector::inst()->get('MailChimpSubscriberForm')->getCMSValidator());
        $this->assertTrue(Injector::inst()->get('MailChimpSubscriberForm')->getCMSValidator()->fieldIsRequired('ListID'));
    }

    /**
     *
     */
    public function testGetMergeFormFields()
    {
        /*$form        = $this->objFromFixture('MailChimpTestSubscriberForm', 'one');
        $mergeFields = $form->getMergeFormFields();

        $this->assertTrue(is_array($mergeFields));
        $this->assertEquals(2, count($mergeFields));

        foreach ($mergeFields as $field) {
            $this->assertInstanceOf('FormField', $field);
        }
        //*/
    }

    /**
     *
     */
    public function testGetInterestCategoryFields()
    {
        /*$form           = $this->objFromFixture('MailChimpTestSubscriberForm', 'one');
        $interestFields = $form->getInterestCategoryFields();

        $this->assertTrue(is_array($interestFields));
        $this->assertEquals(3, count($interestFields));

        foreach ($interestFields as $field) {
            $this->assertInstanceOf('FormField', $field);
        }
        //*/
    }

    /**
     *
     */
    public function testProvidePermissions()
    {
        $expected = [
            'MailChimp_create' => 'Create MailChimp Form',
            'MailChimp_edit'   => 'Edit MailChimp Form',
            'MailChimp_delete' => 'Delete MailChimp Form',
        ];
        $this->assertEquals($expected, Injector::inst()->get('MailChimpSubscriberForm')->providePermissions());
    }

}
