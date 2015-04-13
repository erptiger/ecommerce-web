<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_drp_material".
 *
 * @property string $id
 * @property string $material_code
 * @property string $material_barcode
 * @property string $material_name
 * @property string $material_short_name
 * @property string $material_pinyin
 * @property string $material_spec
 * @property string $material_model
 * @property string $product_area
 * @property string $material_unit
 * @property string $material_type_id
 * @property string $sale_price
 * @property string $in_price
 * @property string $retail_price
 * @property string $vip_price
 * @property string $in_tax_rate
 * @property string $sale_tax_rate
 * @property string $description
 * @property string $cost_compute_type
 * @property string $photo
 * @property string $mat_brand_type_id
 * @property string $master_sup_id
 * @property string $add_time
 * @property string $package_list
 * @property string $shop_id
 * @property string $status
 * @property string $batch_flag
 * @property string $batch_number_auto
 * @property string $guarantee_flag
 * @property integer $guarantee_days
 * @property string $combine_split
 * @property string $create_user_id
 * @property string $create_date
 * @property string $update_user_id
 * @property string $update_date
 * @property string $organization_id
 *
 * @property DrpMaterialType $materialType
 */
class DrpMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_drp_material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_unit', 'material_type_id', 'cost_compute_type', 'photo', 'mat_brand_type_id', 'master_sup_id', 'shop_id', 'status', 'batch_flag', 'batch_number_auto', 'guarantee_flag', 'guarantee_days', 'combine_split', 'create_user_id', 'update_user_id', 'organization_id'], 'integer'],
            [['material_type_id', 'status'], 'required'],
            [['sale_price', 'in_price', 'retail_price', 'vip_price', 'in_tax_rate', 'sale_tax_rate'], 'number'],
            [['add_time', 'create_date', 'update_date'], 'safe'],
            [['material_code', 'material_barcode'], 'string', 'max' => 50],
            [['material_name', 'material_short_name', 'material_pinyin', 'material_spec', 'material_model', 'package_list'], 'string', 'max' => 100],
            [['product_area'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 400],
            [['material_code'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'material_code' => Yii::t('app', '商品编码'),
            'material_barcode' => Yii::t('app', '商品主条码'),
            'material_name' => Yii::t('app', '商品名称'),
            'material_short_name' => Yii::t('app', '商品简称'),
            'material_pinyin' => Yii::t('app', '助记码'),
            'material_spec' => Yii::t('app', '规格'),
            'material_model' => Yii::t('app', '型号'),
            'product_area' => Yii::t('app', '产地'),
            'material_unit' => Yii::t('app', '基本单位'),
            'material_type_id' => Yii::t('app', '商品分类'),
            'sale_price' => Yii::t('app', '销售价'),
            'in_price' => Yii::t('app', '进货价'),
            'retail_price' => Yii::t('app', '零售价'),
            'vip_price' => Yii::t('app', '会员价'),
            'in_tax_rate' => Yii::t('app', '进价税率'),
            'sale_tax_rate' => Yii::t('app', '销价税率'),
            'description' => Yii::t('app', '描述'),
            'cost_compute_type' => Yii::t('app', '成本计算方式：加权平均法,   移动加权平均法,   先进先出法,   分批认定法'),
            'photo' => Yii::t('app', '图片ID'),
            'mat_brand_type_id' => Yii::t('app', '品牌类型（备用）'),
            'master_sup_id' => Yii::t('app', '主供应商'),
            'add_time' => Yii::t('app', '上架时间'),
            'package_list' => Yii::t('app', '包装清单'),
            'shop_id' => Yii::t('app', '网店编号'),
            'status' => Yii::t('app', '状态?1,有效:0,无效'),
            'batch_flag' => Yii::t('app', '是否批次管理?1,是:0,否'),
            'batch_number_auto' => Yii::t('app', '是否自动生成批号?1,是:0,否；一般规则为yyyyMMdd##'),
            'guarantee_flag' => Yii::t('app', '是否保质期管理?1,是:0,否'),
            'guarantee_days' => Yii::t('app', '保质期(天)'),
            'combine_split' => Yii::t('app', '是否可拆分组合?1,是:0,否'),
            'create_user_id' => Yii::t('app', '记录创建人'),
            'create_date' => Yii::t('app', '记录创建时间'),
            'update_user_id' => Yii::t('app', '记录最后一次更新人'),
            'update_date' => Yii::t('app', '记录最后一次更新时间'),
            'organization_id' => Yii::t('app', '组织机构编号'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialType()
    {
        return $this->hasOne(DrpMaterialType::className(), ['id' => 'material_type_id']);
    }
}
