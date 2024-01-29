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
    public function new_user($email, $password, $username, $file)
    {
        $pdo = $this->conection();
        $sql_new_user = "INSERT INTO usuarios (correo, contraseña, nombre_usuario, foto) VALUES (?, ?, ?, ?)";
        $password_h = password_hash($password, PASSWORD_DEFAULT);

        if ($file != null) {
            $src = $_SERVER['DOCUMENT_ROOT'] . '/cineplex/multi/user_port/';
            move_uploaded_file($_FILES['p_img']['tmp_name'], $src . $file);
            $insert = $pdo->prepare($sql_new_user);
            $result = $insert->execute(array($email, $password_h, $username, $file));
            return $result;
        } else {
            $insert = $pdo->prepare($sql_new_user);
            $result = $insert->execute(array($email, $password_h, $username, "usuario.png"));
            return $result;
        }
    }
    public function membresia($tipo_mem, $username)
    {
        $pdo = $this->conection();
        $sql_mem="UPDATE usuarios SET membresia=? WHERE nombre_usuario=?";
        $up_user_mem=$pdo->prepare($sql_mem);
        $result=$up_user_mem->execute(array($tipo_mem, $username));
        return $result;
    }
}
