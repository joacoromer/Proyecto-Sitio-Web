<?php
session_start();
extract($_REQUEST);
$id=$_GET['id'];
$link=mysqli_connect("localhost","id9222121_jj", "12345");
mysqli_select_db($link, "id9222121_basejj");

if(!isset($cantidad)){$cantidad=1;}

$qry=mysqli_query($link, "select * from prod where id='".$id."'");
$row=mysqli_fetch_array($qry);

$qry1=mysqli_query($link, "select * from prod where id='".$id."'");
$row2=mysqli_fetch_array($qry1);

$cantidad=round($cantidad);

if($cantidad<1){
    ?>
    <script>
    alert('No puedes ingresar cantidades negativas.');
    window.location.href='vercarrito.php';
    </script> 
    <?php
}

elseif($row2['stock']<$cantidad){ ?>
    <script>
    alert('La cantidad del producto supera el stock');
    window.location.href='vercarrito.php';
    </script> 
    <?php
}


else {

 if(isset($_SESSION['carro']))
    $carro=$_SESSION['carro'];

    $carro[md5($id)]=array('identificador'=>md5($id),'cantidad'=>$cantidad,'producto'=>$row['nombre'],'precio'=>$row['precio'],'id'=>$id);
    $_SESSION['carro']=$carro;

    header("Location:vercarrito.php?".SID);
}
?> 
