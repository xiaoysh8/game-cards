<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Providers */

$this->title = '创建供应商';
$this->params['breadcrumbs'][] = ['label' => '供应商', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="providers-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
