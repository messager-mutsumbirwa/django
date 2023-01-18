<?php
  require_once '../controleur/control.php'; 

  require_once '../modele/connect_bd.php';
  $cmd="DELETE FROM mag WHERE id = :id";
  $id=$_POST['id'];
  echo $id;
  $result=verifsupp($id,$cmd);
  header('location:../vue/gestion-mag.php');
?>
