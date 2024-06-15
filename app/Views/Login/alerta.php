<?php 
// Primero verificamos si existe una variable llamada 'mensaje' y su valor lo almacenamos en la variable $flash
    if (session('mensaje')){ 
        // Si existe, $flash tendrá el tipo de dato ARRAY
        // En la posición 0 está el mensaje a mostrar
        // En la posición 1 está el tipo de alerta (color de bootstrap)
        $flash=session('mensaje');?>

        <div class='alert alert-<?= $flash[1]?>' role='alert'>
            <div class='row'>
                <div class='col-11'><?= $flash[0];?></div>
                <div class='col-1'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </div>
        </div>
    <?php }
?>