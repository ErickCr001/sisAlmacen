<?= $this->extend('layouts/dashboard');
$this->section('contenido'); ?>
<!-- COLOCANDO LA FUNCION BASE_URL DE FORMA OCULTA -->
<input type="hidden" id="baseUrl" value="<?= base_url()?>" />
<div class="container">
    <div class="card mt-3">
        <div class="card-header bg-primary">
            <p class="fs-2 text-center text-white fw-bold fst-italic">Venta de productos</p>
        </div>
        <div class="card-body">
        <div class="mb-3">
            <label for="codigoProducto" class="form-label">Codigo Producto</label>
            <input type="text" class="form-control" id="codigoProducto" aria-describedby="codigoProducto" name="codigoProducto">
        </div>
        <div class="mb-3">
            <label for="nombreProducto" class="form-label">Nombre Producto</label>
            <input type="text" class="form-control" id="nombreProducto" aria-describedby="nombreProducto" name="nombreProducto">
        </div>
        <div class="mb-3">
            <label for="precioProducto" class="form-label">Precio Producto</label>
            <input type="text" class="form-control" id="precioProducto" aria-describedby="precioProducto" name="precioProducto">
        </div>
        <div class="mb-3">
            <label for="cantidadProducto" class="form-label">Cantidad Producto</label>
            <input type="text" class="form-control" id="cantidadProducto" aria-describedby="cantidadProducto" name="cantidadProducto">
        </div>
        <button class="btn btn-primary" id="cargarProducto">Cargar</button>
        <table class="table" id="tablaVentas">
            <thead>
                <tr>
                    <th>COD PROD</th>
                    <th>NOM PROD</th>
                    <th>PRECIO PROD</th>
                    <th>CANTIDAD PROD</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <button class="btn btn-primary" id="realizarVenta">Realizar venta</button>
        <script src="<?= base_url() ?>js/ventas.js"></script>
        </div>
    </div>
</div>
<?= $this->endSection();?>