<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/home/index',
    'modules' => [
        'site' => [
            'class' => 'app\modules\site\SiteModule',
        ],
    ],    
    'components' => [
        'view' => [
        	'theme' => [
            	'pathMap' => [
                	'@app/views' 	=> '@app/themes/metronic/modules/site/views',
                	'@app/modules' 	=> '@app/themes/metronic/modules',
            	],
        	],
    	],     
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
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
            'errorAction' => 'site/home/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],       	 
    ],
    'params' => $params,
];
