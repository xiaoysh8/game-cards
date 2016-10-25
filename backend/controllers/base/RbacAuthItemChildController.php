<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\controllers\base;

use common\models\RbacAuthItemChild;
use backend\models\search\RbacAuthItemChildSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
 * RbacAuthItemChildController implements the CRUD actions for RbacAuthItemChild model.
 */
class RbacAuthItemChildController extends Controller
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
                        'roles' => ['BackendRbacAuthItemChildFull'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view'],
                        'roles' => ['BackendRbacAuthItemChildView'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update', 'create', 'delete'],
                        'roles' => ['BackendRbacAuthItemChildEdit'],
                    ],

                ],
            ],
        ];
    }

    /**
     * Lists all RbacAuthItemChild models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RbacAuthItemChildSearch;
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
     * Displays a single RbacAuthItemChild model.
     * @param string $parent
     * @param string $child
     *
     * @return mixed
     */
    public function actionView($parent, $child)
    {
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
            'model' => $this->findModel($parent, $child),
        ]);
    }

    /**
     * Finds the RbacAuthItemChild model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $parent
     * @param string $child
     * @return RbacAuthItemChild the loaded model
     * @throws HttpException if the model cannot be found
     */
    protected function findModel($parent, $child)
    {
        if (($model = RbacAuthItemChild::findOne(['parent' => $parent, 'child' => $child])) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }

    /**
     * Creates a new RbacAuthItemChild model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RbacAuthItemChild;

        try {
            if ($model->load($_POST) && $model->save()) {
                return $this->redirect(['view', 'parent' => $model->parent, 'child' => $model->child]);
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing RbacAuthItemChild model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionUpdate($parent, $child)
    {
        $model = $this->findModel($parent, $child);

        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RbacAuthItemChild model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionDelete($parent, $child)
    {
        try {
            $this->findModel($parent, $child)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            \Yii::$app->getSession()->addFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

// TODO: improve detection
        $isPivot = strstr('$parent, $child', ',');
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
}
