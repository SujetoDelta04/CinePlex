<?php

require '../models/usuarios_model.php';
require '../config/conection.php';

class user_controller{

    public function show()
    {
        return $prueba= usuarios::all();
    }

}


?>