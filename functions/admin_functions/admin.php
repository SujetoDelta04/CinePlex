<?php

require_once '../../config/conection.php';
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
}

$functions = new admin_func();

//* Encargados de llamar a las funciones arriba
if (isset($_POST['sub_execute'])) {
    echo $email = $_POST['admin_email'];
    echo $password_f = $_POST['admin_password'];

    $action = $functions->log($password_f, $email);

    if ($action != false) {
        header('location: ../../public/views_admin/peliculas_crud.php');
    } else {
        echo "<script> alert('Credenciales incorrectas'); </script>";
        echo "<script> window.location='../../public/views_admin/index.php'; </script>";
    }
} else if (isset($_POST['sub_p_execute'])) {
    $tittle = $_POST['p_tittle'];
    $description = $_POST['p_description'];
    $category = $_POST['p_category'];
    $port = $_FILES['p_img']['name'];

    $p_action = $functions->movie($tittle, $description, $category, $port);

    if ($p_action != false) {
        echo "<script> alert('Registro guardado'); </script>";
        echo "<script> window.location='../../public/views_admin/peliculas_register.php'; </script>";
    } else {
        echo "<script> alert('Error al registrar " . $p_action . "'); </script>";
        //echo "<script> window.location='../../public/views_admin/peliculas_register.php'; </script>";
    }
} else if (isset($_GET['out']) == true) {
    session_start();
    session_destroy();
    header('location: ../../public/views_admin/index.php');
} else if (isset($_GET['delete'])) {
    $del = $_GET['delete'];

    $action_d = $functions->delete($del);

    if ($action_d != false) {
        echo "<script> alert('Registro Eliminado'); </script>";
        echo "<script> window.location='../../public/views_admin/peliculas_crud.php'; </script>";
    } else {
        echo "<script> alert('Error al eliminar " . $p_action . "'); </script>";
        echo "<script> window.location='../../public/views_admin/peliculas_crud.php'; </script>";
    }
}