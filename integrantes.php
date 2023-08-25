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
    <?php
    include("config_db.php");
    $id = $_GET['id_familia'];
    $query = "SELECT fecha, tipo, descripcion, monto, forma_de_pago, familiares.nombre, id_mov FROM movimientos RIGHT JOIN familiares ON movimientos.id_familia = familiares.id_familia WHERE familiares.id_familia =$id";
    $resul = mysqli_query($mysqli, $query);
    $integrante = mysqli_fetch_array($resul);
    $nombre = $integrante['nombre'];
    ?>
    <h2 class="h2-alinear"><strong>Movimientos de <?php echo $nombre ?></strong> </h2>
    <br><br>
    <div class="row justify-content-md-center">
        <div class="col-md-11">
            <table class="table table-bordered">
                <thead>
                    <tr>
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

                    $result = mysqli_query($mysqli, $query);

                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>

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