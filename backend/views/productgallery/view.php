<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductGallery */

$this->title = 'Galería de: ' . $model->product->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Galería'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-gallery-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Product',
                'format' => 'raw',
                'value' => function($model){
                    return '<a href="/products/view?id=' . $model->product->id . '">'. $model->product->name .'</a>';
                }
            ],
            [
                'label' => 'Image',
                'format' => 'raw',
                'value' => function($model){
                    return '<img src="' . $model->url . '" width="50%">';
                }
            ],
        ],
    ]) ?>

</div>
