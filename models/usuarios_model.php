<?php

require '../vendor/autoload.php';

//* Archivos de los cuales heredara nuestra clase usuario lo necesario para ser una clase de eloquent
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model{
    protected $table='usuarios';
}

?>