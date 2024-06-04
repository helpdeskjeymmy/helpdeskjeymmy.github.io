<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/nuevo.css">
    <link rel="stylesheet" href="../public/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/datatable/responsive.bootstrap4.css">
    <link rel="stylesheet" href="../public/fontawesome/css/all.css">
    <link rel="stylesheet" href="../public/datatable/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../public/css/custom.css">
    <link rel="stylesheet" href="../public/css/tablaadmin.css">
    <link rel="stylesheet" href="../public/css/actualizardatospersonales.css">
    <link rel="stylesheet" href="../public/css/agregarnuevousuario.css">
    <link rel="stylesheet" href="../public/css/actualizardatospersonales.css">
    <link rel="stylesheet" href="../public/css/misdispositivos.css">
    <link rel="stylesheet" href="../public/css/crearreportecliente.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
                <img src="../public/img/mesa-de-ayuda.png" width="75px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="inicio.php">
                            <span class="fas fa-home"></span> Inicio
                            </a>
                        </li>
                    <?php if($_SESSION['usuario']['rol'] == 1) { ?>   
                        <!--Vistas del cliente--> 
                        <li class="nav-item ">
                            <a class="nav-link" href="misDispositivos.php">
                            <span class="fas fa-microchip"></span> Mis dispositivos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="misReportes.php">
                            <span class="fas fa-file-alt"></span> Reportes
                            </a>
                        </li>
                    <?php } else if($_SESSION['usuario']['rol'] == 2) { ?>
                        <!--Vistas del administrador-->
                        <li class="nav-item">
                            <a class="nav-link" href="usuarios.php">
                                <span class="fas fa-users-cog"></span> Gestion de usuarios
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="asignacion.php">
                                <span class="fas fa-address-book"></span> Asignación de equipos
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reportes.php"> 
                            <span class="fas fa-file-alt"></span> Reportes
                            </a>
                        </li>
                    <?php } ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                role="button" data-toggle="dropdown">
                                <span class="fas fa-user-ninja"></span> Usuario: <?php echo $_SESSION['usuario']['nombre'];?></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" 
                            data-toggle="modal" data-target="#modalActualizarDatosPersonales"
                            onclick="obtenerDatosPersonalesInicio('<?php echo $_SESSION['usuario']['id']; ?>')">
                                <span class="fas fa-user-edit"></span> Editar Datos
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">
                                <span class="fas fa-sign-out-alt"></span> Salir
                            </a>
                            </div>
                        </li>                  
                    </ul>
                </div>
        </div>
    </nav>

    <?php 
        include "inicio/modalActualizarDatosPersonales.php";
    ?>