<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\RbacAuthItemChild $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'RbacAuthItemChildren'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud rbac-auth-item-child-create">

    <h1>
        <?= Yii::t('app', 'RbacAuthItemChild') ?>        <small>
                        <?= $model->parent ?>        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?=             Html::a(
            'Cancel',
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
