<?php
session_start();
$link=mysqli_connect("localhost","id9222121_jj", "12345");
mysqli_select_db($link, "id9222121_basejj");



?>
<html>
<head>
<title>Finalizar Compra</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"">
	<link rel="stylesheet" href="css/custom.css">
<style type="text/css">

.tit {
 font-family: Verdana, Arial, Helvetica, sans-serif;
 font-size: 9px;
 color: #FFFFFF;
}
.prod {
 font-family: Verdana, Arial, Helvetica, sans-serif;
 font-size: 9px;
 color: #333333;
}
h1 {
 font-family: Verdana, Arial, Helvetica, sans-serif;
 font-size: 20px;
 color: #990000;
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
<br><br><br>
<?php
if(!isset($_SESSION['name'])) { echo "<center>No tiene permiso para acceder a esta pagina</center> </br>";
                                echo "<a href='../Login/login.php'><center>Click aqui para iniciar sesion</center></a><br><br>"; }

else { $carro=$_SESSION['carro'];
    //$products es la variable que usaremos para mostrar los productos en esta página
    //(separados por '+')
    $products='';
    //$products2 es la que usaremos para enviar a Paypal (separados por ',')
    $products2='';
    
    $total = 0;
    $band = 0;
     foreach($carro as $k => $v){
     $unidad=$v['cantidad']>1?" unidades de ":" unidad de ";
     $products.=$v['cantidad'].$unidad.$v['producto']."+";
     $products2.=$v['cantidad'].$unidad.$v['producto'].", ";
    
    $idp=$v['id'];
    
    $qry="SELECT * FROM prod WHERE id='$idp'";
    $res=mysqli_query($link, $qry);
    $row=mysqli_fetch_assoc($res);
    $nueva=($row['stock']-$v['cantidad']);
    
    $qry2 = "UPDATE prod SET stock='$nueva' WHERE id='$idp'";
    mysqli_query($link, $qry2);

   

    unset($carro);
    
    $_SESSION['carro']=$carro;
    
    }
    
    
    
    
    //eliminamos el último '+':
    $products=substr($products,0,(strlen($products)-1));
    //eliminamos la última coma y el espacio que sigue a la misma:
    $products2=substr($products2,0,(strlen($products2)-2)); ?>

<form action="https://www.paypal.com/cgi-bin/webscr" name="f1" id="f1"method="post">
<fieldset>
<legend class="prod"><strong>Finalizar la Compra</strong> <a href="#" onClick="javascript:window.open('https://www.paypal.com/cgibin/webscr?cmd=xpt/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, width=400, height=350');">
<img src="https://www.paypal.com/en_US/i/bnr/horizontal_solution_PP.gif" alt="SolutionGraphics" border="0" align="absmiddle"></a></legend>
<input type="hidden" name="shipping" value="0">
<input type="hidden" name="cbt" value="Presione aquí para volver a www.nuestrositio.com >>">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="rm" value="2">
<input type="hidden" name="bn" value="J&J Libreria-Jugueteria">
<input type="hidden" name="business" value="jyjliberia@gmail.com">
<input type="hidden" name="item_name" value="<?php echo $products2; ?>">
<input type="hidden" name="item_number" value="<?php echo $_SESSION['name'] ?>">
<input type="hidden" name="amount" value="<?php echo number_format($_GET['costo'],2) ?>">
<input type="hidden" name="custom" value="<?php echo $_GET['costo'] ?>">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="image_url" value="">
<input type="hidden" name="return" value="http://www.nuestrodominio.com/ipn_success.php">
<input type="hidden" name="cancel_return" value="http://www.nuestrodominio.com/ipn_error.php">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="0">
<!-- Mostramos el detalle de la compra -->
<table width="50%" border="0" align="center" cellpadding="3" cellspacing="0"
bgcolor="#EABB5D" style=" border-color:#000000; border-style:solid;borderwidth:1px;">
<tr>
<td align="left" valign="top"><span class="prod"><strong>Detalle de los Productos
Seleccionados</strong>:</span><br>
<span class="texto1negro"> </span><span class="prod"><strong>Productos:</strong>
<?php echo $products; ?><br>
<strong>Pecio Total:</strong> $<?php echo number_format($_GET['costo'],2) ?>
</span></td>
</tr>
</table>
<input type="submit" name="Submit" value="Enviar">
</fieldset>
</form>

<?php } ?>

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