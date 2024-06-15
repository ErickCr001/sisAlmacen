<?= $this->extend('layouts/dashboard');
$this->section('contenido'); ?>

<form action="/registrarPersonal" method="POST">
  <div class="container">
    <div class="card mt-3">
        <div class="card-header bg-primary">
            <p class="fs-2 text-center text-white fw-bold fst-italic">Registro de personal</p>
        </div>
        <div class="card-body">
        <div class="mb-3">
            <label for="ci" class="form-label">C.I.:</label>
            <input type="text" class="form-control" id="ci" aria-describedby="ci" name="ci">
        </div>    
        <div class="mb-3">
            <label for="nombrePersonal" class="form-label">Nombre(s)</label>
            <input type="text" class="form-control" id="nombrePersonal" aria-describedby="nombrePersonal" name="nombrePersonal">
        </div>
        <div class="mb-3">
            <label for="paterno" class="form-label">Apellido paterno:</label>
            <input type="text" class="form-control" id="paterno" aria-describedby="paterno" name="paterno">
        </div>
        <div class="mb-3">
            <label for="materno" class="form-label">Apellido materno:</label>
            <input type="text" class="form-control" id="materno" aria-describedby="materno" name="materno">
        </div>
        <div class="mb-3">
            <label for="celular" class="form-label">Celular:</label>
            <input type="text" class="form-control" id="celular" aria-describedby="celular" name="celular">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" class="form-control" id="direccion" aria-describedby="direccion" name="direccion">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </div>
</div>
</form>

<?= $this->endSection();?>