<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require "includes/funciones/api.php";
    $products = set_api();


    $id = $_GET["id"];
    $color = $_POST["color"];

    $imgArr = $products[$id][$color]["imageUrl"];
    $arr = [
        "color" => $color,
        "id" => $id,
        "imagenes" => $imgArr,
    ];

    echo json_encode($arr);
    exit;

}

?>