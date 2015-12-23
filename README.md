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

# Locale

If you'd like to use language except English, you need to set a lang file like this.

(in case of Japanese)

`app/lang/packages/ja/whoops-report/message.php`

    <?php
    
    return [
        'title' => 'エラーが発生しました。',
        'description' => 'ご不便をお掛けしまして申し訳ございません。以下に不具合の状況をできるだけ詳細にご記入し送信してください。',
        'button' => '報告する',
        'confirm' => 'バグ報告を送信します。よろしいですか?',
        'complete' => 'バグ報告が送信されました。ご協力ありがとうございました。',
    ];

# Note

I guess that you might need to check authorized in routes.php.


# License

This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh