# WhoopsReport
A Laravel package to send a report when occurring bug.(for Laravel 4.2)

![Whoops Report](http://i.imgur.com/yG4arHk.png)


# Installation

Add this package name in composer.json

    "require": {
      "sukohi/whoops-report": "1.*"
    }

Execute composer command.

    composer update

Register the service provider in app.php

    'providers' => array(  
        ...Others...,  
        'Sukohi\WhoopsReport\WhoopsReportServiceProvider',
    )

Also alias

    'aliases' => array(  
        ...Others...,  
        'WhoopsReport' => 'Sukohi\WhoopsReport\Facades\WhoopsReport',
    )

# Preparation

Set routes in your routes.php

(in routes.php)

    Route::post('whoops-report', array('as' => 'whoops-report', function()
    {
        return WhoopsReport::send('YOUR-MAIL@example.com');
    }));
    
    App::error(function(Exception $exception, $code)
    {
        return WhoopsReport::view($exception);
    });
    
That's all.

# About cc and bcc

You also can set cc and/or bcc email addresses like this.

	return WhoopsReport::send('YOUR-MAIL@example.com', [
		'cc' => ['cc1@example.com'],
		'bcc' => ['bcc1@example.com'],
	]);

# Note

I guess that you might need to check authorized in routes.php.


# License

This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh