<?php
include_once('php/conexion.php');

$alert='';
session_start();
if (!empty($_SESSION['active'] AND $_SESSION['privilegios']==1)) {
  header('location:index.php');
}elseif (!empty($_SESSION['active'] AND $_SESSION['privilegios']==2)) {
  header('location:indexCliente.php');
}else {
    header('location:../index.php');
}
 ?>
