<?php 
session_start();
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Iniciar Sesion</title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"">
	<link rel="stylesheet" href="css/custom.css">

  </head>
  
  <body>
		<!-- NAVEGACION -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../index.php"><strong>J</strong> & <strong>J</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <li class="nav-item">
                  <a class="nav-link" href="../Login/login.php"> <?php if(isset($_SESSION['name'])){echo $_SESSION['name']; } else {echo "Iniciar Sesion";}   ?> </a>
                </li>
            <a class="nav-link" href="../index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../acerca.php">Acerca de Nosotros</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="../contacto.php"> Contacto</a>
          </li>
          <?php
          if(isset($_SESSION['name'])){echo '
          <li class="nav-item">
            <a class="nav-link" href="../carrito/vercarrito.php"> Carrito de Compras</a>
          </li>'; } ?>

        </ul>
      </div> 
    </div>
  </nav>

              <br> <br> <br> 
              

			  <?php if(isset($_SESSION['admin']) && $_SESSION['admin']=="Si")
							{ echo "<center> <a href='edit-inv.php'> <h3>Editar Inventario</h3></a>
								</br>
								<a href='edit-profile.php'><h3>Editar Perfil</h3></a>
								</br>
								<a href='logout.php'><h3>Cerrar Sesion</h3></a></center> ";   }




              	 elseif(isset($_SESSION['name']))
					{echo "<center><a href='edit-profile.php'><h3>Editar Perfil</h3></a>
					</br>
					<a href='logout.php'><h3>Cerrar Sesion</h3></a></center>"; }

		


        		else {echo '<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">		
							<div class="card">
								<div class="loginBox">
									<img src="images/Logo2.png" class="img-responsive" alt="Logo de la empresa" height="200px" width="300px" >
									<h2>Login</h2>

									<form action="check-login.php" method="post">                           	
										<div class="form-group">									
											<input type="email" class="form-control input-lg" name="email" placeholder="Email" required>        
										</div>							
										<div class="form-group">        
											<input type="password" class="form-control input-lg" name="password" placeholder="Contrase&ntilde;a" required>       
										</div>								    
											<button type="submit" class="btn btn-success btn-block">Iniciar Sesion</button>
									</form>
									<!-- Collapse a form when user click Lost your password? link-->
									<p><a href="#showForm" data-toggle="collapse" aria-expanded="false" aria-controls="collapse">Olvidaste tu contrase&ntilde;a?</a></p>	
									<div class="collapse" id="showForm">
										<div class="well">
											<form action="password-recovery.php" method="post">
												<div class="form-group">										
													<input type="email" class="form-control" name="email" placeholder="Ingrese el email de su cuenta." required>
												</div>
												<button type="submit" class="btn btn-dark">Recuperar contrase&ntilde;a</button>
											</form>								
										</div>
									</div>
															
									<hr><p>Eres nuevo? <a href="index.php" title="Crear Cuenta">Crear una cuenta</a>.</p>								
								</div><!-- /.loginBox -->	
							</div><!-- /.card -->
						</div><!-- /.col -->
					</div><!--/.row-->
				</div><!-- /.container -->';}   ?>


  </br> </br>
		

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	

	</br> </br> </br> </br> </br>
		<!-- Footer -->
		<footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Todos los derechos reservados</p>
      <div class="list-group">
        <a href="../acerca.php" class="list-group-item"><strong>Acerca de Nosotros</strong></a>
        <a href="../terminos.php" class="list-group-item"><strong>Terminos y Condiciones</strong></a>
        <a href="../contacto.php" class="list-group-item"><strong>Contacto</strong></a>
        <a href="edit-profile.php" class="list-group-item"><strong>Mi cuenta</strong></a>
        <a href="../carrito/catalogo.php" class="list-group-item"><strong>Todos los Productos</strong></a>
      </div>
    </div>
    <!-- /.container -->
  </footer>
			



	</body>
</html>	