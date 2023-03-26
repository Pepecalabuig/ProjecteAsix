<?php
include('cabezera.php');

?>
      <h1 class="display-4 text-center text-light sticky-top bg-secondary py-3 mb-5">Agenda Contactes</h1> 

      <div class="container w-75 justify-content-center">
        <div class="row align-items-stretch ">
            <div class="col bg d-none d-lg-block justify-content-center">

            </div>
            <div class="col">
                
                <h2 class="fw-bold text-center py-2">Bienvenido</h2>

            <!--login-->
            <form action="usuariologueado.php" method="post">
                <div class="mb-4">
                    <label for="text"class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="nombreUsuario">
                </div>
                <div class="mb-4">
                    <label for="password"class="form-label">Password</label>
                    <input type="password" class="form-control"name="passUsuario">
                </div>
           
                <div class=""><!--con este componente hacemos que abarque el ancho-->
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
                <div class="my-3">
                    <span>No tienes cuenta? 
                    <a href="creausuario.php">Registrate</a></span>
                   <br> <a href="#">Recuperar Contraseña</a></span>
                </div>
            </form>
           
                        </button>
                    </div>
                </div>
            </div>

        

