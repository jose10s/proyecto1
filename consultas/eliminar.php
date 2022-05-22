<?php
      include_once('../conexionbbdd.php');
      $response=new stdClass();
      $codped=$_POST['codped'];
      $sql="DELETE FROM pedido WHERE codped=$codped";
      $result=mysqli_query($con,$sql);
      if ($result) {
        $response->state=true;
      }else {
        $response->state=true;
        $response->detail="no se ha eliminado el producto";
      }
      mysqli_close($con);
      header('Content-Type: application/json');
      echo json_encode($response);
?>
