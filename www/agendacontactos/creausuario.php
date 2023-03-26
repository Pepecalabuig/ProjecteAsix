<?php
include('cabezera.php');
?>
    
<?php
    //iniciamos sesión
    session_start();
?>
    <!-- TÍTULO -->
    <h1 class="display-4 text-center text-light sticky-top bg-secondary py-3 mb-5">Crear usuario</h1>

    <?php
    //comprobamos si se ha creado un contacto
    if(isset($_POST['nombreUsuario']))
    {
        //guardamos nombre y pass
        $nombre = $_POST['nombreUsuario'];
        $pwd = $_POST['passUsuario'];

         //ciframos la contraseña
         $contra = password_hash($pwd, PASSWORD_DEFAULT);
       

         //conexión BD
        include('conexion.php');  

        //insert SQL
        $query = "INSERT INTO `usuario` (`nombre`, `pass`) VALUES ('{$nombre}', '{$contra}')";
        mysqli_query($bd,$query);

        //alerta contacto creado correctamente y botón volver
        echo "<div class='container justify-content-center w-25'>
                <div class='alert alert-success' role='alert'>
                    USUARIO creado de forma correcta
                </div>
                <button class='btn btn-secondary' onclick=\"window.location.href='usuariologueado.php'\">Volver</button>
              </div>";  
    }
    //si no se han introducido datos, mostramos el formulario
    else
    {
    ?>
        <!-- CONTENEDOR -->
        <div class="container justify-content-center w-25">

            <!-- FORMULARIO -->
            <form name="MiForm" id="MiForm" method="post" action="creausuario.php">        
            <div class="form-group mb-3">

                <!-- Nombre Usuario -->
                <label for="nombreUsuario" class="form-label">Introduce el nombre de usuario</label>      
                <input type="text" class="form-control" name="nombreUsuario" required>    

                <!-- Password Usuario -->
                <label for="passUsuario" class="form-label">Introduce la contraseña</label>  
                <input type="password" class="form-control" name="passUsuario" required> 
              

            </div>              
                            
            <!-- footer -->  
            <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Cancelar</button>
            <button name="submit" class="btn btn-warning">Crear usuario</button>
            
            </form>
        </div>

    <?php } ?>

</body>
</html>