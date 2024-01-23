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
        $sql_show_details="SELECT peliculas.id, peliculas.titulo, peliculas.portada, peliculas.descripcion, categorias.nombre FROM peliculas JOIN categorias ON peliculas.categorias_id=categorias.id WHERE peliculas.id=?";

        $details=$pdo->prepare($sql_show_details);
        $details->execute(array($id));
        $show_details=$details->fetchAll(PDO::FETCH_ASSOC);

        return $show_details;
    }
    public function category($cat)
    {
        $pdo=$this->conection();
        $sql_show_movie_category="SELECT peliculas.id, peliculas.titulo, peliculas.portada, peliculas.descripcion, categorias.nombre FROM peliculas JOIN categorias ON peliculas.categorias_id=categorias.id WHERE nombre=?";

        $search=$pdo->prepare($sql_show_movie_category);
        $search->execute(array($cat));
        $movie_category=$search->fetchAll(PDO::FETCH_ASSOC);
        //* Devuelve un array
        return $movie_category;
    }
}

?>