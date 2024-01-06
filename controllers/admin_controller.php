<?php

require __DIR__ . '/../models/admin_model.php';
require __DIR__ . '/../config/conection.php';

$admin=new admin();

$admin->correo='alfremelo9@gmail.com';
$admin->contraseña=openssl_encrypt('AdamBlast04', 'aes-256-cbc', '1');

$admin->save();

return "<script> alert('Creado con exito'); </script>";

?>