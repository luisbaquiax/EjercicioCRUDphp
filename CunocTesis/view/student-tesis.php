<?php
require_once '../model/ManagerStudent.php';
require_once '../model/ManagerAsesor.php';
require_once '../model/Persona.php';

$gestorStudents = new ManagerStudent();
$managerAsesor = new ManagerAsesor();
$students = $gestorStudents->listStudent();
$asesors = $managerAsesor->asesores();
?>
<div class="container">
    <div class="card">
        <h1 class="text-center bg-dark text-white p-3"><strong>Asignación de tesis</strong></h1>
        <hr>
        <h4 class="text-center">Lista de estudiantes</h4>
        <table class="table">
            <thead>
            <tr>
                <th>Carne</th>
                <th scope="col">DPI</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($students as $student) : ?>
                <tr>
                    <th><?= $student->carne ?></th>
                    <td><?= $student->dpi ?></td>
                    <td><?= $student->nombre1 ?> <?= $student->nombre2 ?></td>
                    <td><?= $student->apellido1 ?> <?= $student->apellido2 ?></td>
                    <td><?= $student->correo ?></td>
                    <td><?= $student->telefono ?></td>
                    <td>
                        <?php
                        require('ModalAsigTesis.php');
                        require('ModalAvance.php');
                        ?>
                    </td>
                </tr>
            <?php
            endforeach
            ?>
            </tbody>
        </table>
    </div>
</div>
