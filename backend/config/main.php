<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'site/home/index',
    'bootstrap' => ['log'],
    'modules' => [
        'auth' => [
            'class' => 'app\modules\auth\AuthModule',
        ],
        'site' => [
            'class' => 'app\modules\site\SiteModule',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'backend\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['auth/user/login'],
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
        'errorHandler' => [
            'errorAction' => '/auth/user/error',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                	'@app/views'   => '@backend/themes/metronic/modules/site/views',
                    '@app/modules' => '@backend/themes/metronic/modules',
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
         'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'params' => $params,
];
