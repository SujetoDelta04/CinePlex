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
    public function new_user_controller($email, $password, $username, $file)
    {
        $call = $this->usuarios_model();
        $results = $call->new_user($email, $password, $username, $file);

        return $results;
    }
    public function membresia_controller($tipo_membresia, $username)
    {
        $call = $this->usuarios_model();
        $results = $call->membresia($tipo_membresia, $username);

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
} else if (isset($_POST['r_u_execute'])) {
    $email = $_POST['u_email'];
    $password = $_POST['u_password'];
    $username = $_POST['u_name'];
    $file = $_FILES['u_img']['name'];

    $result = $functions->new_user_controller($email, $password, $username, $file);

    if ($result == true) {
        echo "<script> alert('Registro realizado con exito. Ya puedes iniciar sesion'); </script>";
        echo "<script> window.location='../public/index.php'; </script>";
    } else {
        echo "<script> alert('Error de registro, revisa los datos ingresados'); </script>";
        echo "<script> window.location='../public/index.php'; </script>";
    }
} else if (isset($_GET['mem'])) {
    session_start();
    $mem = $_GET['mem'];

    if (isset($_SESSION['username']) == null) {
        echo "<script> alert('No has iniciado sesion. Inicia sesion y vuelve a intentarlo'); </script>";
        echo "<script> window.location='../public/membresias.php'; </script>";
    } else {
        echo $username = $_SESSION['username'];
        switch ($mem) {
            case 'Miembro_Bronce':
                $result = $functions->membresia_controller($mem, $username);
                if ($result == true) {
                    echo "<script> alert('Transaccion exitosa. Ahora eres parte de la comunidad cineplex como " . $mem . "'); </script>";
                    echo "<script> window.location='../public/membresias.php'; </script>";
                } else {
                    echo "<script> alert('Hubo un fallo en la transaccion. Intentalo mas tarde'); </script>";
                    echo "<script> window.location='../public/membresias.php'; </script>";
                }
                break;
            case 'Miembro_Hierro':
                $result = $functions->membresia_controller($mem, $username);
                if ($result == true) {
                    echo "<script> alert('Transaccion exitosa. Ahora eres parte de la comunidad cineplex como " . $mem . "'); </script>";
                    echo "<script> window.location='../public/membresias.php'; </script>";
                } else {
                    echo "<script> alert('Hubo un fallo en la transaccion. Intentalo mas tarde'); </script>";
                    echo "<script> window.location='../public/membresias.php'; </script>";
                }
                break;
            case 'Miembro_Oro':
                $result = $functions->membresia_controller($mem, $username);
                if ($result == true) {
                    echo "<script> alert('Transaccion exitosa. Ahora eres parte de la comunidad cineplex como " . $mem . "'); </script>";
                    echo "<script> window.location='../public/membresias.php'; </script>";
                } else {
                    echo "<script> alert('Hubo un fallo en la transaccion. Intentalo mas tarde'); </script>";
                    echo "<script> window.location='../public/membresias.php'; </script>";
                }
                break;
            case 'Miembro_Diamante':
                $result = $functions->membresia_controller($mem, $username);
                if ($result == true) {
                    echo "<script> alert('Transaccion exitosa. Ahora eres parte de la comunidad cineplex como " . $mem . "'); </script>";
                    echo "<script> window.location='../public/membresias.php'; </script>";
                } else {
                    echo "<script> alert('Hubo un fallo en la transaccion. Intentalo mas tarde'); </script>";
                    echo "<script> window.location='../public/membresias.php'; </script>";
                }
                break;
        }
    }
}
