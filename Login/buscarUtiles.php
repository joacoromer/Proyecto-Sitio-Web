<?php
ob_start("ob_gzhandler");
session_start();
$link=mysqli_connect("localhost","id9222121_jj", "12345");
mysqli_select_db($link, "id9222121_basejj");


$cantPorPag = 3;
$pagina = isset ($_GET['pagina']) ? $_GET['pagina'] : null;


if(!$pagina){
  $inicio = 0;
  $pagina = 1;
}
else{
  $inicio = ($pagina-1) * $cantPorPag;
} //total paginas

if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;


$qry=mysqli_query($link, "SELECT * FROM prod WHERE categoria='Utiles'");
$totalRegistros=mysqli_num_rows($qry);



$totalPaginas = ceil($totalRegistros/$cantPorPag);
echo "<br><br>";
echo "<strong><center>Numero de registros encontrados: " . $totalRegistros . "</center></strong><br>";
echo "<strong><center>Se muestran paginas de " . $cantPorPag . " registros cada una</center></strong><br>";
echo "<strong><center>Mostrando la pagina " . $pagina . " de " . $totalPaginas . "</center></strong><p>"; 


$vSql = "SELECT * FROM prod WHERE categoria='Utiles' "." limit " .$inicio."," .$cantPorPag ." ";
$qry=mysqli_query($link, $vSql);
$totalRegistros = mysqli_num_rows($qry);


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Utiles</title>

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
<br>
<?php if(mysqli_num_rows($qry)>0){

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
 <td width="25" height="50" align="right"><a href="../carrito/vercarrito.php?<?php echo SID ?>"
title="Ver el contenido del carrito">VER CARRITO<img src="../carrito/changuito.png" width="25" height="21"
border="0"></a></td>
 </tr>


 <?php
 while($row=mysqli_fetch_assoc($qry)){
 ?>

 
 <tr valign="middle" class="catalogo">
 <td align="center"><?php echo $row['id'] ?></td>
 <td align="center"><a href="../MostrarProducto.php?id=<?php echo $row['id']?>"><?php echo $row['nombre']?></a></td>
 <td align="center"><?php echo $row['descripcion'] ?></td>
 <td align="center"><?php echo $row['precio'] ?></td>
 <td align="center"><?php echo $row['categoria'] ?></td>
  <td align="center"><?php echo $row['stock'] ?></td>
 <td align="center"><img height=100px width=100px src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']);?>" > </td>
 <td align="center"><?php

      if($row['stock']>0) {

          if(!$carro || !isset($carro[md5($row['id'])]['identificador']) ||
          $carro[md5($row['id'])]['identificador']!=md5($row['id'])){ 

          ?><a href="../carrito/agregarcar.php?<?php echo SID ?>&id=<?php echo $row['id'];
          ?>"><img src="../carrito/check.png" width=20px height=20px border="0" title="Agregar al
          Carrito">Agregar al carrito</a><?php }
          else

          {?><a href="../carrito/borrarcar.php?<?php echo SID ?>&id=<?php echo $row['id'];
          ?>"><img src="../carrito/delete.png" width=20px height=20px border="0" title="Quitar del Carrito">Quitar del carrito</a><?php
          } ?></td>
          </tr><?php } 
      
      else { 
        echo 'No hay stock disponible de esta unidad';
      }
    

      }   
      
      
      ?>
</table>  

<?php



      if($totalPaginas>1){
        echo "<center> Paginas: ";
          for($i=1; $i<=$totalPaginas;$i++){
              if ($pagina==$i){
                  echo "<strong> ". $pagina . " </strong>";
              }else
              {
                  echo  "<strong><a href='buscarUtiles.php?pagina=" . $i ."'>" . $i . "</a></strong> ";}
                }
                echo "</center>";
              };
          
      
      ?>

<br> <br>
<a href='../index.php'> <h2 align='center'>Volver al menu</h2></a>
<br> <br>

<?php }
else { 
  echo "<center>¡ No se ha encontrado ningún registro !<center> <br/>";
  echo "<h5><center><a href='../index.php'>Volver al menu</a></center><h5>";
  echo "  <br/> <br/> <br/> <br/> <br/>   <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>  <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>"; 
  } 
  ?> 
    
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
<?php
ob_end_flush();
?> 