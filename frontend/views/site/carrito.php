<div>
    <div>
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                    <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                    <li class="active">Carrito de Compras</li>
                </ol>
            </div>
        </div>
    </div>

    <table class="table table-responsive table-hover">
        <thead>
        <th>Producto</th>
        <th>Foto</th>
        <th>Precio</th>
        <th></th>
        </thead>
        <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= $producto['name'] ?></td>
                <td><img src="<?= $producto['photo'] ?>" alt="" width="80px"></td>
                <td><?= $producto['precio'] ?></td>
                <td><button type="button" onclick="deleteItem(<?= $producto['id'] ?>)" class="btn btn-danger">Eliminar</button></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    function deleteItem(id){
        $.get('/api/v1/deleteitem/' + id, function(data){
            if(data === "Eliminado"){
                swal("Item eliminado correctamente");
                location.reload();
            }else{
                swal("Hubo un problema al tratar de eliminar el item");
            }
        })
    }
</script>