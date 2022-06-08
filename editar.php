<?php
    include("conexion.php");
    $conn=conectar();
    if(isset($_POST['edit'])){
        $id = $_GET['id'];
        $nombre = $_POST['nom'];
        $categoria = $_POST['categ'];
        $imagen = addslashes(file_get_contents($_FILES['img']['tmp_name']));

        $sql = "UPDATE producto SET nombreProducto = '$nombre',categoriaProducto = '$categoria', imagenProducto = '$imagen' WHERE idProducto = '$id'";
        $query = mysqli_query($conn,$sql);


        Header("Location: index.php");


    }

?>