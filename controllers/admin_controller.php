<?php

require_once (__DIR__ . '/../models/admin.php');

class admin_controller
{
    private $model;

    public function admin_model()
    {
        $this->model=new admin_func();

        return $this->model;
    }
    public function log_controller($password_f, $email)
    {
        $call=$this->admin_model();
        $result=$call->log($password_f, $email);

        return $result;
    }
    public function show_controller()
    {
        $call=$this->admin_model();
        $result=$call->show();

        return $result;
    }
    public function movie_controller($tittle, $description, $category, $port)
    {
        $call=$this->admin_model();
        $result=$call->movie($tittle, $description, $category, $port);

        return $result;
    }
    public function delete_controller($id)
    {
        $call=$this->admin_model();
        $result=$call->delete($id);

        return $result;
    }
    public function update_controller($id, $tittle, $description, $port, $category)
    {
        $call=$this->admin_model();
        $result=$call->update($id, $tittle, $description, $port, $category);

        return $result;
    }
    public function search_controller($id)
    {
        $call=$this->admin_model();
        $result=$call->search_up($id);

        return $result;
    }
}

$functions = new admin_controller();

if (isset($_POST['sub_execute'])) {
    echo $email = $_POST['admin_email'];
    echo $password_f = $_POST['admin_password'];

    $action = $functions->log_controller($password_f, $email);

    if ($action != false) {
        header('location: ../public/views_admin/peliculas_crud.php');
    } else {
        echo "<script> alert('Credenciales incorrectas'); </script>";
        echo "<script> window.location='../public/views_admin/index.php'; </script>";
    }
} else if (isset($_POST['sub_p_execute'])) {
    $tittle = $_POST['p_tittle'];
    $description = $_POST['p_description'];
    $category = $_POST['p_category'];
    $port = $_FILES['p_img']['name'];

    $p_action = $functions->movie_controller($tittle, $description, $category, $port);

    if ($p_action != false) {
        echo "<script> alert('Registro guardado'); </script>";
        echo "<script> window.location='../public/views_admin/peliculas_register.php'; </script>";
    } else {
        echo "<script> alert('Error al registrar " . $p_action . "'); </script>";
        //echo "<script> window.location='../../public/views_admin/peliculas_register.php'; </script>";
    }
} else if (isset($_GET['out']) == true) {
    session_start();
    session_destroy();
    header('location: ../public/views_admin/index.php');
} else if (isset($_GET['delete'])) {
    $del = $_GET['delete'];

    $action_d = $functions->delete_controller($del);

    if ($action_d != false) {
        echo "<script> alert('Registro Eliminado'); </script>";
        echo "<script> window.location='../public/views_admin/peliculas_crud.php'; </script>";
    } else {
        echo "<script> alert('Error al eliminar " . $p_action . "'); </script>";
        echo "<script> window.location='../public/views_admin/peliculas_crud.php'; </script>";
    }
} else if (isset($_POST['sub_up_execute'])) {
    $id = $_POST['p_id'];
    $tittle = $_POST['p_tittle'];
    $description = $_POST['p_description'];
    $category = $_POST['p_category'];
    $port = $_FILES['p_img']['name'];

    if ($id == null) {
        echo "<script> alert('Adstente de modificar el id'); </script>";
        echo "<script> window.location='../public/views_admin/peliculas_update.php?id=" . $id . "'; </script>";
    } else {
        $update = $functions->update_controller($id, $tittle, $description, $port, $category);

        if ($update == true) {
            echo "<script> alert('Registro actualizado'); </script>";
            echo "<script> window.location='../public/views_admin/peliculas_update.php?id=" . $id . "'; </script>";
        } else {
            echo "<script> alert('Error de actualizacion'); </script>";
            echo "<script> window.location='../public/views_admin/peliculas_update.php?id=" . $id . "'; </script>";
        }
    }
}

?>