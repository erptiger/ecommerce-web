<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
    	//committed by tiger.guo 150413
        return $this->render('index');
    }
}
