<?php
    include("./conexion.php");
    $conn = conectar();

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM producto WHERE idProducto = '$id'";
        $result = mysqli_query($conn,$query);

    }


    header("Location: index.php");

?>