<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Whishlist */

$this->title = Yii::t('app', 'Create Whishlist');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Whishlists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="whishlist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
