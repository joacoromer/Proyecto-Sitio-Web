<?php
session_start();
$link=mysqli_connect("localhost","id9222121_jj", "12345");
mysqli_select_db($link, "id9222121_basejj");


if(isset($_GET['id'])){
$_SESSION['idTemp']=$_GET['id'];}


if(isset($_GET['respuesta'])) {
$id = $_SESSION['idTemp'];
$consulta = "DELETE FROM prod WHERE id='$id'";
$resultadoFinal=mysqli_query($link, $consulta); }

else {
  $id = $_SESSION['idTemp'];
  $cant = "SELECT * FROM prod WHERE id='$id'";
  $resultado=mysqli_query($link, $cant);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Baja Productos</title>

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
<br> <br>
        <?php
            
            if(!isset($_GET['respuesta'])) { ?>
              
            <table width="672" height="50" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid #000000;">
            <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#DFDFDF" class="catalogo">
            <td width="20"><strong>ID</strong></td>
            <td width="177" align="center"><strong>Nombre</strong></td>
            <td width="177" align="center"><strong>Descripcion</strong></td> 
            <td width="177" align="center"><strong>Precio</strong></td> 
            <td width="177" align="center"><strong>Categoria</strong></td>
            <td width="177" align="center"><strong>Stock</strong></td> 
            <td width="177" align="center"><strong>Imagen</strong></td> 
            </tr>

            <?php
            while($row=mysqli_fetch_assoc($resultado)){
            ?>


            <tr valign="middle" class="catalogo">
            <td align="center"><?php echo $row['id'] ?></td>
            <td align="center"><a href="../MostrarProducto.php?id=<?php echo $row['id']?>"><?php echo $row['nombre']?></a></td>
            <td align="center"><?php echo $row['descripcion'] ?></td>
            <td align="center"><?php echo $row['precio'] ?></td>
            <td align="center"><?php echo $row['categoria'] ?></td>
            <td align="center"><?php echo $row['stock'] ?></td>
            <td align="center"><img height=100px width=100px src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']);?>" > </td>
            </tr>    
            </table>
              <br> <br>
            <center><h4>Una vez borrado el producto, no se podra volver atras</h4> <br>

            <a href="bajaProductos.php?<?php echo SID ?>&respuesta=<?php echo 'Eliminado'; ?>">Eliminar producto</a>

            <a href="Login/edit-inv.php">Volver</a></center>

            <?php }  }

            elseif($resultadoFinal) {
              
                echo "<center>El producto se elimino correctamente</center>"; echo "<br>";
                echo "<center><a href='formBajaProductos.php'>Volver a la baja de productos</a></center>";
            }
            else { echo "<center><strong>Error</strong>, el id ingresado no corresponde a un producto</center>";  echo "<br>";
                echo "<center><a href='formBajaProductos.php'>Volver a la baja de productos</a></center>"; }
        ?>   

<br> <br>             


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

