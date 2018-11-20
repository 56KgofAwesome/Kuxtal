<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\ProductGallery */
/* @var $form yii\widgets\ActiveForm */



?>

<div class="product-gallery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->widget(FileInput::className(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],'showUpload' => false,],
    ]);   ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
