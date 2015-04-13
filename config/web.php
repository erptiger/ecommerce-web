<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'tiger',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        	'transport' => [
        				'class' => 'Swift_SmtpTransport',
        				'host' => 'smtp.a8.com',
        				'username' => 'tiger.guo',
        				'password' => '******',
        				'port' => '25',
        				'encryption' => 'tls',
        		],
        	  'messageConfig' =>[
        	  		'charset' => 'UTF-8',
        	  		'from' => ['tiger.guo@a8.com'=>'yii admin'],
        	  ],
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
//                     'levels' => ['error', 'warning'],
                	'levels' => ['error', 'warning','info','trace','profile'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    	'urlManager' => [
    		'enablePrettyUrl' => true,
    		'showScriptName' => false,//隐藏index.php
    		//'enableStrictParsing' => false,
    		//'suffix' => '.html',//后缀
    		'rules' => [
    			//'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    			],
    	],
    	'i18n' => [
    			'translations' => [
    				'app*' => [
    							'class' => 'yii\i18n\PhpMessageSource',
    							//'basePath' => '@app/messages',
    							//'sourceLanguage' => 'en-US',
    							'fileMap' => [
    									'app' => 'app.php',
    									'app/error' => 'error.php',
    						],
    					],
    			],
    	],
    	'assetManager' => [
    			'bundles' => [
    					'yii\web\JqueryAsset' => [
    							'sourcePath' => null,   // 一定不要发布该资源
    							'js' => [
    									'js/jquery-1.10.2.js'
//     									'//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
    							]
    				],
    			],
    		],
    ],
	'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'params' => $params,
	'language' => 'zh-CN',
// 	'sourceLanguage' => 'zh-CN',	
	'timeZone' => 'PRC',
// 	'charset' => 'UTF-8',	
	'on beforeRequest' => function ($event) {
		//TODO:
		//var_dump($_REQUEST);
		//var_dump($_SERVER["REQUEST_URI"]);
		Yii::trace('http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"]);
		Yii::trace('beforeRequest.');
// 		var_dump($event);
	},
	'on afterRequest' => function ($event) {
		//TODO:־
		Yii::trace('afterRequest.');
	},
	'on beforeAction' => function ($event) {
		Yii::trace('beforeAction.');
	},
	'on afterAction' => function ($event) {
		Yii::trace('afterAction.');
	},
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
