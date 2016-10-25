<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Providers;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'serial_no')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'retail_price')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'wholesale')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'bar_code')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'appear_time')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'providers_id')->dropDownList(
    ArrayHelper::map(Providers::find()->all(), 'id', 'name'),
        [   'prompt' => '--请选择供应商--',

        ]
    );?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? '新建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
