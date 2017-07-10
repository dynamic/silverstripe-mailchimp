<?php

/**
 * Class MailChimpTestPage
 */
class MailChimpTestPage extends Page implements TestOnly
{

}

/**
 * Class MailChimpTestPage_Controller
 */
class MailChimpTestPage_Controller extends Page_Controller implements TestOnly
{

    /**
     * @var array
     */
    private static $extensions = [
        'MailChimpControllerExtension',
    ];

}