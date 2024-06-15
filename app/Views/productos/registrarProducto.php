<?= $this->extend('layouts/dashboard');
$this->section('contenido'); ?>

<form action="/registrarProducto" method="POST" enctype="multipart/form-data">
  <div class="container">
    <div class="card mt-3">
        <div class="card-header bg-primary">
            <p class="fs-2 text-center text-white fw-bold fst-italic">Registro de productos</p>
        </div>
        <div class="card-body">
        <div class="mb-3">
        <label for="nombreProducto" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombreProducto" aria-describedby="nombreProducto" name="nombreProducto">
        </div>
        <div class="mb-3">
            <label for="industriaProducto" class="form-label">Industria</label>
            <select id="industriaProducto" name="industriaProducto" class="form-select" aria-label="Default select example">
                <option value="NACIONAL">NACIONAL</option>
                <option value="PERUANO">PERUANO</option>
                <option value="CHILENO">CHILENO</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidadProducto" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidadProducto" aria-describedby="cantidadProducto" name="cantidadProducto">
        </div>
        <div class="mb-3">
            <label class="form-label">Envase:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="envaseProducto" id="rbLata" value="LATA" checked>
                <label class="form-check-label" for="rbLata">LATA</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="envaseProducto" id="rbBolsa" value="BOLSA">
                <label class="form-check-label" for="rbBolsa">BOLSA</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="envaseProducto" id="rbCaja" value="CAJA">
                <label class="form-check-label" for="rbCaja">CAJA</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="pCompraProducto" class="form-label">Precio compra</label>
            <input type="number" class="form-control" id="pCompraProducto" aria-describedby="pCompraProducto" name="pCompraProducto" step="0.01">
        </div>
        <div class="mb-3">
            <label for="pVentaProducto" class="form-label">Precio venta</label>
            <input type="number" class="form-control" id="pVentaProducto" aria-describedby="pVentaProducto" name="pVentaProducto" step="0.01">
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo entrega:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="checkDelivery" value="DELIVERY" name="deliveryProducto">
                <label class="form-check-label" for="checkDelivery">DELIVERY</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="checkTienda" value="TIENDA" name="tiendaProducto">
                <label class="form-check-label" for="checkTienda">TIENDA</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="fotoProducto" class="form-label">Fotografía de producto</label>
            <input class="form-control" type="file" id="fotoProducto" accept="image/*" name="fotoProducto">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </div>
</div>
</form>

<?= $this->endSection();?>