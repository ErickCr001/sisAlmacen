<?= $this->extend('layouts/dashboard');
$this->section('contenido'); ?>

<form action="/modificarProducto/<?= $producto['id']?>" method="POST" enctype="multipart/form-data">
  <div class="container">
    <div class="card mt-3">
        <div class="card-header bg-primary">
            <p class="fs-2 text-center text-white fw-bold fst-italic">Modificación de producto</p>
        </div>
        <div class="card-body">
        <div class="mb-3">
        <label for="nombreProducto" class="form-label">Nombre</label>
        <!-- En el atributo VALUE de la etiqueta INPUT colocamos el valor que retorna el controlador
        la variable $producto está configurado en el controlador y es un array
        Las posiciones del array son los campos de la tabla en BD -->
        <input type="text" class="form-control" id="nombreProducto" aria-describedby="nombreProducto" name="nombreProducto" value="<?= $producto['nombre'] ?>">
        </div>
        <div class="mb-3">
            <label for="industriaProducto" class="form-label">Industria</label>
            <select id="industriaProducto" name="industriaProducto" class="form-select" aria-label="Default select example">
                <!-- Para la etiqueta SELECT, con PHP y SWITCH evaumos el valor almacenado en BD
                dependiendo el valor, iremos llenando variables con "selected"
                y en los OPTIONS para tener un item seleccionado por defecto
                le pasamos estas variables -->
                <?php 
                $nacional="";
                $peruano="";
                $chileno="";
                switch ($producto['industria']) {
                    case 'NACIONAL':
                        $nacional="selected";
                        break;
                    case 'PERUANO':
                        $peruano="selected";
                        break;
                    case 'CHILENO':
                        $chileno="selected";
                        break;
                    default:
                        # code...
                        break;
                }
                ?>
                <!-- Cada option tiene la variable correspondiente para mostrar o no por defecto -->
                <option value="NACIONAL" <?= $nacional?>>NACIONAL</option>
                <option value="PERUANO" <?= $peruano?>>PERUANO</option>
                <option value="CHILENO" <?= $chileno?>>CHILENO</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidadProducto" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidadProducto" aria-describedby="cantidadProducto" name="cantidadProducto" value="<?= $producto['cantidad']?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Envase:</label>
            <div class="form-check form-check-inline">
            <?php 
            $lata="";
            $bolsa="";
            $caja="";
            switch ($producto['envase']) {
                case 'LATA':
                    $lata="checked";
                    break;
                case 'BOLSA':
                    $bolsa="checked";
                    break;
                case 'CAJA':
                    $caja="checked";
                    break;
                default:
                    # code...
                    break;
            }
            ?>
                <input class="form-check-input" type="radio" name="envaseProducto" id="rbLata" value="LATA" <?= $lata?>>
                <label class="form-check-label" for="rbLata">LATA</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="envaseProducto" id="rbBolsa" value="BOLSA" <?= $bolsa?>>
                <label class="form-check-label" for="rbBolsa">BOLSA</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="envaseProducto" id="rbCaja" value="CAJA" <?= $caja?>>
                <label class="form-check-label" for="rbCaja">CAJA</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="pCompraProducto" class="form-label">Precio compra</label>
            <input type="number" class="form-control" id="pCompraProducto" aria-describedby="pCompraProducto" name="pCompraProducto" step="0.01" value="<?= $producto['precio_compra']?>">
        </div>
        <div class="mb-3">
            <label for="pVentaProducto" class="form-label">Precio venta</label>
            <input type="number" class="form-control" id="pVentaProducto" aria-describedby="pVentaProducto" name="pVentaProducto" step="0.01" value="<?= $producto['precio_venta']?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo entrega:</label>
            <div class="form-check form-check-inline">
                <?php 
                    $delivery="";
                    $tienda="";
                    /* la función explode() recibe dos parámetros
                    el primero es el valor con el que vamos a dividir una cadena
                    el segundo es la cadena a dividir
                    esta función retorna un array
                    */
                    $entrega=explode("|",$producto['tipo_entrega']);
                    if(sizeof($entrega)>0){
                        foreach($entrega as $item){
                            if($item=="TIENDA"){
                                $tienda="checked";
                            }
                            if($item=="DELIVERY"){
                                $delivery="checked";
                            }
                        }
                    }
                ?>
                <input class="form-check-input" type="checkbox" id="checkDelivery" value="DELIVERY" name="deliveryProducto" <?= $delivery?>>
                <label class="form-check-label" for="checkDelivery">DELIVERY</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="checkTienda" value="TIENDA" name="tiendaProducto" <?= $tienda?>>
                <label class="form-check-label" for="checkTienda">TIENDA</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="fotoProducto" class="form-label">Fotografía de producto</label>
            <input class="form-control" type="file" id="fotoProducto" accept="image/*" name="fotoProducto">
        </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
        </div>
    </div>
</div>
</form>

<?= $this->endSection();?>