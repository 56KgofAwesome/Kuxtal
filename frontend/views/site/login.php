<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active"><?= Html::encode($this->title) ?></li>
            </ol>
        </div>
    </div>

    <div class="register">
        <div class="container">
            <h2>Iniciar Sesión</h2>
            <div class="login-form-grids">
                <h6>Login information</h6>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['placeholder' => 'Nombre de Usuario'])->label(false) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Contraseña'])->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="register-home">
                <a href="/">Home</a>
            </div>
        </div>
    </div>

</div>
