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
            
            if($email == $correo && password_verify('AdamBlast', $password))
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
    echo $email=$_POST['admin_email'] . "\n";
    echo $password_f=$_POST['admin_password'];

    $action=$functions->log($password_f, $email);

    if($action != false)
    {
        //header('location: ../../public/views_admin/index.php');
    }
    else
    {
        echo "Error";
    }
}

?>