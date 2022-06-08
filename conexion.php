<?php

function conectar(){
    $host = "localhost";
    $user = "root";
    $pass = "";

    $bd = "taller_6_php";

    $conn=mysqli_connect("$host","$user","$pass");

    mysqli_select_db($conn,$bd);

    return $conn;
}

?>