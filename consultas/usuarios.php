<?php
  include '../conexionbbdd.php';
  $emausuario=$_POST['emausuario2'];
  $nomusuario=$_POST['nomusuario2'];
  $apeusuario=$_POST['apeusuario2'];
  $sql="SELECT * FROM USUARIO WHERE emausuario='$emausuario'";
  $result=mysqli_query($con,$sql);
  if ($result) {
    $row=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);
    if ($count==0) {

      $passusuario=$_POST['passusuario2'];
      $passusuario2=$_POST['passusuario3'];
      if ($passusuario!=$passusuario2) {
        header('location: ../registro.php?er=3');
      }else {
        $sql="INSERT into usuario (codusuario,nomusuario,apeusuario,emausuario,passusuario,estado)
        VALUES ('','$nomusuario','$apeusuario','$emausuario','$passusuario',1)";
        $result=mysqli_query($con,$sql);
        $codusu=mysqli_insert_id($con);
        session_start();
        $_SESSION['codusuario']=$codusuario;
        $_SESSION['emausuario']=$emausuario;
        $_SESSION['nomusuario']=$nomusuario;
        header('location: ../tienda.php');
      }
    }else {
      header('location: ../registro.php?er=2');
    }
  }else {
    header('location: ../registro.php?er=1');
  }

 ?>
