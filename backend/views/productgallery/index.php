<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductGallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Galería');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-gallery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Nueva Foto'), ['create', 'id' => $_GET['id']], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                    'label' => 'Product',
                    'value' => function($model){
                        return $model->product->name;
                    }
            ],
            [
                'label' => 'Image',
                'format' => 'raw',
                'value' => function($model){
                    return '<img src="' . $model->url . '" width="50%">';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
