<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\RbacAuthItemChild $model
*/

$this->title = Yii::t('app', 'RbacAuthItemChild') . $model->parent . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'RbacAuthItemChildren'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->parent, 'url' => ['view', 'parent' => $model->parent, 'child' => $model->child]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud rbac-auth-item-child-update">

    <h1>
        <?= Yii::t('app', 'RbacAuthItemChild') ?>
        <small>
                        <?= $model->parent ?>        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'parent' => $model->parent, 'child' => $model->child], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
