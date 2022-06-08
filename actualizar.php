<?php
    include("conexion.php");
    $conn=conectar();

    $id = $_GET['id'];

    $sql = "SELECT * FROM producto WHERE idProducto = '$id'";
    $query = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Actualizar Producto</title>
</head>
<body style="background-color: #E8E7FF;">

<div class="container mt-5">
<div class="position-relative top-0 start-50 translate-middle">
    <h1>Actualizar Información Producto</h1>
</div>

<br>
  <div class="row">
    <div class="col">

    </div>
    <div class="col" style="background-color: #C3E0F3;">

    <form action="./editar.php?id=<?php echo $_GET['id'] ?>" method="POST" enctype = "multipart/form-data">
    <div class="form-group">

                    <label for="nom">Nombre</label>
                    <input type="text" name="nom" class="form-control mb-4" placeholder="Nombre" id="nom"  value="<?php echo $row['nombreProducto']?>" required>
                </div>
                <div class="form-group">
                    <label for="categ">Categoria</label>
                    <input type="text" name="categ" class="form-control mb-4" placeholder="Categoria" id="categ" value="<?php echo $row['categoriaProducto']?>" required>
                </div>
                <div class="form-group">
                <label for="imagen" class="form-label">Imagen actual</label>
                    <div class="card" style="width: 18rem;">
                        <img height="200px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagenProducto']); ?>" class="card-img-top" alt="Texto correspondiente a la imagen que se desee subir">
                    </div>
                </div>
                <br>
                <input type="file" class="form-control" id="img" name="img" required>

                <br>
                <input type="submit" class="btn btn-primary btn-block" name="edit" value="Actualizar">
                <br>
</form>
    </div>
    <div class="col">

    </div>
  </div>
</div>

</body>
</html>