<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
	    'admin' => [
	        'class' => 'mdm\admin\Module',
	    ],
        'v1' => [
            'class' => 'api\modules\v1\Module',
            // ... other configurations for the module ...
        ],
	],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
        	'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
    	],
    	'user' => [
    		//'class' => 'common\models\User',
	        'identityClass' => 'mdm\admin\models\User',
	        'loginUrl' => ['admin/user/login'],
    	],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'itfuno@gmail.com',
                'password' => 'ka104080',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
    ],
];
