<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
	'defaultRoute' => 'main',
	'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
		'cabinet' => [
            'class' => 'app\modules\cabinet\Module',
        ],
    ],
    'components' => [
		'mail' => [
            'class'            => 'zyx\phpmailer\Mailer',
            'viewPath'         => '@common/mail',
            'useFileTransport' => false,
            'config'           => [
                'mailer'     => 'smtp',
                'host'       => 'mail.smartmail.club',
                'port'       => '465',
                'smtpsecure' => 'ssl',
                'smtpauth'   => true,
                'username'   => 'test2@sofona.info',
                'password'   => 'GW6k3zs2SSI',
				'ishtml' 	 => true,
				'charset' 	 => 'UTF-8',
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
		
		'common' => [
			'class' => 'frontend\components\Common',
		],
		
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
			'loginUrl' => '/main/main/login',
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            'errorAction' => 'site/error',
        ],
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
