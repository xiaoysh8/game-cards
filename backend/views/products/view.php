<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '商品', 'url' => ['index']];``
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <p>
        <?php echo Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'serial_no',
            'title',
            'retail_price',
            'wholesale',
            'bar_code',
            'appear_time',
            'providers_id',
        ],
    ]) ?>

</div>
