<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductGallery */

$this->title = Yii::t('app', 'Nueva foto');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Galleries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
