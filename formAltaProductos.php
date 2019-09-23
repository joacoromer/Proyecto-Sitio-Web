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
  <h2 align="center">Alta de producto</h2>
  <br>
    <center>
        <form method="POST" action="altaProductos.php" enctype="multipart/form-data">
            <table border=1px>
            <tr>
                <td>Nombre</td>
                <td><input type="text" required name="nombreproducto" placeholder="Nombre del producto"></td>
            </tr>
            <tr>
                <td>Descripcion</td>
                <td><input type="text" required name="descripcion" placeholder="Descripcion"></td>
            </tr>
            <tr>
                <td>Precio</td>
                <td><input type="number" required name="precio" placeholder="Precio"></td>
            </tr>
            <tr>
                <td>Categoria</td>
                <td><input type="text" required name="categoria" placeholder="Categoria"></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><input type="number" required name="stock" placeholder="Stock"></td>
            </tr>
            <tr>
                <td>Imagen</td>
                <td><input type="file" name="imagen" required></br></br></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit"></td>
            </tr>
            </table>
            <br>
            <h4><a href="Login/edit-inv.php">Volver a opciones</a></h4>
</center>

<br> <br> <br> <br>
        </form>
    <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Todos los derechos reservados</p>
      <div class="list-group">
        <a href="acerca.php" class="list-group-item"><strong>Acerca de Nosotros</strong></a>
        <a href="terminos.php" class="list-group-item"><strong>Terminos y Condiciones</strong></a>
        <a href="contacto.php" class="list-group-item"><strong>Contacto</strong></a>
        <a href="login/edit-profile.php" class="list-group-item"><strong>Mi cuenta</strong></a>
        <a href="carrito/catalogo.php" class="list-group-item"><strong>Todos los Productos</strong></a>
      </div>
    </div>
    <!-- /.container -->
  </footer>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>