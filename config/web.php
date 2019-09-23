<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        //'@bower' => '@vendor/bower-asset',
        //'@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'pQTsQxuQPjQZ2hHM47Fo9IYas44oXcal',
        ],
        /*'connectionManager'=>[
            'poolConfig'=>[
                'mysql'=>[
                    //池容量
                    'maxActive'=>10,
                    //当链接数满时,重新获取的等待时间,秒为单位
                    'waitTime'=> 0.01
                ],
                'redis'=>[
                    //池容量
                    'maxActive'=>10,
                    //当链接数满时,重新获取的等待时间,秒为单位
                    'waitTime'=> 0.01
                ],
            ],
    ],*/
        'session' => [
            //默认cache
            'class' => 'yii\web\CacheSession',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
            'dataTimeout' => 5,//数据传输超时时长
        ],
        'queue' => [
            'class' => yii\queue\amqp_interop\Queue::class,
            'port' => 5672,
            'user' => 'admin',
            'password' => 'admin',
            'queueName' => 'queue_test',
            'driver' => yii\queue\amqp_interop\Queue::ENQUEUE_AMQP_LIB,
            'dsn' => 'amqp://guest:guest@localhost:5672/%2F',
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
        'sentry' => [
            'class' => 'mito\sentry\Component',
            'dsn' => 'https://8135ad576885456fbe57eecab9191e52@sentry.io/1757421', // private DSN
            'environment' => 'staging', // if not set, the default is `production`
            'jsNotifier' => true, // to collect JS errors. Default value is `false`
            'jsOptions' => [ // raven-js config parameter
                'whitelistUrls' => [ // collect JS errors from these urls
                    'http://staging.my-product.com',
                    'https://my-product.com',
                ],
            ],
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'mito\sentry\Target',
                    'levels' => ['error', 'warning'],
                    'except' => [
                        'yii\web\HttpException:404',
                    ],
                ],
            ],
        ],
        /*'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],*/
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
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
