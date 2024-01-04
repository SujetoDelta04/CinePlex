<?php

require '../config/conection.php';

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model{
    protected $table = 'usuarios';
}

$prueba= usuarios::all();

foreach ($prueba as $value) {
    echo $value['id'];
    echo $value['correo'];
}

?>