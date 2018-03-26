<?php

$params = array_merge(require(__DIR__ . '/params.php'), require(__DIR__ . '/pl_params.php'));

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'radio' => [
            'class' => 'app\modules\radio\Module',
        ],
        'deutsch' => [
            'class' => 'app\modules\deutsch\Module',
        ],
    ],
    'aliases' => [
        '@moduleDeutsch' => '@app/modules/deutsch',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'yjLbUCezwn7VpSOfN7qziNe6mDCnHgy2',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
            'forceCopy' => YII_DEBUG,
        ],
        'translater' => [
            'class' => 'app\components\TranslateHelper'
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
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        // DB components ***************************************
        'db' => require(__DIR__ . '/db.php'),
        'my_db' => require(__DIR__ . '/my_db.php'),
        'deutsch_db' => require(__DIR__ . '/deutsch_db.php'),

        // ******************************************************
        
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'item/add-like/<id:\d+>'   => 'item/add-like',
                'item/<alias>' => 'item/index',
                '<controller:\w+>/<id:\d+>'   => '<controller>/index',
                //'<controller:\w+>/<action:\w+>/<alias:[\w_\/-]+>'   => '<controller>/<action>/index',
                //'/<alias:\w+>' => 'site/item',
                //'<module:\w+>/<controller:\w+>/<id:\d+>'   => '<module>/<controller>',
                //'<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<controller:\w+>/<action:\w+>'   => '<controller>/<action>',


                //'<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
            ],

        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
        'newFileMode'=>0666,
        'newDirMode'=>0777,
    ];
}

return $config;
