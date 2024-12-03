<!-- modal inicio -->
<button type="button" class="btn btn-info" data-bs-toggle="modal"
        data-bs-target="#modalAsigTesis<?= $student->id ?>">
    Asignar tesis
</button>

<!-- Modal -->
<div class="modal modal-lg fade" id="modalAsigTesis<?= $student->id ?>" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel<?= $student->id ?>">Asignación de Tesis</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/controller/ControllerTesis.php?action=addTesis" method="post">
                    <input type="hidden" value="<?= $student->id ?>" name="id_student">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="title">Título de la tesis</label>
                        <input type="text" class="form-control" id="title" name="title"
                               required>
                    </div>
                    <div class="input-group">
                        <label class="input-group-text" for="asesores">Asesores</label>
                        <select class="form-select" id="asesores" multiple size="5" required name="asesores[]">
                            <?php foreach ($asesors as $asesor) : ?>
                                <option value="<?= $asesor->id ?> ">
                                    <?= $asesor->nombre1 ?> <?= $asesor->nombre2 ?>
                                    <?= $asesor->apellido1 ?> <?= $asesor->apellido2 ?>
                                </option>
                            <?php endforeach ?>

                        </select>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary w-50">Guardar cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal fin -->