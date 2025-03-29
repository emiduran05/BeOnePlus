<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require "includes/funciones/api.php";
    $products = set_api();

    if(!isset($_POST["color"])){
        $id = $_GET["id"];
        $color = 0;
        $value = $_POST["opcion"];
        $imgArr = $products[$id][$color]["imageUrl"];
    }elseif(!isset($_POST["opcion"])){
        $id = $_GET["id"];
        $color = $_POST["color"];
        $value = 0;
        $imgArr = $products[$id][$color]["imageUrl"];
    }else{
        $id = $_GET["id"];
        $color = $_POST["color"];
        $value = $_POST["opcion"];
        $imgArr = $products[$id][$color]["imageUrl"];
   
    }

    $colorName = $products[$id][$color]["colorName"];
    $sizeName = $products[$id][$color]["sizes"][$value];
    $sku = $products[$id][$color]["sku"][$value];
    $stock = queryStock($sku);

    $arr = [
        "color" => $color,
        "id" => $id,
        "colorName" => $colorName,
        "imagenes" => $imgArr,
        "talla" => $value,
        "sku" => $sku,
        "sizeName" => $sizeName,
        "stock" => $stock,
        "api" => $products,
    ];


    echo json_encode($arr);
    exit;

}

?>