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
    public static $fixture_file = 'mailchimp/tests/php/fixture.yml';

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
        $form = $this->objFromFixture('MailChimpTestSubscriberForm', 'one');
        $this->assertFalse($form->canEdit($this->objFromFixture('Member', 'cantcreate')));
        $this->assertTrue($form->canEdit($this->objFromFixture('Member', 'cancreate')));
    }

    /**
     *
     */
    public function testCanDelete()
    {
        $form = $this->objFromFixture('MailChimpTestSubscriberForm', 'one');
        $this->assertFalse($form->canDelete($this->objFromFixture('Member', 'cantcreate')));
        $this->assertTrue($form->canDelete($this->objFromFixture('Member', 'cancreate')));
    }

}
