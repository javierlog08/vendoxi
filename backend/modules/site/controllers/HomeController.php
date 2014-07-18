<?php

namespace app\modules\site\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class HomeController extends Controller
{
	
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
    	
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
	
    public function actionIndex()
    {
        return $this->render('index');
    }
}
