<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_drp_material_type".
 *
 * @property string $id
 * @property string $name
 * @property string $parent_id
 * @property string $code
 * @property string $status
 * @property string $organization_id
 *
 * @property DrpMaterial[] $drpMaterials
 * @property DrpMaterialType $parent
 * @property DrpMaterialType[] $drpMaterialTypes
 */
class DrpMaterialType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_drp_material_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['parent_id', 'status', 'organization_id'], 'integer'],
            [['name', 'code'], 'string', 'max' => 30],
            [['code'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '分类名称'),
            'parent_id' => Yii::t('app', '父类编号'),
            'code' => Yii::t('app', '类型编码'),
            'status' => Yii::t('app', '是否有效?1:有效:0,无效'),
            'organization_id' => Yii::t('app', '组织机构编号'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrpMaterials()
    {
        return $this->hasMany(DrpMaterial::className(), ['material_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(DrpMaterialType::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrpMaterialTypes()
    {
        return $this->hasMany(DrpMaterialType::className(), ['parent_id' => 'id']);
    }
}
