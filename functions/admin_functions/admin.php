<?php 

require_once '../../config/conection.php';
class admin_func
{
    public function show()
    {
        try
        {
            $sql="SELECT * FROM administradores";
            $connection=new connection();
            $pdo=$connection->start_connection();

            $show=$pdo->prepare($sql);
            $show->execute();
            $result= $show->fetchAll(PDO::FETCH_ASSOC);

            return $result;
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
    $array= $functions->show();

    var_dump($array);

    echo "funciono";
}

?>