<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\DrpMaterialType;
use app\models\DrpMaterialTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\JsonParser;

/**
 * DrpMaterialTypeController implements the CRUD actions for DrpMaterialType model.
 */
class DrpMaterialTypeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionTest(){
    	$this->layout='@app/views/layouts/manager.php';    	
    	$connection = Yii::$app->db;    	
    	$trans=$connection->beginTransaction();    	
    	try {
    		$model = new DrpMaterialType();
    		$model->code='010104';
    		$model->name='图书四';
    		/* if(!$model->validate()){
    			echo 'validate error';
    			return;
    		} */
    		if(!$model->save()){
    			echo 'validate error';
    			$trans->rollBack();
    		}   		
    		
    		1/0;
    		
    		$model = new DrpMaterialType();
    		$model->code='010105';
    		$model->name='图书五';
    		if(!$model->save()){
    			$trans->rollBack();
    			echo 'validate error';
    		}    		
    		
    		$trans->commit();
    	} catch (\Exception $e) {
    		$trans->rollBack();
    		throw $e;
    	}   	
//     	var_dump($model->errors) ;		  	   	
    	return $this->renderContent("test");    	
    }
    
    public function actionTestShow(){
    	$query = (new \yii\db\Query())->select("a.*")->from("t_drp_material_type a")->leftJoin ("t_drp_material b", "a.id = b.material_type_id")->where("a.id=9");
    	$command = $query->createCommand();
    	$model = $command->queryOne();
//     	header("Content-type:json/application;charset=utf-8");
//     	echo(Json::encode($model));
//     	    	var_dump($model) ;
//     	    	return $this->render('test');
//has errors.
    		return $this->render('test',['model'=>$model]);
    }
    
    public function actionTestView(){
//     	$this->layout='@app/views/layouts/manager.php';
//     	$model = DrpMaterialType::findOne(8);
    	/* if ($model === null) {
    		throw new NotFoundHttpException;
    	}
    	$model->delete(); */
    	/* $model = DrpMaterialType::findOne(["id"=>8]);
    	$model->name='修改商品';
    	$model->update(); */    	
    	
//     	$model = DrpMaterialType::find ()->orderBy ( [
//     			"id" => SORT_ASC,
//     			"name" => SORT_ASC
//     	] )->joinWith("drpMaterials")->where(DrpMaterialType::tableName().'.id=8')->offset ( 0 )->limit ( 10 )->asArray ()->one();
    	
//     	$model = DrpMaterialType::find ()->orderBy ( [
//     			"id" => SORT_ASC,
//     			"name" => SORT_ASC
//     	] )->joinWith("drpMaterials")->where('t_drp_material.id=8')->offset ( 0 )->limit ( 10 )->asArray ()->all ();
    	
//     	$model = DrpMaterialType::findBySql ("select a.* from t_drp_material_type a")->all();
    	
//     	$model = DrpMaterialType::findBySql ("select a.* from t_drp_material_type a")->leftJoin ("t_drp_material b", "a.id = b.material_type_id1" )->offset(1)->limit(3)->all();
//     	$model = DrpMaterialType::findBySql ("select * from t_drp_material_type a")->where("id=9")->leftJoin ("t_drp_material b", "a.id = b.material_type_id1" )->offset(1)->limit(3)->all();
//     	$model = DrpMaterialType::find()->asArray()->all();
//     	$model = DrpMaterialType::findAll(["id"=>8]);
    	
    	$model = DrpMaterialType::find()->asArray()->all();
//     	var_dump($model);
foreach ($model as $key => $value) {
	var_dump($key);
	var_dump($value);
}
    	
    	
//     	header("Content-type:json/application;charset=utf-8");
//     	echo(Json::encode($model));
    	
//     	DrpMaterialType::find
    	
//     	$this->renderAjax($view)
//     	return $this->render('test',['model'=>$model]);
    	return $this->renderPartial('test',['model'=>$model]);
    }
    
    public function actionTestPage(){
    	//     	$this->layout='@app/views/layouts/manager.php';
    	/* $model = DrpMaterialType::findOne(7);
    	 if ($model === null) {
    	 throw new NotFoundHttpException;
    	 }
    	 $model->delete(); */
    	 
//     	$model = DrpMaterialType::find()->orderBy(["id"=>SORT_ASC,"name"=>SORT_ASC])->offset(1)->limit(10)->asArray()->all();
    	/* $model = DrpMaterialType::find ()->orderBy ( [ 
				"id" => SORT_ASC,
				"name" => SORT_ASC 
		] )->offset ( 1 )->limit ( 10 )->asArray ()->all (); */
    	
    	/* $connection = Yii::$app->db;
    	$connection->createCommand("select * from t_drp_material_type"); */
    	
    	//updateall & deleteAll
    	/* DrpMaterialType::updateAll(['status' => 1], ['id'=>8]);
    	DrpMaterialType::updateAll(['status' => 2], 'id=:id',[":id"=>8]);
    	DrpMaterialType::updateAll(['status'=>3], 'id=:id',[":id"=>8]);
    	DrpMaterialType::deleteAll('id=:id',[':id'=>1]); */
    	
    	
    	$connection = Yii::$app->db;
    	$command = $connection->createCommand("select id,name as name_1 from t_drp_material_type");
    	$model = $command->query();
    	
    	$command = $connection->createCommand("select a.*,b.* from t_drp_material_type a left join t_drp_material b on (a.id = b.material_type_id)");
    	$model = $command->query();
    	
    	$command = $connection->createCommand("select count(*) from t_drp_material_type");
    	$model = $command->queryScalar();
    	
    	$command = $connection->createCommand("select id,name as name_1 from t_drp_material_type where id = :id",[":id"=>8]);
    	$model = $command->queryAll();
    	
    	$command = $connection->createCommand("update t_drp_material_type set name=:name where id = :id",[":id"=>8,":name"=>'dao批量更新']);
    	$model = $command->execute();
    	
    	$query = (new \yii\db\Query())->select("*")->from("t_drp_material_type a")->leftJoin ("t_drp_material b", "a.id = b.material_type_id")->where("a.id=9");
    	$command = $query->createCommand();
    	$model = $command->queryAll();
    	
    	$command = $connection->createCommand();
    	$command->update('t_drp_material_type', ['name'=>'dao1批量更新'],'id=:id',[':id'=>8])->execute();
    	
    	$command->insert('t_drp_material_type', ['code'=>'010106','name'=>'图书六'])->execute();
    	
//     	$model = DrpMaterialType::find()->offset(2)->limit(10)->asArray()->all();
    	 
    	//     	$model = DrpMatupdateAllerialType::findAll();
    	//     	var_dump($model);
    	header("Content-type:json/application;charset=utf-8");
    	echo(Json::encode($model));
    	 
    	//     	DrpMaterialType::find
    	 
    	//     	$this->renderAjax($view)
    	//     	return $this->render('test',['model'=>$model]);
    	//     	return $this->renderPartial('test',['model'=>$model]);
    }

    /**
     * Lists all DrpMaterialType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DrpMaterialTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DrpMaterialType model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DrpMaterialType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DrpMaterialType();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DrpMaterialType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DrpMaterialType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DrpMaterialType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return DrpMaterialType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DrpMaterialType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
