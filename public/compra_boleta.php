<?php require_once '../controllers/peliculas_controller.php'; ?>
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
                            <h1 class="m-0">Llena el formulario y obten tu boleta virtual</h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pelicula</label>
                                    <input type="text" name="c_tittle" class="form-control" id="exampleInputEmail1" placeholder="Ingresa y elije la pelicula que deseas ver">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Funcion</label>
                                    <select class="form-control" name="c_funcion" id="">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tipo de boleta</label>
                                    <select class="form-control" name="c_boleta" id="">
                                        <option value="Normal">Normal</option>
                                        <option value="Premium">Premium</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Elije un asiento</label>
                                    <select class="form-control" name="c_silla" id="">
                                        <option value="Normal">Normal</option>
                                        <option value="Premium">Premium</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Combos disponibles</label>
                                    <select class="form-control" name="c_silla" id="">
                                        <option value="Individual">Individual</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">¿Posees membresia?</label>
                                    <select class="form-control" name="c_mem" id="">
                                        <option value="Miembro Bronce">Miembro Bronce</option>
                                        <option value="Miembro Hierro">Miembro Hierro</option>
                                        <option value="Miembro Oro">Miembro Oro</option>
                                        <option value="Miembro Diamante">Miembro Diamante</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Realizar compra</button>
                            </div>
                        </form>
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
                <a href="user_register.php">¿No te encuentras registrado? Has click aqui</a><br>
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