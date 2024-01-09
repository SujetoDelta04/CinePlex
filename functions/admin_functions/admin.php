<?php 

require_once '../../config/conection.php';
class admin_func
{
    public function log($pass, $email)
    {
        try
        {
            $sql_d="SELECT * FROM administradores";
            $start=new connection();
            $pdo=$start->start_connection();

            $data=$pdo->prepare($sql_d);
            $data->execute();
            $d=$data->fetchAll(PDO::FETCH_ASSOC);

            foreach ($d as $fila) {
                $correo=$fila["correo"];
                $password=$fila["contraseña"];
                $username=$fila["username"];
            }
            echo $correo . "<br>";
            echo $email;
            
            if(password_verify($pass, $password) && $correo == $email)
            {
                session_start();
                $_SESSION['active']=$username;
                return true;
            }
            return false;
        }
        catch(PDOException $e)
        {
            echo "Error " . $e->getMessage();
        }
    }
}

$functions=new admin_func();

if(isset($_POST['sub_execute']))
{
    echo $email=$_POST['admin_email'];
    echo $password_f=$_POST['admin_password'];

    $action=$functions->log($password_f, $email);

    if($action != false)
    {
        header('location: ../../public/views_admin/index.php');
    }
    else
    {
        echo "<script> alert('Credenciales incorrectas'); </script>";
        echo "<script> window.location='../../public/views_admin/login.php'; </script>";
    }
}

?>