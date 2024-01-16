<?php

require_once '../config/conection.php';
class admin_func
{
    public function log($pass, $email)
    {
        try {
            $sql_d = "SELECT * FROM administradores";
            $start = new connection();
            $pdo = $start->start_connection();

            $data = $pdo->prepare($sql_d);
            $data->execute();
            $d = $data->fetchAll(PDO::FETCH_ASSOC);

            foreach ($d as $fila) {
                $correo = $fila["correo"];
                $password = $fila["contraseña"];
                $username = $fila["username"];
            }
            //* Funcion trim sirve para eliminar espacios
            $t_pass = trim($pass);
            $t_email = trim($email);

            if (password_verify($t_pass, $password) && $correo == $t_email) {
                session_start();
                $_SESSION['active'] = $username;
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    public function session_output()
    {

        return true;
    }
    public function movie($t, $d, $c, $p)
    {
        try {
            $start = new connection();
            $pdo = $start->start_connection();
            $sql = "INSERT INTO peliculas (titulo, descripcion, portada, categorias_id) VALUES (?, ?, ?, ?)";
            //* Movera la portada a su respectiva carpeta
            $src = $_SERVER['DOCUMENT_ROOT'] . '/cineplex/multi/pelicullas_portadas/';
            move_uploaded_file($_FILES['p_img']['tmp_name'], $src . $p);

            $insert = $pdo->prepare($sql);
            $insert->execute(array($t, $d, $p, $c));

            if ($insert == true) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }
    public function show()
    {
        $start = new connection();
        $pdo = $start->start_connection();
        $sql_ps = "SELECT peliculas.id, titulo, portada, categorias.nombre FROM peliculas JOIN categorias on peliculas.categorias_id=categorias.id;";

        $show = $pdo->prepare($sql_ps);
        $show->execute();
        $data = $show->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public function delete($id)
    {
        $start = new connection();
        $pdo = $start->start_connection();
        $sql_d = "DELETE FROM peliculas WHERE id=?";

        $del = $pdo->prepare($sql_d);
        $operation = $del->execute(array($id));

        return $operation;
    }
    public function update($id, $titulo, $descripcion, $portada, $categorias_id)
    {
        $start = new connection();
        $pdo = $start->start_connection();
        $sql_upp = "UPDATE peliculas SET titulo=?, descripcion=?, portada=?, categorias_id=? WHERE id=?";
        $sql_up = "UPDATE peliculas SET titulo=?, descripcion=?, categorias_id=? WHERE id=?";
        //* SI el parametro de portada esta vacio entonces solo se actualizan el titulo, descripcion y categoria
        if ($portada == null) {
            $up = $pdo->prepare($sql_up);
            $result = $up->execute(array($titulo, $descripcion, $categorias_id, $id));

            return $result;
        }
        //* En caso contratio se actualiza la misma 
        else {
            $src = $_SERVER['DOCUMENT_ROOT'] . '/cineplex/multi/pelicullas_portadas/';
            move_uploaded_file($_FILES['p_img']['tmp_name'], $src . $portada);
            $upp = $pdo->prepare($sql_upp);
            $result = $upp->execute(array($titulo, $descripcion, $portada, $categorias_id, $id));

            return $result;
        }
    }
    public function search_up($id)
    {
        $start = new connection();
        $pdo = $start->start_connection();
        $sql_us = "SELECT * FROM peliculas WHERE id=?";

        $search = $pdo->prepare($sql_us);
        $search->execute(array($id));
        $result = $search->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}

?>
