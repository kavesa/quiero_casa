<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),  
    'controllerNamespace' => 'api\controllers',  
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'
        ],
        'oauth2' => [
            'class' => 'filsh\yii2\oauth2server\Module',            
            'tokenParamName' => 'accessToken',
            'tokenAccessLifetime' => 3600 * 24,
            'storageMap' => [
                'user_credentials' => 'common\models\User',
            ],
            'grantTypes' => [
                'user_credentials' => [
                    'class' => 'OAuth2\GrantType\UserCredentials',
                ],
                'refresh_token' => [
                    'class' => 'OAuth2\GrantType\RefreshToken',
                    'always_issue_new_refresh_token' => true
                ]
            ]
        ]
    ],
    'components' => [        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableSession' => false,
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'format' => yii\web\Response::FORMAT_JSON
        ],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                'POST /oauth2/<action:\w+>' => 'oauth2/default/<action>',
                // CRUD Controllers
                'HEAD <apiv:v\d+>/<controller:\w+>'              => '<apiv>/<controller>/index',
                'GET <apiv:v\d+>/<controller:\w+>'               => '<apiv>/<controller>/index',
                'HEAD <apiv:v\d+>/<controller:\w+>/<id:(\d(\,\d)*)+>'   => '<apiv>/<controller>/view',
                'GET <apiv:v\d+>/<controller:\w+>/<id:(\d(\,\d)*)+>'    => '<apiv>/<controller>/view',
                'POST <apiv:v\d+>/<controller:\w+>'              => '<apiv>/<controller>/create', 
                'PUT <apiv:v\d+>/<controller:\w+>/<id:(\d)+>'    => '<apiv>/<controller>/update',
                'PATCH <apiv:v\d+>/<controller:\w+>/<id:(\d)+>'  => '<apiv>/<controller>/update',
                'DELETE <apiv:v\d+>/<controller:\w+>/<id:(\d(\,\d)*)+>' => '<apiv>/<controller>/delete',  
                //'POST <apiv:v\d+>/user' => '<apiv>/user/create',
            ],
        ],
    ],
    'params' => $params,
];