<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\RbacAuthItem $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'RbacAuthItems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud rbac-auth-item-create">

    <h1>
        <?= Yii::t('app', 'RbacAuthItem') ?>        <small>
                        <?= $model->name ?>        </small>
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
