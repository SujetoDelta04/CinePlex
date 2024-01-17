<?php

require_once '../models/peliculas.php';

class peliculas_controller
{
    private $model;

    public function peliculas_model()
    {
        $this->model = new peliculas_func();

        return $this->model;
    }

    public function index()
    {
        $call = $this->peliculas_model();
        $array = $call->show();

        return $array;
    }
    public function show_details_controller($id)
    {
        $call = $this->peliculas_model();
        $results = $call->show_details($id);

        return $results;
    }
    public function show_movie_category_controller($cat)
    {
        $call = $this->peliculas_model();
        $result = $call->category($cat);

        return $result;
    }
}

$functions = new peliculas_controller();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $details_call = $functions->show_details_controller($id);
    $details_call_json = json_encode($details_call);
    header('location: ../public/details.php?packet=' . $details_call_json);
} else if (isset($_GET['category'])) {
    $categoria = $_GET['category'];
    $movie_for_category = $functions->show_movie_category_controller($categoria);
    $movie_for_category_json = json_encode($movie_for_category);
    header('location: ../public/category.php?packet=' . $movie_for_category_json);
}
