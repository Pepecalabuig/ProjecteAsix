<?php
include('cabezera.php');
?>
<!--NAVBAR cerrar sesión-->
<nav class="navbar navbar-expand-lg navbar-light bg-secondary mb-5">
    <div class="container-fluid">
    <a href="usuariologueado.php"> <img src="./imgs/logo.png" alt="logo" height="100px" width="100px"></a>
    
        <!-- BOTÓN CREAR contacto -->
        <button class="btn btn-light btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#crearcontacto">Añadir Contacto</button>

        <!-- MODAL CREAR contaco -->
<div class="modal fade" id="crearcontacto">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- CABECERA FORMULARIO -->
            <div class="modal-header bg-secondary">
            <h5 class="modal-title " id="exampleModalLabel">Crear Contacto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- CUERPO FORMULARIO -->
            <div class="modal-body bg-light">                
            <form class="w-75" action="agregarcontacto.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label  class="form-label">Nombre y apellidos</label>
                                        <input type="text" class="form-control" placeholder="Nombre y Apellidos" name="nombre_apellidos">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Telefono</label>
                                        <input type="text" class="form-control" placeholder="Telefono" name="telefono">
                                    </div>
                                    <div class="mb-3">
                                        <label  class="form-label">Correo</label>
                                        <input type="email" class="form-control" placeholder="Correo Electronico" name="correo">
                                    </div>
                                    <div class="mb-3">
                                        <label  class="form-label">Imagen</label>
                                        <input type="file" class="form-control" placeholder="Inserta aqui tu imagen de contacto" name="imagen">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                 </form>
            </div>  
        </div>    
    </div>
