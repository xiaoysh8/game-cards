<?php

namespace backend\controllers;
use common\models\RbacAuthAssignment;
use backend\models\search\RbacAuthAssignmentSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
/**
* This is the class for controller "RbacAuthAssignmentController".
*/
class RbacAuthAssignmentController extends \backend\controllers\base\RbacAuthAssignmentController
{
    /**
     * Lists all RbacAuthAssignment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RbacAuthAssignmentSearch;
        $dataProvider = $searchModel->search($_GET);

        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;



        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
}
