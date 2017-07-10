<?php

/**
 * Class MailChimpTestSubscriberForm
 */
class MailChimpTestSubscriberForm extends MailChimpSubscriberForm implements TestOnly
{

    /**
     * @var array
     */
    private static $db = [
        'dummyField' => 'Boolean',
    ];

}