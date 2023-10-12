<?php include("config_db.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('include/head.php'); ?>
</head>

<body>
  <header>
    <?php include("include/header.php"); ?>
  </header>

  <?php
  if (isset($_GET['id_mov'])) {
    $id = $_GET['id_mov'];
    $query = "SELECT * FROM movimientos WHERE id_mov = $id";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $id_familia = $row["id_familia"];
      $tipo = $row["tipo"];
      $monto = $row["monto"];
      $forma_de_pago = $row["forma_de_pago"];
      $fecha = $row["fecha"];
      $descripcion = $row["descripcion"];
    }
  }

  if (isset($_POST['update'])) {
    $id_familia = $conexion->real_escape_string($_POST["id_familia"]);
    $tipo = $conexion->real_escape_string($_POST["tipo"]);
    $monto = $conexion->real_escape_string($_POST["monto"]);
    $forma_de_pago = $conexion->real_escape_string($_POST["forma_de_pago"]);
    $fecha = $conexion->real_escape_string($_POST["fecha"]);
    $descripcion = $conexion->real_escape_string($_POST["descripcion"]);

    $query = "UPDATE movimientos SET fecha = '$fecha', tipo ='$tipo', descripcion = '$descripcion', monto ='$monto', forma_de_pago = '$forma_de_pago', id_familia = '$id_familia'
  WHERE id_mov = $id";
    mysqli_query($mysqli, $query);
    $_SESSION['message'] = 'Se actualizo el movimiento correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');
  }

  ?>
  <div class="container p-4">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2 class="display-4"><strong>Detalle del movimiento</strong></h2>
        <div class="card card-body color">

          <form action="update.php?id_mov=<?php echo $_GET['id_mov']; ?>" method="POST">
            <h3><strong>Persona que realizo el movimiento</strong></h3>
            <select class="form-select" aria-label="Default select example" name="id_familia">
              <option <?php echo $id_familia === "1" ? "selected='selected'" : "" ?> value="1">Damian Suarez Padre</option>
              <option <?php echo $id_familia === "2" ? "selected='selected'" : "" ?> value="2">Julia Zambrano Madre</option>
              <option <?php echo $id_familia === "3" ? "selected='selected'" : "" ?> value="3">Alberto Suarez Hijo</option>
              <option <?php echo $id_familia === "4" ? "selected='selected'" : "" ?> value="4">Julia Suarez Hija</option>
              <option <?php echo $id_familia === "5" ? "selected='selected'" : "" ?> value="5">Delia Fernández Abuela</option>
            </select>
            <br><br>

            <h3><strong>Tipo de movimiento</strong></h3>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="ingreso" name="tipo" <?php echo $tipo == 'ingreso'  ? 'checked' : '' ?>>
              <label class="form-check-label" for="flexCheckDefault">
                Ingreso
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="egreso" name="tipo" <?php echo $tipo == 'egreso'  ? 'checked' : '' ?>>
              <label class="form-check-label" for="flexCheckDefault">
                Egreso
              </label>
            </div>
            <br>
            <h3><strong>Monto</strong></h3>

            <div class="form-group">
              <input type="number" name="monto" class="form-control" value="<?php echo $monto ?>">
            </div>
            <br>
            <h3><strong>Forma de pago</strong></h3>

            <div class="form-check">
              <input class="form-check-input" type="radio" value="efectivo" name="forma_de_pago" <?php echo $forma_de_pago == 'efectivo'  ? 'checked' : '' ?>>
              <label class="form-check-label" for="flexCheckDefault">
                Efectivo
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="transferencia bancaria" name="forma_de_pago" <?php echo $forma_de_pago == 'transferencia bancaria'  ? 'checked' : '' ?>>
              <label class="form-check-label" for="flexCheckDefault">
                Transferencia bancaria
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="tarjeta de crédito" name="forma_de_pago" <?php echo $forma_de_pago == 'tarjeta de crédito'  ? 'checked' : '' ?>>
              <label class="form-check-label" for="flexCheckDefault">
                Tarjeta de crédito
              </label>
            </div>
            <br>
            <h3><strong>Fecha de la transaccion</strong></h3>

            <div class="form-group">
              <input type="date" name="fecha" class="form-control" value="<?php echo $fecha ?>">
            </div>
            <br>
            <h3><strong>Descripcion</strong></h3>
            <div class="form-group">
              <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion"><?php echo $descripcion ?></textarea>
            </div>
            <button class="btn-success" name="update">
              Actualizar
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include('include/footer.php'); ?>
</body>

</html>