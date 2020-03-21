<?
  require '../db.php';
  
  unset( $_SESSION['abiturient'] );

  header('Location: ../../../index.php');
?>