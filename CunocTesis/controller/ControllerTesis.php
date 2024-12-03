<?php
require_once __DIR__ . '/../model/MangagerTesis.php';
require_once __DIR__ . '/../model/ManagerTesisAsesor.php';
require_once __DIR__ . '/../model/Tesis.php';
require_once __DIR__ . '/../model/TesisAsesor.php';

$managerTesis = new MangagerTesis();
$asesorTesis = new ManagerTesisAsesor();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $action = $_GET['action'];
        switch ($action) {
            case 'addTesis':
                $idEstudiante = $_POST['id_student'];
                $titulo = $_POST['title'];
                $asesores = $_POST['asesores'];
                $tesis = new Tesis(0, $titulo, $idEstudiante, true);
                try {
                    $managerTesis->insert($tesis);
                    $array = $managerTesis->listTesis();
                    $id_tesis = 0;
                    if(sizeof($array) == 0) {
                        $id_tesis = 1;
                    }else{
                        $tesis_ultimo = end($array);
                        $id_tesis = $tesis_ultimo->id;
                    }
                    foreach ($asesores as $asesor) {
                        $nuevoTesisAsesor = new TesisAsesor(0, $id_tesis, $asesor, true);
                        $asesorTesis->insert($nuevoTesisAsesor);
                    }
                    echo "<script type='text/javascript'>alert('Se ha hecho el registro correctamente.');</script>";
                    echo "<script type='text/javascript'>window.location.href='../view/main.php';</script>";
                } catch (Exception $e) {
                    echo "<script type='text/javascript'>alert('Lo sentimos, no se pudo guardar los datos.');</script>";
                    echo "<script type='text/javascript'>window.location.href='../view/main.php';</script>";
                }

                break;
        }
        break;
}
