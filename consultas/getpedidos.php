<?php
  include '../conexionbbdd.php';
  $response=new stdClass();
  session_start();
  $codusuario=$_SESSION['codusuario'];
  $datos=[];
  $i=0;
  $sql= "select *,ped.estado estadoped from pedido ped
  inner join producto pro
  on ped.codpro=pro.codpro
  inner join usuario usu
  WHERE ped.codusuario= $codusuario";
  $result=mysqli_query($con,$sql);
  while ($row=mysqli_fetch_array($result)){
    $obj=new stdClass();
    $obj->codped=$row['codped'];
    $obj->codpro=$row['codpro'];
    $obj->nompro=utf8_encode($row['nompro']);
    $obj->prepro=$row['prepro'];
    $obj->rutinapro=$row['rutinapro'];
    $obj->fecped=$row['fecped'];
    $obj->dirusuarioped=utf8_encode($row['dirusuarioped']);
    $obj->telusuarioped=$row['telusuarioped'];
    $obj->estado=($row['estadoped']);
    $datos[$i]=$obj;
    $i++;
  }
  $response->datos=$datos;

  mysqli_close($con);
  header('Content-Type: application/json');
  echo json_encode($response);
 ?>
