<?php
session_start();

$id=$_GET['id'];

$link=mysqli_connect("localhost","id9222121_jj", "12345");
mysqli_select_db($link, "id9222121_basejj");

$consulta = "SELECT * FROM prod WHERE id='$id'";
$resultado = mysqli_query($link, $consulta);

if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;

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


  <style>
#imagen {
    height: 450px;
    width: 35%;
    text-align: center;
    float: left;
    margin: 100px 0;
}


#descripcion {
    height: 450px;
    width: 55%;
    float: left;
    margin: 100px 0;
}
  </style>

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


<?php
 $row=mysqli_fetch_assoc($resultado)
 ?>
<div id="imagen">
<img alt="imagenProducto" padding=" 10px 20px" height=300px width=300px src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']);?>" >
</div>

<div id="descripcion">


<h2><?php echo $row['nombre'];?> </h2> <hr><br>
<h5><?php echo $row['categoria']; ?> </h5> <br>
<h3>Precio: $<?php echo $row['precio']; ?> </h3> <br>
<h3>Descripcion: <?php echo $row['descripcion']; ?> </h3> <br>
<h3>Stock disponible: <?php echo $row['stock'];  ?> unidades </h3> <br>

<?php 
      

      if($row['stock']>0) {

        if(!$carro || !isset($carro[md5($row['id'])]['identificador']) ||
        $carro[md5($row['id'])]['identificador']!=md5($row['id'])){ 

        ?><a href="carrito/agregarcar.php?<?php echo SID ?>&id=<?php echo $row['id'];
        ?>"><img src="carrito/check.png" width=20px height=20px border="0" title="Agregar al
        Carrito">Agregar al carrito</a><?php }
        else

        {?><a href="carrito/borrarcar.php?<?php echo SID ?>&id=<?php echo $row['id'];
        ?>"><img src="carrito/delete.png" width=20px height=20px border="0" title="Quitar del Carrito">Quitar del carrito</a><?php
        } ?></td>
        </tr><?php }

      else { 
        echo 'No hay stock disponible de esta unidad';
      }

      ?> 




     
</div>




 


<br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br> <br> <br> <br>


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