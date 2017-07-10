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

    public function setUp()
    {
        parent::setUp();

        /*$form = MailChimpTestSubscriberForm::create();
        $form->Title = 'Form One';
        $form->ListID = '76ac48ccc2';
        $form->write();

        $page = MailChimpTestPage::create();
        $page->Title = 'Test MailChimp Page';
        $page->MailChimpFormID = $form->ID;
        $page->writeToStage('Stage');
        $page->doPublish();*/
    }

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

}
