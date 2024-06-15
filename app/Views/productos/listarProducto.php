<?= $this->extend('layouts/dashboard');
$this->section('contenido'); ?>

<div class="container">
    <div class="card mt-3">
        <div class="card-header bg-primary">
            <p class="fs-2 text-center text-white fw-bold fst-italic">Listado de productos</p>
        </div>
        <div class="card-body">
            <!-- AGREGAR ID A TABLA DE PRODUCTOS -->
            <table class="table" id="tablaProductos">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
                        <th>INDUSTRIA</th>
                        <th>CANTIDAD</th>
                        <th>ENVASE</th>
                        <th>PRECIO COMPRA</th>
                        <th>PRECIO VENTA</th>
                        <th>TIPO DE ENTREGA</th>
                        <th>FOTO</th>
                        <!-- Esta última columna es donde se mostrará dos botones para MODIFICAR o ELIMINAR el item -->
                        <th>ACCIONES</th>
                    </tr>
                </thead> 
                <tbody>
                    <!-- El controlador devolverá los datos registrados que el modelo retorne de la BD -->
                    <!-- Los datos que retorna el controlador los recorremos con un foreach -->
                    <!-- Porque los datos están dentro de un array -->
                    <!-- El controlador retornará los datos en un array llamado $productos -->
                    <?php foreach($productos as $value) {?>
                        <tr>
                            <!-- recorremos el array de productos con los campos que están en BD -->
                            <td><?= $value['codigo']?></td>
                            <td><?= $value['nombre']?></td>
                            <td><?= $value['industria']?></td>
                            <td><?= $value['cantidad']?></td>
                            <td><?= $value['envase']?></td>
                            <td><?= $value['precio_compra']?></td>
                            <td><?= $value['precio_venta']?></td>
                            <td><?= $value['tipo_entrega']?></td>
                            <!-- Utilizamos la etiqueta img y en su propiedad src cargamos la fotografía de BD -->
                            <!-- Por ejemplo, enla BD se guarda con 'uploads/nombre de foto' -->
                            <!-- Pero para acceder a la carpeta uploads, debemos indicar a codeigniter que acceda a la 
                            carpeta public -->
                            <!-- Para acceder a la carpeta public, utilizamos la función base_url() -->
                            <!-- Por último, configuramos un tamaño fijo para la etiqueta img -->
                            <td><img src="<?= base_url().$value['foto']?>" style="height:80px;width:80px" /> </td>
                            <!-- Para las acciones, colocamos dos botones
                            Uno para modificar y otro para eliminar -->
                            <td>
                                <!-- Colocamos la etiqueta a y le dmos aspecto de botón con la clase de bootstrap btn
                                Este botón abrirá otra vista donde cargaremos los datos para su edición -->
                                <!-- En href colocamos la ruta que mostrará el formulario para editar datos
                                pasándole el id del producto correspondiente a la fila actual -->
                                <a class="btn btn-primary" href="/mostrarDatosProducto/<?= $value['id']?>">Modificar</a>
                                <!-- El botón de eliminar no redireccionará a otra vista, directamente eliminará el item -->
                                <!-- En action, colocamos la ruta para eliminar un producto, 
                                pasándole el id como parámetro -->
                                <form action="/eliminarProducto/<?= $value['id']?>" method="POST">
                                    <button class="btn btn-secondary" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
        $("#tablaProductos").DataTable({
            language:{
                        url:'<?= base_url()?>DataTables/es-MX.json'
                    },
        });
</script>
<style>
        th { font-size: 12px; }
        td { font-size: 11px; }
</style>
<?= $this->endSection();?>