<?php
session_start();
$link=mysqli_connect("localhost","id9222121_jj", "12345");
mysqli_select_db($link, "id9222121_basejj");

$nombre=$_POST['nombreproducto'];
$desc=$_POST['descripcion'];
$precio=$_POST['precio'];
$cat=$_POST['categoria'];
$stock=$_POST['stock'];
$imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));


$consulta = "INSERT INTO prod(nombre, descripcion, precio, categoria, imagen, stock) VALUES ('$nombre', '$desc', '$precio', '$cat', '$imagen', '$stock')";

$resultado=mysqli_query($link, $consulta) or die(mysqli_error($link));
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Alta Productos</title>

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
   <br>
    <?php 
    if($resultado) {
      echo "<h5><center>El producto se a&ntilde;adi&oacute; correctamente</center></h5>"; echo "<br>";
      echo "<h4><center><a href='formAltaProductos.php'>Volver al Alta de productos</a></center></h4>";
                   }
    else { echo "<h5><center>Error al insertar producto</center></h5>"; echo "<br>";
           echo "<h4><center><a href='formAltaProductos.php'>Volver al Alta de productos</a></center></h4>";}
    ?>    
  <br>

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

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>