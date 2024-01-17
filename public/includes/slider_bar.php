<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">CinePlex</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info text-light">
                    <?php
                    if(isset($_SESSION['username']) == null)
                    {
                        echo "<p> Sesion inactiva </p>";
                    }
                    else
                    {
                        echo $_SESSION['username'];
                    }
                    ?>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Categorias
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../controllers/peliculas_controller.php?category=Accion" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Accion</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../controllers/peliculas_controller.php?category=Terror" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Terror</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../controllers/peliculas_controller.php?category=Aventura" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Aventura</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../controllers/peliculas_controller.php?category=Comedia" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Comedia</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../controllers/peliculas_controller.php?category=Drama" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Drama</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../controllers/peliculas_controller.php?category=Romance" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Romance</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Comprar boletas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Confiteria
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Membresia
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
</body>

</html>