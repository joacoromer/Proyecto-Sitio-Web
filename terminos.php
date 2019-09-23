<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Terminos y Condiciones</title>

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

<h1>Terminos y condiciones</h1>


<h3>Política de Privacidad </h3>

<p>Es prioridad para J&J, el mantener segura la información y datos personales ingresados por los usuarios a este sitio web, y utilizarlos exclusivamente de la manera que los mismos desearían que lo hiciéramos. Nuestro compromiso, entonces, es el siguiente: 

</br>
<p>Salvaguardar toda información que cada usuario comparta con nosotros, bajo los más estrictos estándares de seguridad y confidencialidad. 
</br>
<p>Limitar la obtención, utilización y revelación de la información de los usuarios a lo requerido para la prestación de los servicios respectivos. 
</br>
<p>Permitir que sólo aquellos empleados autorizados debidamente entrenados en el manejo adecuado de la información de los usuarios puedan tener acceso a la misma. 
</br>
<p>No revelar información respecto de los usuarios a entes públicos o privados salvo para el desarrollo de la actividad propia de la tienda, a menos que el usuario hubiera sido informado previamente de tal circunstancia y que éste lo autorice, o que así nos fuera requerido por la legislación aplicable. 
</br>
<p>Procurar mantener los archivos de los usuarios completos, actualizados y libres de errores. 
</br>
<p>Salvo en los campos en que se indique lo contrario, las respuestas a las preguntas sobre datos personales e información son voluntarias, sin que la falta de contestación implique una merma en la calidad o cantidad de los servicios correspondientes, a menos que se indique otra cosa. 
</br>
<p>Reconocer a los usuarios los derechos de acceso, cancelación, rectificación y oposición, así como tienen reconocido el derecho a ser informado de las cesiones realizadas contactándose con J&J a través del formulario de contacto. 
</br>
<p>Adoptar los niveles de seguridad de protección de los datos personales e información legalmente requeridos, e instalar todos los medios y medidas técnicas a nuestro alcance para evitar la pérdida, mal uso, alteración, acceso no autorizado y robo de los datos y la información facilitados a tienda. No obstante, los usuarios deben ser conscientes de que las medidas de seguridad en Internet no son inexpugnables. 
</br>
<p>Garantizar el tratamiento de los datos personales facilitados por los usuarios en un todo de conformidad con los preceptos de la Ley N° 25.326 de Protección de Datos Personales. 
</br>
<p>Otorgar a los usuarios la posibilidad de -una vez registrados en el sitio web - revisar y cambiar la información que nos han enviado durante el proceso de registro. 
</br>
<p>J&J, podrá modificar en cualquier momento los términos y condiciones de estas Políticas de Privacidad y confidencialidad y notificará los cambios a los usuarios publicando una versión actualizada de dichas Políticas en esta sección. 
</br>
<p>Esta Política de Privacidad se aplica a todos los productos y servicios operados por www.J&J.com. No se aplica –en cambio- a sitios a los que el usuario pudiera acceder por medio de links o cualquier otro tipo de vínculo. 
</p>

<h3>Política de Envíos </h3>

<p>Atención: El envío de todos los productos es a cargo del comprador, salvo que se indique lo contrario. La entrega de los productos, incluye el traslado hasta la puerta del domicilio declarado (puerta del edificio en caso de departamentos).
Cualquier persona mayor de 18 años que se encuentre en el domicilio de entrega puede recibir el pedido con número de Orden de Compra, acreditando su identidad. 
</br>
<p>> Lo enviamos a la puerta de tu casa, a través de correo privado (Andreani). El costo del envío lo puedes ver en el tercer paso del carrito de compras. Otra opción es pasar a buscarlo por la sucursal Andreani más cercana a tu domicilio, también lo definís en el tercer paso del carrito de compras.
Una vez acreditado el pago, nosotros comenzamos con la preparación del envío, después de esto, te va a llegar un e-mail con un número de seguimiento, con ese numero vas a saber en que etapa esta tu pedido y en que lugar. 
</br>
Si cuando te llega el producto rechazás la entrega por una razón ajena a la responsabilidad de J&J, el costo del envío no te será devuelto. 
</br>
<p>> Si estás en en Interior del país
Lo enviamos a través de Correo Andreani, puedes elegir, pasar a retirarlo por la sucursal mas cercana o que te llegue a la puerta de tu casa.
Tiempo de entrega: 5 días hábiles una vez acreditado el pago. 
</br>
<p>Las entregas se realizarán de Lunes a Viernes de 10 a 18 horas y Sábados de 9:00 a 12:00 horas. Los Domingos y feriados no se realizan despachos ni entregas. Cualquier comprar realizada después de las 15:00 horas, debe ser considerada como ingresada el día siguiente. 
</br>
<p>La responsabilidad del transporte se limitará a:
* Hacer entrega del producto en el domicilio indicado en la guía de despacho.
* Aguardar la revisión visual del estado del producto para constatar posibles daños físicos.
El transporte no está facultado para armar ni instalar ningún producto.
El encargado del despacho no deberá desarmar puertas, ventanas o modificar los espacios para entregar el producto en el lugar deseado por el cliente. Si el tamaño del producto impide que la entrega se haga en el lugar estipulado por el cliente, éste deberá aceptar la recepción conforme en otro lugar del domicilio que lo permita.
J&J, se reserva el derecho de anular la compra pasados 30 días de almacenamiento desde la primer fecha pactada para la entrega. 
























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






