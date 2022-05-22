<?php
  include '../conexionbbdd.php';

  $response=new stdClass();

  $array=[];
  $i=0;
  $sql= "select * from producto";
  $result=mysqli_query($con,$sql);
  while ($row=mysqli_fetch_array($result)){
    $obj=new stdClass();
    $obj->codpro=$row['codpro'];
    $obj->nompro=$row['nompro'];
    $obj->despro=$row['despro'];
    $obj->prepro=$row['prepro'];
    $obj->rutinapro=$row['rutinapro'];
    $datos[$i]=$obj;
    $i++;
  }
  $response->datos=$datos;

  mysqli_close($con);
  header('Content-Type: application/json');
  echo json_encode($response);
 ?>
