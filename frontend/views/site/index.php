<?php

/* @var $this yii\web\View */

$this->title = 'Tienda Online';
?>
<div class="site-index">
    <ul id="demo1">
        <li>
            <img src="images/11.jpg" alt="" />
            <!--Slider Description example-->
            <div class="slide-desc">
                <h3>Buy Rice Products Are Now On Line With Us</h3>
            </div>
        </li>
        <li>
            <img src="images/22.jpg" alt="" />
            <div class="slide-desc">
                <h3>Whole Spices Products Are Now On Line With Us</h3>
            </div>
        </li>

        <li>
            <img src="images/44.jpg" alt="" />
            <div class="slide-desc">
                <h3>Whole Spices Products Are Now On Line With Us</h3>
            </div>
        </li>
    </ul>

    <div class="top-brands">
        <div class="container">
            <h2>Productos Recientes</h2>
            <div class="grid_3 grid_5">
                <div id="productos" class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Populares esta semana</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div id="productosmain" role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="clearfix"> </div>
    <div class="brands">
        <div class="container">
            <h3>Todas las Categorías</h3>
            <div id="categorias_foot" class="brands-agile">
            </div>
        </div>
    </div>
</div>
<?php
$script = <<<JS
jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

        jQuery('#responsive').change(function(){
            $('#responsive_wrapper').width(jQuery(this).val());
        });
JS;

$this->registerJs($script);

?>

<?php
$script1 = <<<JS
    $.get("/api/v1/categories", function(data){
        $.each(data, function(key, value){
           $("#categorias_foot").html('' +
            '<div class="col-md-2 w3layouts-brand">' +
                        '<div class="brands-w3l">' +
                            '<p><a href="/categoria/' + value.id + '">' + value.name + '</a></p>' +
                        '</div>' +
                    '</div>');
        });         
    });

    $.get("/api/v1/productosmain", function(data){         
            $.each(data, function(key, value){
               $("#productosmain").html($("#productosmain").html() + 
               '<div class="col-md-4 top_brand_left">' +
                        '<div class="hover14 column">' +
                            '<div class="agile_top_brand_left_grid">' +
                                '<div class="agile_top_brand_left_grid1">' +
                                    '<figure>' +
                                        '<div class="snipcart-item block">' +
                                            '<div class="snipcart-thumb">' +
                                                '<a href="/producto/'+ value.id +'"><img title=" " alt=" " src="'+ value.photo +'"></a>' +
                                                '<p>'+value.name +'</p>' +
                                                '<h4>$'+ value.price +' <span>$'+ value.priceb + '</span></h4>' +
                                            '</div>' +
                                            '<div class="snipcart-details top_brand_home_details">' +
                                                '<input onclick="addCart('+ value.id +')" type="button" value="Add to cart" class="button">' +
                                            '</div>' +
                                        '</div>' +
                                    '</figure>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>'
               );                
            });   
            $("#productosmain").html($("#productosmain").html() + '<div class="clearfix"> </div>');
        });
JS;

$this->registerJs($script1);

?>
