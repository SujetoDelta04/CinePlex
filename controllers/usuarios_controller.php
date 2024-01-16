<?php

require_once '../models/usuarios.php';

class usuarios_controller
{
    private $model;

    public function usuarios_model()
    {
        $this->model = new usuarios_func();

        return $this->model;
    }
    public function login_controller($email, $password)
    {
        $call = $this->usuarios_model();
        $results = $call->login($email, $password);

        return $results;
    }
}

$functions = new usuarios_controller();

if (isset($_POST['sub_execute_login_users'])) {
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];

    $result = $functions->login_controller($email, $password);

    if ($result != false) {
        echo "<script> alert('Inicio de sesion exitoso'); </script>";
        echo "<script> window.location='../public/index.php'; </script>";
    } else {
        echo "<script> alert('Fallo de inicio de sesion, credenciales no encontradas'); </script>";
        echo "<script> window.location='../public/index.php'; </script>";
    }
} else if (isset($_GET['session_out'])) {
    session_start();
    session_destroy();

    echo "<script> alert('Sesion cerrada'); </script>";
    echo "<script> window.location='../public/index.php'; </script>";
}
