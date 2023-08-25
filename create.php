<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("include/head.php"); ?>
</head>

<body>
  <header>
    <?php include("include/header.php"); ?>
  </header>


  <main class="container p-4">
    <div class="row justify-content-md-center">
      <div class="col-md-8">

        <h2>Agregar movimientos</h3>
          <br>
          <!-- Formulario para agregar movimientos -->
          <div class="card card-body color">
            <form action="create.php" method="POST">
              <h4>Responsable del movimiento</h4>
              <select class="form-select" aria-label="Default select example" name="id_familia">
                <option selected>Miembros familiares</option>
                <option value="1">Damian Suarez Padre</option>
                <option value="2">Julia Zambrano Madre</option>
                <option value="3">Alberto Suarez Hijo</option>
                <option value="4">Julia Suarez Hija</option>
                <option value="5">Delia Fernández Abuela</option>
              </select>
              <br><br>
              <p>Tipo de movimientos</p>
              <div class="form-check">
                <input class="form-check-input" type="radio" value="ingreso" name="tipo">
                <label class="form-check-label" for="flexCheckDefault">
                  Ingreso
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" value="egreso" name="tipo">
                <label class="form-check-label" for="flexCheckDefault">
                  Egreso
                </label>
              </div>
              <br>
              <p>Monto</p>
              <div class="form-group">
                <input type="number" name="monto" class="form-control" placeholder="Monto" autofocus>
              </div>
              <br>
              <p>Forma de pago</p>
              <div class="form-check">
                <input class="form-check-input" type="radio" value="efectivo" name="forma_de_pago">
                <label class="form-check-label" for="flexCheckDefault">
                  Efectivo
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" value="transferencia bancaria" name="forma_de_pago">
                <label class="form-check-label" for="flexCheckDefault">
                  Transferencia bancaria
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" value="tarjeta de crédito" name="forma_de_pago">
                <label class="form-check-label" for="flexCheckDefault">
                  Tarjeta de crédito
                </label>
              </div>
              <br><br>
              <p>Fecha del movimiento</p>
              <div class="form-group">

                <input type="date" name="fecha" class="form-control" value="<?php echo date("Y-m-d"); ?>">
              </div>
              <br>
              <p>Descripcion</p>
              <div class="form-group">
                <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion"></textarea>
              </div>

              <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
            </form>
          </div>
      </div>

      <?php

      include("config_db.php");
      if (isset($_POST["save_task"])) {
        $id_familia = $_POST["id_familia"];
        $tipo = $_POST["tipo"];
        $monto = $_POST["monto"];
        $forma_de_pago = $_POST["forma_de_pago"];
        $fecha = $_POST["fecha"];
        $descripcion = $_POST["descripcion"];

        $query = "INSERT INTO movimientos(fecha, tipo, descripcion, monto, forma_de_pago, id_familia) VALUES ('$fecha','$tipo','$descripcion','$monto','$forma_de_pago','$id_familia')";
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
          die("No se pudo cargar el movimiento");
        }

        $_SESSION['message'] = 'Se guardo el movimiento correctamente';
        $_SESSION['message_type'] = 'success';
        header('Location: index.php');
      } ?>

      <?php include("include/footer.php"); ?>
    </div>
  </main>
</body>

</html>