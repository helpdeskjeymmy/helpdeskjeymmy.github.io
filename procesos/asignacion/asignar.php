<?php
$datos = array( 
    'idPersona' => isset($_POST['idPersona']) ? $_POST['idPersona'] : null,
    'idEquipo' => isset($_POST['idEquipo']) ? $_POST['idEquipo'] : null,
    'marca' => isset($_POST['marca']) ? $_POST['marca'] : null,
    'modelo' => isset($_POST['modelo']) ? $_POST['modelo'] : null,
    'color' => isset($_POST['color']) ? $_POST['color'] : null,
    'descripcion' => isset($_POST['descripcion']) ? $_POST['descripcion'] : null,
    'memoria' => isset($_POST['memoria']) ? $_POST['memoria'] : null,
    'discoDuro' => isset($_POST['discoDuro']) ? $_POST['discoDuro'] : null,
    'procesador' => isset($_POST['procesador']) ? $_POST['procesador'] : null
);      

include "../../clases/Asignacion.php";
$Asignacion = new Asignacion();
echo $Asignacion->agregarAsignacion($datos);
?>

