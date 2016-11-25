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
    ],
];
