<?php
namespace app\components\filters;

use Yii;
use yii\base\ActionFilter;

class AuthFilter extends ActionFilter{
	public function beforeAction($action){
		//var_dump($action);
		Yii::trace('AuthFilter beforeAction');
// 		Yii::$app->getSession()->get($key)
// 		Yii::$app->getRequest()->get($key);
// 		Yii::$app->response->redirect("/site/index");
// 		return true;		
// 		Yii::$app->controller->layout='@app/views/layouts/manager.php';
		return parent::beforeAction($action);
	}
	
	public function afterAction($action, $result){
		
		Yii::trace('AuthFilter afterAction');
		return parent::afterAction($action, $result);
	}
	
}