<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\RbacAuthAssignment $model
*/

$this->title = Yii::t('app', 'RbacAuthAssignment') . $model->item_name . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'RbacAuthAssignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->item_name, 'url' => ['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud rbac-auth-assignment-update">

    <h1>
        <?= Yii::t('app', 'RbacAuthAssignment') ?>
        <small>
                        <?= $model->item_name ?>        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
