<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\RbacAuthRule $model
*/

$this->title = Yii::t('app', 'RbacAuthRule') . $model->name . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'RbacAuthRules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'name' => $model->name]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud rbac-auth-rule-update">

    <h1>
        <?= Yii::t('app', 'RbacAuthRule') ?>
        <small>
                        <?= $model->name ?>        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'name' => $model->name], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
