<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <form action="../../functions/admin_functions/admin.php" method="POST">
        <label for="">Correo</label>
        <input type="email" name="admin_email" id="">
        <label for="">Contraseña</label>
        <input type="password" name="admin_password" id="">
        <input type="submit" name="sub_execute" value="Ingresar">
    </form>
</body>
</html>