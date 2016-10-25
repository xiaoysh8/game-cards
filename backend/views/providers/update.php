<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Providers */

$this->title = '更新供应商: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '供应商', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="providers-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
