<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active"><?= $producto->name ?></li>
        </ol>
    </div>
</div>
<div class="products">
    <div class="container">
        <div class="agileinfo_single">

            <div class="col-md-4 agileinfo_single_left">
                <img id="example" src="<?= $producto->productGalleries[0]->url ?>" alt=" " class="img-responsive">
            </div>
            <div class="col-md-8 agileinfo_single_right">
                <h2><?= $producto->name ?></h2>
                <div class="w3agile_description">
                    <h4>Description :</h4>
                    <p><?= $producto->description ?></p>
                </div>
                <div class="snipcart-item block">
                    <div class="snipcart-thumb agileinfo_single_right_snipcart">
                        <h4 class="m-sing">$<?= $producto->price ?> <span>$<?= $producto->price * 1.25 ?></span></h4>
                    </div>
                    <div class="snipcart-details agileinfo_single_right_details">
                        <input onclick="addCart(<?= $producto->id ?>)" type="submit" name="submit" value="Add to cart" class="button">
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>