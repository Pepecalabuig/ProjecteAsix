<?php
include('cabezera.php');
include('conexion.php');

$telefono = $_GET['telefono'];


$query = "SELECT * FROM contactos WHERE telefono='{$telefono}'";
$resultado=mysqli_query($bd,$query);

$fila=mysqli_fetch_assoc($resultado);

?>



  <div class="container-fluid">
          <h1 class="d-flex justify-content-left">Editar Contactos</h1>
          <div class="contaniner">

          <a href="usuariologueado.php" class="class">Volver a Inicio</a>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
           

            <!-- FORMULARIO PAGINA -->
          <form class="w-75" action="update.php?telefono=<?php echo $_GET['telefono']; ?>" method="post">
                <div class="mb-3">
                    <label  class="form-label">Nombre y apellidos</label>
                    <input type="text" class="form-control" placeholder="nombre_apellidos" name="nombre_apellidos" value="<?php echo $fila['nombre_apellidos']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Telefono</label>
                    <input type="visually-hidden-focusable" placeholder="telefono" class="form-control"  name="telefono" value="<?php echo $fila['telefono']?>">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Correo</label>
                    <input type="email" class="form-control" placeholder="correo"  name="correo" value="<?php echo $fila['correo']?>" >
                </div>
                <button type="submit" class="btn btn-light">Modificar</button>       
               
              
             </form>
           
             </div>
        </div>
    </div>           