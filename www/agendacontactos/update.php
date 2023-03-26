<?php

if(isset($_GET["telefono"]))
                {
$nombre_apellidos = $_POST['nombre_apellidos'];
$telefono = $_GET['telefono'];
$correo = $_POST['correo'];

$query= "UPDATE contactos SET nombre_apellidos = '{$nombre_apellidos}', correo='{$correo}', telefono='{$telefono}' WHERE telefono = $telefono;";
$resultado = mysqli_query($bd,$query);
                }

if($resultado){
    header('Location:editarcontacto.php?mensaje=editado');
}else{
    header('Location:editarcontacto.php?mensaje=falloeditado');
}

?>