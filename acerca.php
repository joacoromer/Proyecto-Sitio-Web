<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Acerca de nosotros</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
              
</head>
<body>
     <!-- NAVEGACION -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><strong>J</strong> & <strong>J</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <li class="nav-item">
                  <a class="nav-link" href="Login/login.php"> <?php if(isset($_SESSION['name'])){echo $_SESSION['name']; } else {echo "Iniciar Sesion";}   ?> </a>
                </li>
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="acerca.php">Acerca de Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contacto.php"> Contacto</a>
          </li>
          <?php
          if(isset($_SESSION['name'])){echo '
          <li class="nav-item">
            <a class="nav-link" href="carrito/vercarrito.php"> Carrito de Compras</a>
          </li>'; } ?>

        </ul>
      </div>
    </div>
  </nav>

    </br>
      <br> <h1>Acerca de Nosotros:</h1>
      <hr/> <p>&nbsp;&nbsp;&nbsp;&nbsp;Somos una de las librer&iacute;as y jugueter&iacute;as m&aacute;s importantes de Rosario. Contamos con m&aacute;s de 15 a&ntilde;os de trayectoria, 
        acompa&ntilde;ando a todos los ni&ntilde;os y j&oacute;venes con la vuelta a clases, y a los m&aacute;s grandes con las herramientas para la oficina.</p>

      </br>
      <img src="imagenes/adentro1.jpg" alt="Libreria Adentro" height="500px" width="700px" style="margin: 10px 50px">
    </br>

      <img src="imagenes/Oodles4kids-Store-in-Sellwood-OR.jpg" alt="Libreria Adentro" height="500px" width="700px" style="margin: 10px 50px">
      


      <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Todos los derechos reservados</p>
      <div class="list-group">
        <a href="acerca.php" class="list-group-item"><strong>Acerca de Nosotros</strong></a>
        <a href="terminos.php" class="list-group-item"><strong>Terminos y Condiciones</strong></a>
        <a href="contacto.php" class="list-group-item"><strong>Contacto</strong></a>
        <a href="Login/edit-profile.php" class="list-group-item"><strong>Mi cuenta</strong></a>
        <a href="carrito/catalogo.php" class="list-group-item"><strong>Todos los Productos</strong></a>
      </div>
    </div>
    <!-- /.container -->
  </footer>
      

</body>
</html>