</div>


              
 


        <form action="cerrarSesion.php" class="d-flex">   
        <a href="cerrarsesion.php"><img src="imgs/sesion.png" type="submit" width="70" height="70" > </a>    
            
        </form>
        </div>
    </div>
    </nav>

      <div class="container-fluid">
          <h1 class="d-flex justify-content-center mx-4">-Agenda Contactos-</h1>
            
          
                <!-- contador registros --> 
                    <div class="row justify-content-right">
                        <div class="col-md-3">
                            <?php
                            include ('conexion.php');

                            $query = "SELECT COUNT(*) as total_registros FROM contactos";
                            
                            if ($resultado = mysqli_query($bd, $query)){

                                $datos=mysqli_fetch_assoc($resultado);

                                $contador = $datos['total_registros'];
                                
                                echo "<div class='alert alert-light mt-1 mx-4' role='alert'>
                                <strong>Hay un total de $contador contactos</strong>
                              </div>";
                                
                            }
                            ?>
                            </div>
                           
                        </div>
    
                    
                            
          
        </div><!-- div container cabezera -->

       

        <div class="container"><!-- div container alarma --> 
            <div class="row justify-content-center">
            <div class="col-md-4">
         <!-- alertas -->
         <?php

                    if(isset($_GET['mensaje']) and $_GET['mensaje']=='creado'){
                        ?>
                        
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Contacto creado!</strong> <?php $codigo?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                    <?php
                    }?>
                </div><!-- div col alarma -->                   
                </div><!-- div row alarma --> 
         </div>  <!-- div container alarma --> 

         <div class="container"><!-- div container alarma CONTACTO BORRADO--> 
            <div class="row justify-content-center">
            <div class="col-md-4">
         <!-- alertas -->
         <?php

                    if(isset($_GET['mensaje']) and $_GET['mensaje']=='contactoborrado'){
                        ?>
                        
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Contacto borrado!</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                    <?php
                    }?>
                </div><!-- div col alarma -->                   
                </div><!-- div row alarma --> 
         </div>  <!-- div container alarma --> 

         <div class="container"><!-- div container alarma --> 
            <div class="row justify-content-center">
            <div class="col-md-4">
         <!-- alertas -->
         <?php

                    if(isset($_GET['mensaje']) and $_GET['mensaje']=='nocreado'){
                        ?>
                        
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Contacto NO creado!</strong> <?php $codigo?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                    <?php
                    }?>
                </div><!-- div col alarma -->                   
                </div><!-- div row alarma --> 
         </div>  <!-- div container alarma --> 

            <div class="row justify-content-center">
            <div class="col-md-4">
         <!-- alertas -->
         <?php

                    if(isset($_GET['mensaje']) and $_GET['mensaje']=='borrado'){
                        ?>
                        
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Contacto borrado!</strong> Acaba de borrar a <?php $nombre_apellidos?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                    <?php
                    }?>
                </div><!-- div col alarma -->                   
                </div><!-- div row alarma --> 
         </div>  <!-- div container alarma --> 

        <!-- REPETICION FILAS CONTACTOS CON PHP -->

            <?php
            include('conexion.php');
            //query paginacion

        $sql_registro = mysqli_query($bd, "SELECT COUNT(*) AS total_registro FROM contactos");
        $result_register = mysqli_fetch_array($sql_registro);
        $total_registro = $result_register['total_registro'];

            $por_pagina=5;

            if(empty($_GET['pagina']))
            {
                $pagina = 1;
            }else{
                $pagina = $_GET['pagina'];
            }
            $desde = ($pagina-1)*$por_pagina;
            $total_paginas = ceil($total_registro / $por_pagina);

            //query mostrar contactos
            $query = "SELECT nombre_apellidos,telefono,correo,imagen FROM contactos ORDER BY 1 ASC LIMIT $desde,$por_pagina";
            $resultado = mysqli_query($bd,$query);

            echo "<div class='container-xl'>";
            while($fila=mysqli_fetch_assoc($resultado))
  
  {
       //guardamos los datos en variables
       $nombre_apellidos = strtoupper($fila['nombre_apellidos']);
       $telefono = $fila['telefono'];
       $correo = $fila['correo'];
       $ruta = $fila['imagen'];

       echo "
            <div class='row justify-content-center border border-dark my-2'>
            
            
                <div class='col-md-8 my-1'>
                    <h6 class='nombre'>$nombre_apellidos</h6>
                    <h6 class='telefono'>$telefono - $correo.</h6>
                    <a href='editarcontacto.php?telefono=$telefono' class='btn btn-warning'>Editar</a>
                    <a href='borrarcontacto.php?telefono=$telefono' class='btn btn-danger'>Borrar</a>
                </div>
                <div class='col-md-4 d-flex justify-content-end'>
                <img class=' rounded-circle img-fluid'style='width:100px;height:100px'
                src='$ruta'> 
                </div>

            
    
       
    </div>";
  }
  echo "</div>";
        
  //liberamos memoria
  mysqli_free_result($resultado);

       
            ?>

            <!-- PAGINACION --> 
            <ul class='pagination justify-content-center'>
                <?php
                if ($pagina != 1)
                {
                ?>
                <li class='page-item'><a class='page-link' href='?pagina=<?php echo 1;?>'>Primera</a></li>
                <li class='page-item'><a class='page-link' href='?pagina=<?php echo $pagina -1;?>'><<</a></li>
                <?php
                }
                for($i=1; $i<=$total_paginas; $i++)
                {
                    
                    if ($i == $pagina)
                    {

                        echo '<li class="page-item active"><a class="page-link">'.$i.'</a></li>';

                    }else{

                            echo'<li class="page-item"><a class="page-link" href="?pagina='.$i.'">'.$i.'</a></li>';
                        }
                }
                if($pagina != $total_paginas)
                {
                 ?>       
                <li class='page-item'><a class='page-link' href='?pagina=<?php echo $pagina +1;?>'>>></a></li>
                <li class='page-item'><a class='page-link' href='?pagina=<?php echo $total_paginas;?>'>Última</a></li>
                <?php } ?>
 
                </ul>
                <div class="footer bg-secondary ">
      <style>

* {
  margin: 0;
}
html, body {
  height: 100%;
}
.wrapper {
  min-height: calc(100% - 4rem);
}
.footer {
  height: 2rem;
  background-color: #e2e2e2
}
          
      </style>
      
      <p class="text-center text-light">Proyecto Realizado por Jose Calabuig Moreno ASIX.</p>
    
     
  </div>
  </div>
</body>
</html>