<?php
session_start();

$link=mysqli_connect("localhost","id9222121_jj", "12345");
mysqli_select_db($link, "id9222121_basejj");



?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lib-Jug Shopping</title>

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

  <!-- CONTENIDO DE LA PAGINA -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Libreria-Jugueteria</h1>
        <div class="list-group">
          <a href="Login/buscarLibros.php" class="list-group-item"><strong>Libros</strong></a>
          <a href="Login/buscarJuguetes.php" class="list-group-item"><strong>Juguetes</strong></a>
          <a href="Login/buscarAccesorio.php" class="list-group-item"><strong>Accesorios</strong></a>
          <a href="Login/buscarUtiles.php" class="list-group-item"><strong>&Uacutetiles</strong></a>
          <a href="carrito/catalogo.php" class="list-group-item"><strong>Cat&aacute;logo</strong></a>
        </div>

        <br><br>

        <div>
          <h1>Buscador</h1>
          <form m action="Login/buscador2.php" method="POST">
          <input type="text" name="producto" placeholder="Ingrese un producto">
          <input type="submit" value="Buscar">
          </form>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="imagenes/teddy-bears2-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="imagenes/inktober-para-prncipiantes-3.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="imagenes/papers.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">

        <?php

          $qry= "SELECT * FROM prod WHERE stock!=0 LIMIT 6";
          $res = mysqli_query($link, $qry);

          while($fetch=mysqli_fetch_assoc($res)){
            ?>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                <a href="MostrarProducto.php?id=<?php echo $fetch['id']?>"><img class="card-img-top" height=200px width=70px src="data:image/jpg;base64,<?php echo base64_encode($fetch['imagen']);?>" alt="Foto producto"></a>
                <div class="card-body">
                    <h4 class="card-title">
                    <a href="MostrarProducto.php?id=<?php echo $fetch['id']?>"><?php echo $fetch['nombre']?></a>
                    </h4>
                    <h5>$<?php echo $fetch['precio']?></h5>
                    <p class="card-text"><?php echo $fetch['descripcion'] ?></p>
                </div>
                
                </div>
            </div>

         <?php } ?>


        
          

          

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

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