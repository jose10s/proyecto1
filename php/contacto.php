    <?php
      $destino = "fidisaf@gmail.com";
      $nombre = $_POST["nombre"];
      $email = $_POST["email"];
      $telefono = $_POST["telefono"];
      $asunto = $_POST["asunto"];
      $mensaje = $_POST["mensaje"];
      $contenido = "Nombre: " . $nombre ."<br>". "\nEmail: " . $email ."<br>"."\nTelefono: " . $telefono ."<br>"."\nAsunto: " . $asunto ."<br>"."\nMensaje: " . $mensaje;

      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

      $headers .= 'From: '.$destino."\r\n".
      'X-Mailer: PHP/' . phpversion();

      if ($_POST['enviar']) {
        if (!mail($destino, "prueba", $contenido, $headers)) {
          echo 'alert("HA IDO MAL")';
        }
      } else {
        alert("HA IDO BIEN");
      }
      header("Location:../gracias.html");

     ?>
