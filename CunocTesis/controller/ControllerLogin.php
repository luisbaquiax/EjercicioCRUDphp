<?php
require_once __DIR__ . '/../model/ManagerUser.php';
require_once __DIR__ . '/../model/Persona.php';

$gestor = new ManagerUser();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $correo = $_POST['email'];
        $password = $_POST['password'];
        $student = $gestor->searchByCorreo($correo);
        if ($student) {
            if(password_verify($password, $student->password)){
                echo "<script type='text/javascript'>window.location.href='../view/main.php';</script>";
            }else{
                echo "<script type='text/javascript'>alert('Contraseña incorrecto.');</script>";
                echo "<script type='text/javascript'>window.location.href='../index.php';</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('No se encuentra registrado.');</script>";
            echo "<script type='text/javascript'>window.location.href='../index.php';</script>";
        }
        break;
    case 'GET':
        break;
}