<?php 
    include "header.php";
    if (isset ($_SESSION['usuario']) && 
    $_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2) {

            $idUsuario = $_SESSION['usuario']['id'];
?>
    <div class="container">
        <div class="card border-0 shadow my-5">
                <div class="card-body p-5">
                    <h1 class="fw-light">Bienvenido <?php echo  $_SESSION['usuario']['nombre'];?></h1>
                    <p class="lead">Aquí están tus datos personales:</p>
                <div class="row mb-3">
                    <div class="col-sm-4 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <strong>Primer apellido:</strong> <span id="paterno"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <strong>Segundo apellido:</strong> <span id="materno"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <strong>Nombre:</strong> <span id="nombre"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <strong>Teléfono:</strong> <span id="telefono"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <strong>Correo:</strong> <span id="correo"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <strong>Fecha de nacimiento:</strong> <span id="edad"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    include "footer.php";
?>
    <script src="../public/js/inicio/personales.js"></script>
    <script>
        let idUsuario = '<?php echo $idUsuario; ?>';
        datosPersonalesInicio(idUsuario);
    </script>
<?php
    } else {
        header("Localtion:../index.html");
    }
?>