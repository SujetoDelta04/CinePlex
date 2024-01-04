<?php

//* Se llama al archivo con los datos
require '../vendor/autoload.php';

//* Archivos encargados de generar la conexion con la bd via eloquent
use illuminate\Database\Capsule\Manager as Capsule;

//* Se crea una variable donde se almacenan los datos retornados
$config=require 'config.php';

//* Se crea un nuevo archvio de tipo Capsule, que sirve para iniciar eloquent
$conection=new Capsule();

//* Se agregan los datos de conexion, usando el archivo previamente hecho
$conection->addConnection($config['database']);

//* Se inicia la conexion
$conection->bootEloquent();

?>