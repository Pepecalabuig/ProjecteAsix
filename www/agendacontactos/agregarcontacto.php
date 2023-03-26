

            <!-- INSERTAR USUARIO EN BD -->
            <?php
                                 //si el usuario ha introducido 
             if (isset($_POST['nombre_apellidos']) && isset($_POST['telefono'])&& isset($_POST['correo']) && isset($_FILES['imagen']['tmp_name']))

             {
                 //conexion base datos
                 include('conexion.php');
                //------------------------------------------
                  $nombre_apellidos = $_POST['nombre_apellidos'];
                  $telefono = $_POST['telefono'];
                  $correo = $_POST['correo'];

                  $ruta = "imgs/".$_FILES['imagen']['name'];
                  $imagen = $_FILES['imagen']['tmp_name'];

               

                  //hacemos el insert en base de datos

                  $query = "INSERT INTO `contactos` (`nombre_apellidos`, `telefono`, `correo`,`imagen`) VALUES ('{$nombre_apellidos}', '{$telefono}', '{$correo}', '{$ruta}')";
                  //ejecutamos la query
                 $resultado = mysqli_query($bd,$query);
                 if($resultado)
     {
         header('Location:usuariologueado.php?mensaje=creado');
     }
     else{

        header('Location:usuariologueado.php?mensaje=nocreado');
     }

      echo "<div class='container justify-content-center w-25'>
      <div class='alert alert-success' role='alert'>
          GRUPO creado de forma correcta
      </div>
      <button class='btn btn-secondary' onclick=\"window.location.href='usuariologueado.php'\">Volver</button>
    </div>";  
}
else{
      echo "<div class='container justify-content-center w-25'>
      <div class='alert alert-danger' role='alert'>
          GRUPO NO se ha creado correctamente
      </div>
      <button class='btn btn-danger' onclick=\"window.location.href='usuariologueado.php'\">Volver</button>
    </div>";  
            }
            ?>
            
   
           
               

             
            
           


            
                               
                                    
     
    
    
                                  
                                
      
   
    
    
      
    
  </body>
</html>