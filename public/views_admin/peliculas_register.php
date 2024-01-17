<?php

session_start();

if (!isset($_SESSION['active'])) {
    header('location: views_admin/login.php');
}

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once 'includes/admin_navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once 'includes/aside.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">CRUD's</h1>
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
                            <h3 class="card-title">Registro de peliculas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="../../controllers/admin_controller.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titulo</label>
                                    <input type="text" name="p_tittle" class="form-control" id="exampleInputEmail1" placeholder="Titulo">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Descripcion</label>
                                    <input type="text" name="p_description" class="form-control" id="exampleInputPassword1" placeholder="Descripcion">
                                </div>
                                <div class="form-group">
                                    <select name="p_category" class="form-select" id="">
                                        <option value="1">Accion</option>
                                        <option value="2">Terror</option>
                                        <option value="3">Aventura</option>
                                        <option value="4">Comedia</option>
                                        <option value="5">Drama</option>
                                        <option value="6">Romance</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Portada</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="p_img" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="sub_p_execute" class="btn btn-primary">Registrar</button>
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
                <h5>Title</h5>
                <p>Sidebar content</p>
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
    <script src="../../vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>