<?php
namespace  app\controllers;
use Yii;
use yii\web\Controller;
use app\models\entry\EntryForm;
use app;
use yii\filters\VerbFilter;
use app\components\filters\AuthFilter;
use yii\db\Connection;


class EntryController extends Controller{
	
	public function behaviors()
	{
		return [
				'verbs' => [
						'class' => VerbFilter::className(),
						'actions' => [
								'index'  => ['get','post'],
								'view'   => ['get'],
								'create' => ['get', 'post'],
								'update' => ['get', 'put', 'post'],
								'delete' => ['post', 'delete'],
						],
				],
				'auth' =>[
						'class' => AuthFilter::className(),
				],
		];
	}	 
	
	
	public function actionIndex(){
		header("Content-Type: text/html; charset=utf-8");
		$model = new EntryForm;
// 		$this->layout='@app/views/layouts/manager.php';
// 		$request = Yii::$app->request;
// 		echo ($request->post("EntryForm")["name"]);
// 		Yii::$app->language='zh-CN';
		Yii::warning("test warning");
		
		/* $connection =Yii::$app->db;				
		$connection->open();
		$tables= $connection->schema->getTableNames();		
		$command = $connection->createCommand("select * from t_drp_material_type where id = :id");
// 		$command->addColumn($table, $column, $type)
// 		$command->createTable($table, $columns)
		$command->bindValue(":id", 1);
		$results= $command->query();
		$connection->close(); */
		
		
		
		
		/* $trans = $connection->beginTransaction();
		try {
			
			$trans->commit();
		} catch (Exception $e) {
			$trans ->rollBack();
		} */
		
		
		
		
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			// 验证 $model 收到的数据
			var_dump(Yii::$app->request->post());
			// 做些有意义的事 ...
			/* foreach ($model as $key => $value) {
				echo $key.'->'.$value.'</br>';
			} */			
			
			return $this->render('result', ['model' => $model]);
		} else {
			// 无论是初始化显示还是数据验证错误
// 			return $this->render('adminIndex', ['model' => $model]);
// 			throw new \yii\web\NotFoundHttpException;
// 			$xx = new \yii\web\User();
// 			$this->ren
// 			return $this->renderPartial('index', ['model' => $model]);
			return $this->renderAjax('index', ['model' => $model]);
// 			return $this->renderContent("AAAAA");
			
// 			return $this->render('index', ['model' => $model]);
		}
	}
	
	public function actionAddUser($id=null){
		Yii::info("parameter id is $id");
		$model = new EntryForm;	
		return $this->render('index', ['model' => $model]);
	}
	
	public function actionAddUsers(array $id=null){
// 		Yii::trace("parameter id is $id");
		$this->layout='@app/views/layouts/manager.php';
		var_dump($id);
		$model = new EntryForm;
		return $this->render('index', ['model' => $model]);
	}
	
}