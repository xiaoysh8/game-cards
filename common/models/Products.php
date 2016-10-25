<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $serial_no
 * @property string $title
 * @property string $retail_price
 * @property string $wholesale
 * @property string $bar_code
 * @property string $appear_time
 * @property integer $providers_id
 *
 * @property Providers $providers
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['retail_price', 'wholesale'], 'required'],
            [['retail_price', 'wholesale'], 'number'],
            [['providers_id'], 'integer'],
            [['serial_no', 'bar_code'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 255],
            [['appear_time'], 'string', 'max' => 20],
            [['providers_id'], 'exist', 'skipOnError' => true, 'targetClass' => Providers::className(), 'targetAttribute' => ['providers_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serial_no' => '产品编号',
            'title' => '产品名称',
            'retail_price' => '零售价',
            'wholesale' => '批发价',
            'bar_code' => '产品条码',
            'appear_time' => '上市时间',
            'providers_id' => '供应商',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProviders()
    {
        return $this->hasOne(Providers::className(), ['id' => 'providers_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductsQuery(get_called_class());
    }
}
