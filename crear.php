<?php
    include("conexion.php");
    $conn = conectar();
    if(isset($_POST['save'])){
        $nombre = $_POST['nom'];
        $categoria = $_POST['categ'];
        $imagen = addslashes(file_get_contents($_FILES['img']['tmp_name']));

        $query = "INSERT INTO producto(nombreProducto,categoriaProducto,imagenProducto) VALUES ('$nombre','$categoria','$imagen')";
        $resultado=mysqli_query($conn,$query);
        if(!$resultado){
            $_SESSION['mensaje'] = "No se guardo el producto";
            $_SESSION['tipo_mensaje'] = "danger";
        }else{
            $_SESSION['mensaje'] = "Producto almacenado con exito";
            $_SESSION['tipo_mensaje'] = "success";
        }

    }


    header("Location: index.php");
?>

