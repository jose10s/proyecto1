<?php
      session_start();
      $response=new stdClass();
      include_once('../conexionbbdd.php');

      $codusuario=$_SESSION['codusuario'];
      $dirusuarioped=$_POST['dirusuarioped'];
      $telusuarioped=$_POST['telusuarioped'];

      $sql="UPDATE pedido SET dirusuarioped='$dirusuarioped',telusuarioped='$telusuarioped'
      WHERE estado=1";
      $result=mysqli_query($con,$sql);
      if ($result) {
        $response->state=true;
      }else {
        $response->state=false;
        $response->detail="no se ha realizado pedido";
      }
      
    mysqli_close($con);
    header('Content-Type: application/json');
    echo json_encode($response);

 ?>
