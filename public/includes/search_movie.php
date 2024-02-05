<?php

require_once '../../config/conection.php';

$movie = $_GET['movie'];
$pdo = new connection();
$s_pdo = $pdo->start_connection();
$movie_t = trim($movie);
$sql_search_movie = "SELECT * FROM peliculas WHERE titulo LIKE '%$movie_t%'";

$search_movies = $s_pdo->prepare($sql_search_movie);
$search_movies->execute();
$movie_search = $search_movies->fetchAll(PDO::FETCH_ASSOC);

if ($movie_t != null) {
    foreach ($movie_search as $filas) {
        echo "<li class='list-group-item list-group-item-light'> <a href='../../controllers/peliculas_controller.php?id=" . $filas['id'] . "'>" . $filas['titulo'] . "</a> </li>";
    }
}elseif($movie_t == null){
    echo "";
}
