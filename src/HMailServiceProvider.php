<?php
namespace YHShanto\HMailer;

use Illuminate\Mail\MailServiceProvider;
use YHShanto\HMailer\Mail\HMailTransport;

class HMailServiceProvider extends MailServiceProvider
{
	
	function registerSwiftMailer()

	{
	    if ($this->app['config']['mail.driver'] == 'hmail') {

	        $this->registerHMailSwiftMailer();

	    } else {

	        parent::registerSwiftMailer();

	    }
	}

	function registerHMailSwiftMailer()

	{

	    $this->app->singleton('swift.mailer', function ($app) {
            return new \Swift_Mailer(new HMailTransport());
        });

	}
}