<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=pedramai_resume',
            'username' => 'pedramai_admin',
            'password' => '}%wguPClHC#[',
            'charset' => 'utf8',
            'tablePrefix'=>'tbl_',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
