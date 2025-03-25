<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="build/css/app.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    

    <?php require"includes/layouts/header.php" ?>
    <?php require "includes/funciones/api.php"?>

    <?php $productosAgrupados = set_api() ?>
    
    <main class="productMain">
        <div class="productMain_container">
            <div class="productMain_container_images">
                <div class="productMain_container_slider">
                    <div class="productMain_container_slider_slides">
                        <?php for($i = 0; $i < count($productosAgrupados[1][0]["imageUrl"]); $i++): ?>
                        <img src="<?php echo $productosAgrupados[1][0]["imageUrl"][$i] ?>" alt="">
                        <?php endfor ?>
                    </div>
                </div>
                
                <div class="gallery">
                    <?php for($i = 0; $i < count($productosAgrupados[1][0]["imageUrl"]); $i++): ?>
                        <img class="img_gall" src="<?php echo $productosAgrupados[1][0]["imageUrl"][$i]?>" alt="">
                    <?php endfor ?>
                </div>

            </div>
            

            <div class="productMain_container_info">

            </div>
        </div>

    </main>

    <script src="build/js/app.js"></script>
</body>
</html>