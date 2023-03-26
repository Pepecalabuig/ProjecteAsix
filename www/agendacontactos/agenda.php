<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../iconos/css/all.min.css">
    <!-- libreria aos scroll -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <title>Ejercicio PHP imágenes</title>
</head>
<body>





<?php



    //iniciamos sesión
    session_start();

    //conexión BD
    include('conexion.php'); 

    //si tenemos la sesión iniciada
    if(isset($_SESSION['nombreUsuario']))
    {
         //mostrar interfaz usuario SI logeado
         include('usuariologueado.php');
    }
    //si estamos intentando iniciar iniciar sesión
    else if(isset($_POST['nombreUsuario']))
    {
        $nombreUsuario = $_POST['nombreUsuario'];
        $passUsuario = $_POST['passUsuario'];

        $query = "SELECT pass
                  FROM usuario
                  WHERE nombre LIKE '{$nombreUsuario}'";
        $resultado = mysqli_query($bd, $query);
        $fila = mysqli_fetch_assoc($resultado);

        //si existe el usuario y la constraseña coincide
        if($fila && password_verify($passUsuario, $fila['pass']))
        {
            //guardamos usuario y contraseña válidos
            $_SESSION['nombreUsuario'] = $nombreUsuario;
            $_SESSION['passUsuario'] = $passUsuario;

            //mostrar interfaz usuario SI logeado
            include('index.php');
        }
        //si no existe usuario o la contraseña no coincide
        else
        {
            //mostrar interfaz usuario NO logeado  
            include('index.php');  
            echo "<div  data-aos='zoom-in-up' class='container justify-content-center w-25'>
                    <div class='alert alert-danger' role='alert'>
                        ERROR al conectar
                    </div>
                   </div>";
        }
    }

?>



<!-- script funcionamiento scroll aos -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

<?php
include('footer.php');?>