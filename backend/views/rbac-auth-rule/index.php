<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\search\RbacAuthRuleSearch $searchModel
 */


/**
 * create action column template depending acces rights
 */
$actionColumnTemplates = [];

if (\Yii::$app->user->can('backend_rbac-auth-rule_view')) {
    $actionColumnTemplates[] = '{view}';
}

if (\Yii::$app->user->can('backend_rbac-auth-rule_update')) {
    $actionColumnTemplates[] = '{update}';
}

if (\Yii::$app->user->can('backend_rbac-auth-rule_delete')) {
    $actionColumnTemplates[] = '{delete}';
}
if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {update} {delete}";
}
?>
<div class="giiant-crud rbac-auth-rule-index">

    <?php //             echo $this->render('_search', ['model' =>$searchModel]);
    ?>


    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

    <h1>
        <?= Yii::t('app', 'RbacAuthRules') ?>
        <small>
            List
        </small>
    </h1>
    <div class="clearfix crud-navigation">
        <?php
        if (\Yii::$app->user->can('backend_rbac-auth-rule_create')) {
            ?>
            <div class="pull-left">
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <?php
        }
        ?>
        <div class="pull-right">


            <?=
            \yii\bootstrap\ButtonDropdown::widget(
                [
                    'id' => 'giiant-relations',
                    'encodeLabel' => false,
                    'label' => '<span class="glyphicon glyphicon-paperclip"></span> ' . 'Relations',
                    'dropdown' => [
                        'options' => [
                            'class' => 'dropdown-menu-right'
                        ],
                        'encodeLabels' => false,
                        'items' => [[
                            'url' => ['rbac-auth-item/index'],
                            'label' => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'Rbac Auth Item' . '</i>',
                        ],]
                    ],
                    'options' => [
                        'class' => 'btn-default'
                    ]
                ]
            );
            ?>        </div>
    </div>

    <hr/>

    <div class="table-responsive">
        <?= GridView::widget([
            'layout' => '{summary}{pager}{items}{pager}',
            'dataProvider' => $dataProvider,
            'pager' => [
                'class' => yii\widgets\LinkPager::className(),
                'firstPageLabel' => 'First',
                'lastPageLabel' => 'Last'],
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
            'headerRowOptions' => ['class' => 'x'],
            'columns' => [


                'name',
                'data:ntext',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => $actionColumnTemplateString,
                    'urlCreator' => function ($action, $model, $key, $index) {
                        // using the column name as key, not mapping to 'id' like the standard generator
                        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string)$key];
                        $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                        return Url::toRoute($params);
                    },
                    'contentOptions' => ['nowrap' => 'nowrap']
                ],
            ],
        ]); ?>
    </div>

</div>


<?php \yii\widgets\Pjax::end() ?>


