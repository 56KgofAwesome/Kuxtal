<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\Categories;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'id_categoria')->widget(Select2::classname(), [
        'data' => Categories::getCategories(),
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Selecciona una categoría ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
