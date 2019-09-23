<?php
session_start();
if(isset($_SESSION['carro'])){
    $carro=$_SESSION['carro']; }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Confirmar Compra</title>
	
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
            <a class="nav-link" href="vercarrito.php"> Carrito de Compras</a>
          </li>'; } ?>

        </ul>
      </div>
    </div>
  </nav>

              <br> <br> <br> 


              <?php
if(!isset($_SESSION['name'])) { echo "<center>No tiene permiso para acceder a esta pagina</center> </br>";
                                echo "<a href='../Login/login.php'><center>Click aqui para iniciar sesion</center></a>"; }

else { ?>
              

<h1 align="center">Productos seleccionados</h1>
<table width="1020" border="0" cellspacing="0" cellpadding="0" align="center">
<tr bgcolor="#C0C0C0" class="tit">
<td width="205"><font size=3>Producto</font> </td>
<td width="307"><font size=3>Precio</font></td>
<td colspan="2" align="left"><font size=3>Cantidad de Unidades</font></td>
</tr>
<?php
$color=array("#C0C0C0","#009999");
$contador=0;
$suma=0;
foreach($carro as $k => $v){
$subto=$v['cantidad']*$v['precio'];
$suma=$suma+$subto;
$contador++;
?> 
<form name="a<?php echo $v['identificador'] ?>" method="get"
action="agregarcar.php?<?php echo SID ?>" id="a<?php echo $v['identificador'] ?>">
<tr bgcolor="<?php echo $color[$contador%2]; ?>" class='prod'>
<td><?php echo $v['producto'] ?></td>
<td><?php echo $v['precio'] ?></td>
<td width="43" align="center"><?php echo $v['cantidad'] ?></td>
<td width="136" align="center">
</tr>
</form>
<?php }?>
</table> 
<div align="center"><span class="prod"><strong> Total de Artículos: <?php echo count($carro);
?></strong></span>
</div><br>
<div align="center"><span class="prod"><strong>Total: $<?php echo number_format($suma,2);
?></strong></span></div>
<br>
<div align="center">
<a href="vercarrito.php?<?php echo SID;?>">Volver al carrito</a>&nbsp;
<a href="repago.php?<?php echo SID;?>&costo=<?php echo $suma; ?>">Comprar</a>
</div>


<br> <br>
<h6 align="center">IMPORTANTE: UNA VEZ DADO EN COMPRAR, NO SE PODRA CANCELAR EL PEDIDO</h1>


<?php } ?>
		

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
        <a href="../Login/edit-profile.php" class="list-group-item"><strong>Mi cuenta</strong></a>
        <a href="catalogo.php" class="list-group-item"><strong>Todos los Productos</strong></a>
      </div>
    </div>
    <!-- /.container -->
  </footer>
			



	</body>
</html>	