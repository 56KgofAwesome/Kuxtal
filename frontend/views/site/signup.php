<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registro';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active"><?= Html::encode($this->title) ?></li>
            </ol>
        </div>
    </div>

    <div class="register">
        <div class="container">
            <h2>Registrese Aquí</h2>
            <div class="login-form-grids">
                <h5>profile information</h5>

                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Nombres'])->label(false) ?>
                    <?= $form->field($model, 'lastname')->textInput(['placeholder' => 'Apellidos'])->label(false) ?>

                <h6>Login information</h6>

                    <?= $form->field($model, 'username')->textInput(['placeholder' => 'Nombre de Usuario'])->label(false) ?>

                    <?= $form->field($model, 'email')->textInput(['placeHolder' => 'Correo Electrónico'])->label(false) ?>

                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Contraseña'])->label(false) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
            </div>
            <div class="register-home">
                <a href="/">Home</a>
            </div>
        </div>
    </div>
</div>
