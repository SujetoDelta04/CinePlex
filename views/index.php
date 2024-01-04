<?php

require '../controllers/usuarios_controller.php';

$prueba=new user_controller();

$prueba2= $prueba->show();

foreach ($prueba2 as $value) {
    echo $value['id'];
    echo $value['correo'];
}

?>