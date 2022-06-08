<?php
include("conexion.php");
    $conn=conectar();
    $query = "SELECT * FROM producto";
    $resultado = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <title>Equipamento deportivo</title>
</head>
<body style="background-color: #E8E7FF;">
    <div class="container mt-5">
<div class="row">
<div class="col-8">
        <h1>Articulos Deportivos</h1>
        <br>
        <br>
    <table class="table">
  <thead class="table-success table-striped">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Categoria</th>
      <th scope="col">Imagen</th>
      <th colspan="2">Operaciones</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
        while($row = $resultado->fetch_assoc()){
    ?>
        <tr>
            <th><?php echo $row['idProducto']?></th>
            <th><?php echo $row['nombreProducto']?></th>
            <th><?php echo $row['categoriaProducto']?></th>
            <th><img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagenProducto']);?>"/></th>
            <th><a href="./actualizar.php?id=<?php echo $row['idProducto'] ?>" class="btn btn-info">Editar</a></th>
            <th><a href="./borrar.php?id=<?php echo $row['idProducto'] ?>" class="btn btn-danger">Eliminar</a></th>
        </tr>
        <?php
        }
        ?>
  </tbody>
</table>


    </div>

        <div class="col-4" style="background-color: #C3E0F3;">


            <h1>Modificar Articulos</h1>
            <br>
            <?php if(isset($_SESSION['mensaje'])){?>
                <div class="alert alert-<?= $_SESSION['tipo_mensaje'];?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['mensaje'];?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> ¿</button>
        </div>
            <?php session_unset();}?>
            <br>
            <form action="crear.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nom">Nombre</label>
                    <input type="text" name="nom" class="form-control mb-4" placeholder="Gorra beisbolera" id="nom" required>
                </div>
                <div class="form-group">
                    <label for="categ">Categoria</label>
                    <input type="text" name="categ" class="form-control mb-4" placeholder="Beisbol" id="categ" required>
                </div>
                <div class="form-group">
                    <label for="img">Imagen</label>
                    <input type="file" name="img" class="form-control mb-4"  id="img" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="save">Enviar</button>
                <br>
                <br>
            </form>
        </div>


  </div>
</div>

</body>
</html>