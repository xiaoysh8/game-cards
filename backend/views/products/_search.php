<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ProductsSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'serial_no') ?>

    <?php echo $form->field($model, 'title') ?>

    <?php echo $form->field($model, 'retail_price') ?>

    <?php echo $form->field($model, 'wholesale') ?>

    <?php // echo $form->field($model, 'bar_code') ?>

    <?php // echo $form->field($model, 'appear_time') ?>

    <?php // echo $form->field($model, 'providers_id') ?>

    <div class="form-group">
        <?php echo Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
