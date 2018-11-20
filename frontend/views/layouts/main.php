<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="agileits_header">
    <div class="container">
        <div class="w3l_offers">
            <p>APARTADO PARA ANUNCIO  <a href="#">ACCION</a></p>
        </div>
        <div class="agile-login">
            <ul>
                <?php if(Yii::$app->user->isGuest): ?>
                <li><a href="/site/signup"> Create Account </a></li>
                <li><a href="/site/login">Login</a></li>
                <?php else: ?>
                <li><a href="#"><?= Yii::$app->user->identity->name . ' ' . Yii::$app->user->identity->lastname ?></a></li>
                <li><a href="/site/logout">Salir</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="product_list_header">
            <button id="cart" class="w3view-cart" name="cart" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>

            </ul>
        </div>
        <div class="w3ls_logo_products_left">
            <h1><a href="/">super Market</a></h1>
        </div>
        <div class="w3l_search">
            <form action="#" method="post">
                <input type="search" name="Search" placeholder="Search for a Product..." required="">
                <button type="submit" class="btn btn-default search" aria-label="Left Align">
                    <i class="fa fa-search" aria-hidden="true"> </i>
                </button>
                <div class="clearfix"></div>
            </form>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>

<div class="navigation-agileits">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul id="categorias" class="nav navbar-nav">
                    <li class="active"><a href="/" class="act">Home</a></li>
                    <!-- Mega Menu -->
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="row" style="margin-left: 10px; margin-right: 10px;">
    <div class="col-md-12">
        <?= $content ?>
    </div>
</div>


<div class="footer-copy">

    <div class="container">
        <p>© 2017 Super Market. All rights reserved | Design by <a href="#">HPC</a></p>
    </div>
</div>
<div class="footer-botm">
    <div class="container">
        <div class="w3layouts-foot">
            <ul>
                <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div class="payment-w3ls">
            <img src="template/images/card.png" alt=" " class="img-responsive">
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<script>
    function addCart(id){
        $.get('/api/v1/addcart/' + id, function(data){
            if (data === "Debes iniciar sesión para añadir items"){
                swal({
                    title: 'Ups!',
                    text: data,
                    type: 'error'
                })
            }else{
                swal({
                    title: 'Listo',
                    text: data,
                    type: 'success'
                })
            }

        });
    }
</script>

<?php
$script = <<<JS
    $.get("/api/v1/categories", function(data){
        $.each(data, function(key, value){
           $("#categorias").html($("#categorias").html() + '<li><a href="/categoria/' + value.id + '">' + value.name + '</a></li>') 
        });
        $("#categorias").html($("#categorias").html() + '<li><a href="/ofertas">Offers</a></li>');
        $("#categorias").html($("#categorias").html() + '<li><a href="/contacto">Contact</a></li>');         
    });

    $("#cart").click(function(){
        window.location.href = '/carrito';
    })
JS;

$this->registerJs($script);

?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
