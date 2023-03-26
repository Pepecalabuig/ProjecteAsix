<?php
include('cabezera.php');?>

<?php
    //iniciamos sesión
    session_start();
?>

<!-- TÍTULO -->
<h1 class="display-4 text-center text-light sticky-top bg-secondary py-3 mb-5">Cerrar sesión</h1>

<!-- ALERTA CERRANDO SESIÓN -->
<div class='container justify-content-center w-25'>
    <div class='alert alert-success' role='alert'>
        Has cerrado sesión, se redirigirá a la página de inicio...
    </div>

<!-- REDIRECCIÓN Y CIERRE DE SESIÓN -->
    <?php

        //eliminamos variables de sesión
        $_SESSION = array();

        //cerramos sesión
        session_destroy();

        //redirección a la página de inicio
        header("Refresh:3; url=index.php");
    ?>
    </div>
   
