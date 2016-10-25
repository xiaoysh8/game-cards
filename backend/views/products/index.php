<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = '商品';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('新建商品', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        ['class' => 'yii\grid\SerialColumn'],

        'serial_no',
        'title',
        'retail_price',
        'wholesale',
        // 'bar_code',
        // 'appear_time',
        [
            'attribute' => 'providers_id',
            'value'     => 'providers.name',
        ],

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>

</div>
