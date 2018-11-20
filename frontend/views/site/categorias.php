<div>
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active"><?= $cat->name ?></li>
            </ol>
        </div>
    </div>
</div>

<div class="products">
    <div class="container">
        <div class="col-md-4 products-left">
            <div class="categories">
                <h2>Categorias</h2>
                <ul id="categorias" class="cate">
                    <?php foreach ($categorias as $categoria): ?>
                        <li><a href="/categoria/<?= $categoria->id ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><?= $categoria->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="col-md-8 products-right">
            <div class="agile_top_brands_grids">
                <?php foreach ($productos as $key => $producto): ?>
                    <div class="col-md-4 top_brand_left">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid">
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block">
                                            <div class="snipcart-thumb">
                                                <a href="/producto/<?= $producto->id ?>"><img title=" " alt=" " src="<?= $producto->productGalleries[0]->url ?>"></a>
                                                <p><?= $producto->name ?></p>
                                                <h4>$<?= $producto->price ?> <span>$<?= $producto->price * 1.25 ?></span></h4>
                                            </div>
                                            <div class="snipcart-details top_brand_home_details">
                                                <input onclick="addCart(<?= $producto->id ?>)" type="button" value="Add to cart" class="button">
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>