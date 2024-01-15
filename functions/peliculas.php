<?php

require_once '../config/conection.php';

class peliculas_func
{
    private $start;
    private $pdo;

    public function conection()
    {
        $this->start=new connection();
        $this->pdo=$this->start->start_connection();
        
        return $this->pdo;
    }
    public function show()
    {
        $pdo=$this->conection();
        $sql_s="SELECT peliculas.id, categorias.nombre, titulo, portada FROM peliculas JOIN categorias ON peliculas.categorias_id=categorias.id";

        $show=$pdo->prepare($sql_s);
        $show->execute();
        $result=$show->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public function show_details($id)
    {
        $pdo=$this->conection();
        $sql_show_details="SELECT * FROM peliculas JOIN categorias ON peliculas.categorias_id=categorias.id WHERE peliculas.id=?";

        $details=$pdo->prepare($sql_show_details);
        $details->execute(array($id));
        $show_details=$details->fetchAll(PDO::FETCH_ASSOC);

        return $show_details;
    }
}

$functions=new peliculas_func();

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $details_call=$functions->show_details($id);
    $details_call_json=json_encode($details_call);
    header('location: ../public/details.php?packet=' . $details_call_json);
}

?>