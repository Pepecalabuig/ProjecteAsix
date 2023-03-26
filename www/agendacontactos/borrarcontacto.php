<?php

session_start();
include('conexion.php');



$telefono = $_GET['telefono'];

$query ="DELETE FROM contactos WHERE telefono = '{$telefono}'";
$resultado = mysqli_query($bd,$query);

if ($resultado){
    header('Location:usuariologueado.php?mensaje=contactoborrado');
}
?>