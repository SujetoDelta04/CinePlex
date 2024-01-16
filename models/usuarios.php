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

?>
