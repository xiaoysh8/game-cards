<?php

namespace common\models;

use Yii;
use \common\models\base\RbacAuthAssignment as BaseRbacAuthAssignment;
use \common\models\User;
/**
 * This is the model class for table "rbac_auth_assignment".
 */
class RbacAuthAssignment extends BaseRbacAuthAssignment
{

    public function getUsername(){
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }



}
