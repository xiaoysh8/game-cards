<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "providers".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Products[] $products
 */
class Providers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'providers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '供应商名称',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['providers_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ProvidersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProvidersQuery(get_called_class());
    }
}
