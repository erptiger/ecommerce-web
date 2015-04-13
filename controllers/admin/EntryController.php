<?php
namespace  app\controllers\admin;
use Yii;
use yii\web\Controller;
use app\models\entry\EntryForm;

class EntryController extends Controller{
	public function actionIndex(){
		$model = new EntryForm;
		
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			// 验证 $model 收到的数据
		
			// 做些有意义的事 ...
		
			return $this->render('result', ['model' => $model]);
		} else {
			// 无论是初始化显示还是数据验证错误
			return $this->render('index', ['model' => $model]);
		}
	}
}