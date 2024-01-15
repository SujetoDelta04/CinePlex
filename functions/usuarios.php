<?php

require_once '../config/conection.php';

class usuarios_func
{
    public function conection()
    {
        $start = new connection();
        $pdo = $start->start_connection();

        return $pdo;
    }
    public function login($email, $password)
    {
        $pdo = $this->conection();
        $sql_search_user = "SELECT nombre_usuario, correo, contraseña FROM usuarios WHERE correo=?";
        $t_email = trim($email);
        $t_password = trim($password);

        $search = $pdo->prepare($sql_search_user);
        $search->execute(array($t_email));
        $result = $search->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $filas) {
            $correo = $filas['correo'];
            $contraseña = $filas['contraseña'];
            $nombre = $filas['nombre_usuario'];
        }

        if ($t_email == $correo && password_verify($t_password, $contraseña)) {
            session_start();
            $_SESSION['username'] = $nombre;
            return true;
        } else {
            return false;
        }
    }
}

$functions = new usuarios_func();

if (isset($_POST['sub_execute_login_users'])) {
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];

    $result = $functions->login($email, $password);

    if ($result != false) {
        echo "<script> alert('Inicio de sesion exitoso'); </script>";
        echo "<script> window.location='../public/index.php'; </script>";
    }
    else
    {
        echo "<script> alert('Fallo de inicio de sesion, credenciales no encontradas'); </script>";
        echo "<script> window.location='../public/index.php'; </script>";
    }
}
