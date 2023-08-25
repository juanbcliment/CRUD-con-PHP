<?php
include("config_db.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("include/head.php"); ?>
</head>

<body>
  <header>
    <?php include("include/header.php"); ?>
  </header>


  <br><br>
  <H2 class="h2-alinear">Movimientos de toda la familia</H2>
  <br><br>
  <!-- mensaje de que se guardo el movimiento -->
  <div class="ajustar">
    <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php session_unset();
    } ?>
  </div>
  <a href="create.php" class="agregar">+ Agregar movimientos</a>

  <div class="row justify-content-md-center">
    <div class="col-md-11">
      <table class="table table-bordered negrita">
        <thead>
          <tr>
            <th>Familiar</th>
            <th>Rol</th>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Descripcion</th>
            <th>Monto</th>
            <th>Forma de pago</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM movimientos JOIN familiares ON movimientos.id_familia = familiares.id_familia;";
          $result = mysqli_query($mysqli, $query);

          while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>

              <td><a class="linkNombres" href="integrantes.php?id_familia=<?php echo $row['id_familia']; ?>"><?php echo $row['nombre']; ?></a></td>
              <td><?php echo $row['rol']; ?></td>
              <td><?php echo $row['fecha']; ?></td>
              <td><?php echo $row['tipo']; ?></td>
              <td><?php echo $row['descripcion']; ?></td>
              <td><?php echo $row['monto']; ?></td>
              <td><?php echo $row['forma_de_pago']; ?></td>

              <td class="link">
                <a href="update.php?id_mov=<?php echo $row['id_mov']; ?>" class="btn btn-primary">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="delete.php?id_mov=<?php echo $row['id_mov']; ?>" class="btn btn-danger">
                  <i class="far fa-trash-alt"></i>
                </a>
                <a href="detalle.php?id_mov=<?php echo $row['id_mov']; ?>" class="btn btn-info">
                  <i class="far fa-file-alt"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php include("include/footer.php"); ?>
</body>

</html>