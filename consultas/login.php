<?php
  include '../conexionbbdd.php';
  $emausuario=$_POST['emausuario'];
  $sql="SELECT * FROM USUARIO WHERE emausuario='$emausuario'";
  $result=mysqli_query($con,$sql);
  if ($result) {
    $row=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);
    if ($count!=0) {
      $passusuario=$_POST['passusuario'];
      if ($row['passusuario']!=$passusuario) {
        header('location: ../login.php?e=3');
      }else {
        session_start();
        $_SESSION['codusuario']=$row['codusuario'];
        $_SESSION['emausuario']=$row['emausuario'];
        $_SESSION['nomusuario']=$row['nomusuario'];
        header('location: ../tienda.php');
      }
    }else {
      header('location: ../login.php?e=2');
    }
  }else {
    header('location: ../login.php?e=1');
  }

 ?>
