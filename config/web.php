<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'a',
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'sourcePath' => null,
                    'js'=>['https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js']
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null,
                    'css' => ['https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'],
                ],
                'app\assets\AdminLte' => [
                    'sourcePath' => null,
                    'baseUrl' => 'https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.6/'
                ],
                'app\assets\FontAwesome' => [
                    'sourcePath' => null,
                    'css' => [
                        'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',
                    ]
                ],
                'common\assets\Html5shiv' => [
                    'sourcePath' => null,
                    'css' => [
                        'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js',
                    ]
                ],
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => ['https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js',]
                ],

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
    ];
}

return $config;
