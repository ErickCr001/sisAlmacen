<?= $this->extend('layouts/dashboard');
$this->section('contenido'); ?>

<div class="container">
    <div class="card mt-3">
        <div class="card-header bg-primary">
            <p class="fs-2 text-center text-white fw-bold fst-italic">Listado de personal</p>
        </div>
        <div class="card-body">
            <!-- AGREGAR ID A TABLA DE PERSONAL -->
            <table class="table" id="tablaPersonal">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>CI</th>
                        <th>NOMBRE</th>
                        <th>A. PATERNO</th>
                        <th>A. MATERNO</th>
                        <th>CELULAR</th>
                        <th>DIRECCION</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead> 
                <tbody>
                    <!-- El controlador devolverá los datos registrados que el modelo retorne de la BD -->
                    <!-- Los datos que retorna el controlador los recorremos con un foreach -->
                    <!-- Porque los datos están dentro de un array -->
                    <!-- El controlador retornará los datos en un array llamado $productos -->
                    <?php foreach($personal as $value) {?>
                        <tr>
                            <!-- recorremos el array de productos con los campos que están en BD -->
                            <td><?= $value['codigo']?></td>
                            <td><?= $value['ci']?></td>
                            <td><?= $value['nombre']?></td>
                            <td><?= $value['paterno']?></td>
                            <td><?= $value['materno']?></td>
                            <td><?= $value['celular']?></td>
                            <td><?= $value['direccion']?></td>
                            <!-- Para las acciones, colocamos dos botones
                            Uno para modificar y otro para eliminar -->
                            <td>
                                <!-- Colocamos la etiqueta a y le dmos aspecto de botón con la clase de bootstrap btn
                                Este botón abrirá otra vista donde cargaremos los datos para su edición -->
                                <!-- En href colocamos la ruta que mostrará el formulario para editar datos
                                pasándole el id del producto correspondiente a la fila actual -->
                                <a class="btn btn-primary" href="/mostrarDatosPersonal/<?= $value['id']?>">Modificar</a>
                                <!-- El botón de eliminar no redireccionará a otra vista, directamente eliminará el item -->
                                <!-- En action, colocamos la ruta para eliminar un producto, 
                                pasándole el id como parámetro -->
                                <form action="/eliminarPersonal/<?= $value['id']?>" method="POST">
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
        $("#tablaPersonal").DataTable({
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