<?php
  session_start();
  $response=new stdClass();

    if (!isset($_SESSION['codusuario'])) {
      $response->state=false;
      $response->detail="No ha iniciado sesión";
      $response->open_login=true;
    }else {
      include_once('../conexionbbdd.php');
      $codusuario=$_SESSION['codusuario'];
      $codpro=$_POST['codpro'];
      $sql="INSERT INTO pedido (codusuario,codpro,fecped,estado,dirusuarioped,telusuarioped)
      VALUES ($codusuario,$codpro,now(),1,'','')";
      $result=mysqli_query($con,$sql);
      if ($result) {
        $response->state=true;
        $response->detail="Producto añadido";
      }else {
        $response->state=false;
        $response->detail="No se ha añadido el producto";
      }
      mysqli_close($con);
    }

    header('Content-Type: application/json');
    echo json_encode($response);

 ?>
