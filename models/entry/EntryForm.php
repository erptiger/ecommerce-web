<?php

namespace app\models\entry;


use yii\base\Model;

class EntryForm extends Model
{
	public $name;
	public $email;

	public function rules()
	{
		return [
				[['name', 'email'], 'required'],
				['email', 'email'],
		];
	}
	
	public function attributeLabels()
	{
		return [
// 				'name' => \Yii::t('app', 'name_label'),
				'name' => '姓名',
// 				'name' => \Yii::t('app', '姓名'),
       			'email' => \Yii::t('app', 'email_label'),
		];
	}
}