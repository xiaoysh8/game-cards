<?php

namespace common\models;

use Yii;
use \common\models\base\RbacAuthItem as BaseRbacAuthItem;

/**
 * This is the model class for table "rbac_auth_item".
 */
class RbacAuthItem extends BaseRbacAuthItem
{
    public function getRbacAuthItemChildrens()
    {
        return $this->hasMany(\common\models\RbacAuthItemChild::className(), ['parent' => 'name']);
    }

    public function getChildrens()
    {
        return $this->hasMany(\common\models\RbacAuthItemChild::className(), ['parent' => 'name']);
    }
}
