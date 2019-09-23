<?php
session_start();

if(isset($_POST['nombre'])) {
  $link=mysqli_connect("localhost","id9222121_jj", "12345");
mysqli_select_db($link, "id9222121_basejj");
  $nombre=$_POST['nombre'];
  $cant = "SELECT * FROM prod WHERE nombre LIKE '%$nombre%'";
  $resultado=mysqli_query($link, $cant);
  if(mysqli_num_rows($resultado)) {$v="True";}  else {$v="False";}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Baja de productos</title>

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
  <h2 align="center">Baja de producto</h2>
  <br>

 <?php  if(!isset($_POST['nombre'])) { ?>

    <center>
        <form method="POST" action="formBajaProductos.php">
            <table>
                <tr>
                    <td>Ingrese el nombre del producto a dar de baja</td>
                    <td> <input type="text" name="nombre" required> </td>
                </tr>
                <tr>
                <td><br></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit"></td>
                </tr>
            </table>

            <br> 
            <h4><a href="Login/edit-inv.php">Volver a opciones</a></h4>


  <?php } 

  elseif (isset($_POST['nombre']) && $v=='True') { ?>

<?php if(mysqli_num_rows($resultado)>0){

?>
                
          
        <table width="672" height="50" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid #000000;">
        <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#DFDFDF" class="catalogo">
        <td width="20"><strong>ID</strong></td>
        <td width="177" align="center"><strong>Nombre</strong></td>
        <td width="177" align="center"><strong>Descripcion</strong></td> 
        <td width="177" align="center"><strong>Precio</strong></td> 
        <td width="177" align="center"><strong>Categoria</strong></td>
        <td width="177" align="center"><strong>Stock</strong></td> 
        <td width="177" align="center"><strong>Imagen</strong></td> 
        <td width="25" height="50" align="right"><strong>Opcion<strong></td>
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
        <td align="center"> <a href="bajaProductos.php?<?php echo SID ?>&id=<?php echo $row['id']; ?>">Dar de baja</a></td>
        </tr>    
        


            <?php } ?> </table>  <?php }

        }
elseif(isset($_POST['nombre']) && $v=='False')  
            {echo '<center><strong>El nombre ingresado no corresponde a un producto</strong></center>';  
            echo '</br>';
              echo '<center><a href="Login/edit-inv.php">Volver a la modificacion</a></center>'; }
?>


<br> <br> <br> <br> <br> <br> <br> <br> <br>

        </form>
    </center>    
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