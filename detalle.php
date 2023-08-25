<?php include("config_db.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("include/head.php"); ?>
</head>

<body>
  <header>
    <?php include("include/header.php"); ?>
  </header>


  <?php
  if (isset($_GET['id_mov'])) {
    $id = $_GET['id_mov'];
    $query = "SELECT * FROM movimientos JOIN familiares ON movimientos.id_familia = familiares.id_familia WHERE id_mov = $id";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $nombre = $row["nombre"];
      $id_familia = $row["id_familia"];
      $tipo = $row["tipo"];
      $monto = $row["monto"];
      $forma_de_pago = $row["forma_de_pago"];
      $fecha = $row["fecha"];
      $descripcion = $row["descripcion"];
    }
  }
  ?>
  <main class="container p-4">
    <div class="row justify-content-md-center">
      <div class="col-md-8">

        <h2 class="display-4"><strong>Detalle del movimiento</strong></h2>
        <br>
        <div class="card card-body color">
          <h3><strong>Persona que realizo el movimiento</strong></h3>
          <p><strong><?php echo $nombre ?></strong></p>
          <h3><strong>Tipo de movimiento</strong></h3>
          <p><strong><?php echo $tipo ?></strong></p>
          <h3><strong>Cantidad</strong></h3>
          <p><strong>$<?php echo $monto ?></strong></p>
          <h3><strong>Forma de pago</strong></h3>
          <p><strong><?php echo $forma_de_pago ?></strong></p>
          <h3><strong>Fecha de la transaccion</strong></h3>
          <p><strong><?php echo $fecha ?></strong></p>
          <h3><strong>Descripcion</strong></h3>
          <p><strong><?php echo $descripcion ?></strong></p>
        </div>
      </div>
    </div>
  </main>


  <?php include("include/footer.php"); ?>
</body>

</html>