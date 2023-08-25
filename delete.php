<?php 


 if (isset($_GET['id_mov'])) {
  include("config_db.php"); 

  $id = $_GET['id_mov'];
  $query = "DELETE FROM movimientos WHERE id_mov = $id";
  $result = mysqli_query($mysqli, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'El Movimiento se elimino correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php'); 
 }
