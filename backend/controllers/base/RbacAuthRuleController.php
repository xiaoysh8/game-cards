<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\controllers\base;

use common\models\RbacAuthRule;
    use backend\models\search\RbacAuthRuleSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
* RbacAuthRuleController implements the CRUD actions for RbacAuthRule model.
*/
class RbacAuthRuleController extends Controller
{
/**
* @var boolean whether to enable CSRF validation for the actions in this controller.
* CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
*/
public $enableCsrfValidation = false;

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
    return [
    'access' => [
    'class' => AccessControl::className(),
    'rules' => [
    [
    'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'roles' => ['BackendRbacAuthRuleFull'],
                    ],
    [
    'allow' => true,
                        'actions' => ['index', 'view'],
                        'roles' => ['BackendRbacAuthRuleView'],
                    ],
    [
    'allow' => true,
                        'actions' => ['update', 'create', 'delete'],
                        'roles' => ['BackendRbacAuthRuleEdit'],
                    ],
    
                ],
            ],
    ];
    }

/**
* Lists all RbacAuthRule models.
* @return mixed
*/
public function actionIndex()
{
    $searchModel  = new RbacAuthRuleSearch;
    $dataProvider = $searchModel->search($_GET);

Tabs::clearLocalStorage();

Url::remember();
\Yii::$app->session['__crudReturnUrl'] = null;

return $this->render('index', [
'dataProvider' => $dataProvider,
    'searchModel' => $searchModel,
]);
}

/**
* Displays a single RbacAuthRule model.
* @param string $name
*
* @return mixed
*/
public function actionView($name)
{
\Yii::$app->session['__crudReturnUrl'] = Url::previous();
Url::remember();
Tabs::rememberActiveState();

return $this->render('view', [
'model' => $this->findModel($name),
]);
}

/**
* Creates a new RbacAuthRule model.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
public function actionCreate()
{
$model = new RbacAuthRule;

try {
if ($model->load($_POST) && $model->save()) {
return $this->redirect(['view', 'name' => $model->name]);
} elseif (!\Yii::$app->request->isPost) {
$model->load($_GET);
}
} catch (\Exception $e) {
$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
$model->addError('_exception', $msg);
}
return $this->render('create', ['model' => $model]);
}

/**
* Updates an existing RbacAuthRule model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param string $name
* @return mixed
*/
public function actionUpdate($name)
{
$model = $this->findModel($name);

if ($model->load($_POST) && $model->save()) {
return $this->redirect(Url::previous());
} else {
return $this->render('update', [
'model' => $model,
]);
}
}

/**
* Deletes an existing RbacAuthRule model.
* If deletion is successful, the browser will be redirected to the 'index' page.
* @param string $name
* @return mixed
*/
public function actionDelete($name)
{
try {
$this->findModel($name)->delete();
} catch (\Exception $e) {
$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
\Yii::$app->getSession()->addFlash('error', $msg);
return $this->redirect(Url::previous());
}

// TODO: improve detection
$isPivot = strstr('$name',',');
if ($isPivot == true) {
return $this->redirect(Url::previous());
} elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
Url::remember(null);
$url = \Yii::$app->session['__crudReturnUrl'];
\Yii::$app->session['__crudReturnUrl'] = null;

return $this->redirect($url);
} else {
return $this->redirect(['index']);
}
}

/**
* Finds the RbacAuthRule model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.
* @param string $name
* @return RbacAuthRule the loaded model
* @throws HttpException if the model cannot be found
*/
protected function findModel($name)
{
if (($model = RbacAuthRule::findOne($name)) !== null) {
return $model;
} else {
throw new HttpException(404, 'The requested page does not exist.');
}
}
}