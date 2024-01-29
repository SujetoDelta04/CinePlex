<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once 'includes/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Slide bar -->
        <?php require_once 'includes/slider_bar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Conviertete en miembro de CinePlex con nuestras membresias</h1>
                            <h5>Observacion: Debes realizar el pago de la membresia segun el tipo</h4>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5>Miembro Bronce</h5>
                                    <h5>Tipo de membresia: semanal</h5><br>
                                    <h5 class="card-title">Tendras acceso a:</h5><br>
                                    <li>Descuento del 10% con los combos de la confiteria</li>
                                    <li>Descuento de boleteria del 10%</li><br>
                                    <h5>Valor: 10.000</h5>
                                    <a href="" class="btn btn-success">Comprar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5>Miembro Hierro</h5>
                                    <h5 class="card-title">Tipo de membresia: Mensual</h5><br>
                                    <li>Descuento del 20% en confiteria y boleteria</li>
                                    <li>Avisos anticipados sobre las nuevas peliculas de la cartelera</li>
                                    <li>Acceso a salas VIP</li><br>
                                    <h5>Valor: 15.000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5>Miembro Oro</h5>
                                    <h5 class="card-title">Tipo de membresia: Semestral</h5><br>
                                    <li>Descuento del 30% en confiteria y boleteria</li>
                                    <li>Avisos anticipados sobre las nuevas peliculas de la cartelera</li>
                                    <li>Acceso a salas VIP</li>
                                    <li>Descuento en las diferentes sillas ofrecidas por el establecimiento</li><br>
                                    <h5>Valor: 25.000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5>Miembro Diamante</h5>
                                    <h5 class="card-title">Tipo de membresia: Anual</h5><br>
                                    <li>Descuento del 50% en confiteria y boleteria</li>
                                    <li>Avisos anticipados sobre las nuevas peliculas de la cartelera</li>
                                    <li>Acceso a salas VIP</li>
                                    <li>Descuento en las diferentes sillas ofrecidas por el establecimiento</li>
                                    <li>Acceso a servicio de meseros dentro de la sala</li><br>
                                    <h5>Valor: 60.000</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Inicio de sesion</h5>
                <form action="../controllers/usuarios_controller.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ingresa tu Email</label>
                        <input type="email" placeholder="Correo electronico" name="user_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Ingresa tu contraseña</label>
                        <input type="password" placeholder="Contraseña" name="user_password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary" name="sub_execute_login_users">Iniciar Sesion</button>
                </form><br>
                <a href="">¿Olvidaste tu contraseña? Da click aqui</a><br>
                <a href="../controllers/usuarios_controller.php?session_out">Cerrar sesion</a>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>