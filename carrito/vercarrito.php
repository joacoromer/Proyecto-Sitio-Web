<?php
session_start();
if(isset($_SESSION['carro'])){
    $carro=$_SESSION['carro']; }
?>
<html>
<head>
<title>Carrito de Compras</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/shop-homepage.css" rel="stylesheet">
<style type="text/css">
.tit {
 font-family: Verdana, Arial, Helvetica, sans-serif;
 font-size: 9px;
 color: #FFFFFF;
}
.prod {
 font-family: Verdana, Arial, Helvetica, sans-serif;
 font-size: 18px;
 color: #333333;
}
h1 {
 font-family: Verdana, Arial, Helvetica, sans-serif;
 font-size: 20px;
 color: #990000;
}

.tab{    
  font-size: 20px;
}

</style>
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
<br>

<?php
if(!isset($_SESSION['name'])) { echo "No tiene permiso para acceder a esta pagina </br>";
                                echo "<a href='../Login/login.php'>Click aqui para iniciar sesion</a>"; }

else { ?>

<h1 align="center">Carrito</h1>
<?php
if(isset($carro) && count($carro)!=0){
?>
<table width="1020" border="0" cellspacing="0" cellpadding="0" align="center">
<tr bgcolor="#333333" class="tit">
<td width="205"><font size=3>Producto</font> </td>
<td width="307"><font size=3>Precio</font></td>
<td colspan="2" align="center"><font size=3>Cantidad de Unidades</font></td>
<td width="100" align="center"><font size=3>Borrar</font></td>
<td width="159" align="center"><font size=3>Actualizar</font></td>
</tr>
<?php
$color=array("#ffffff","#F0F0F0");
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
<input name="cantidad" type="text" id="cantidad" value="<?php echo $v['cantidad']
?>" size="8">
<input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>"> </td>
<td align="center"><a href="borrarcar.php?<?php echo SID ?>&id=<?php echo $v['id']
?>"><img src="delete.png" width="22" height="26" border="0"></a></td>
<td align="center">
<input name="imageField" type="image" src="refresh.png" width="20" height="20"
border="0"></td>
</tr></form>
<?php }?>
</table> 
<div align="center"><span class="prod">Total de Artículos: <?php echo count($carro);
?></span>
</div><br>
<div align="center"><span class="prod">Total: $<?php echo number_format($suma,2);
?></span></div>
<br>
<div align="center">
<a href="catalogo.php?<?php echo SID;?>">Volver al catalogo</a>&nbsp;
<a href="prepago.php?<?php echo SID;?>&costo=<?php echo $suma; ?>">Finalizar Compra</a>
</div>
<?php }else{ ?>
<p align="center"> <span>No hay productos seleccionados</span> <br><a
href="catalogo.php?<?php echo SID;?>">Volver al Catalogo</a>
<?php }?>
</p>

<?php } ?>

<br> <br><br> <br><br> <br><br> <br>
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
