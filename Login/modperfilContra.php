<?php
session_start();

$actual=$_POST['contraactual'];
$pass=$_POST['contra'];
$pass1=$_POST['contra1'];
$id= $_SESSION['idusuario'];

$email=$_SESSION['mail'];

$link=mysqli_connect("localhost","id9222121_jj", "12345");
mysqli_select_db($link, "id9222121_basejj");
$result = mysqli_query($link, "SELECT Email, Password, Name, Admin FROM users WHERE Email = '$email'");
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Modificacion del Perfil</title>

  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/shop-homepage.css" rel="stylesheet">

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

<?php
$passActual = password_hash($actual, PASSWORD_DEFAULT);

if($pass == $pass1){
    $passHash = password_hash($pass, PASSWORD_DEFAULT);

    if(password_verify($actual, $row['Password'])){
        $qry="UPDATE users SET Password='$passHash' WHERE Id='$id' ";
        $res=mysqli_query($link, $qry);
        echo "<br><br><center><strong>Se han modificado los datos.</strong></center>";
        echo "<center><strong><a href='edit-profile.php'>Volver</a>";
    }else{echo "<br><br>";
        echo "<center>Las contrase&ntilde;a ingresada no es la actual</center><br>";
        echo "<center><a href='edit-profile.php'>Volver</a></strong></center>"; }


}else{
            echo "<br><br>";
            echo "<center>Las contrase&ntilde;as ingresadas no son iguales, intentelo nuevamente</center><br>"; 
            echo "<center><a href='edit-profile.php'>Volver</a></strong></center>";
        }



?>



<br><br><br><br><br><br>

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

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>