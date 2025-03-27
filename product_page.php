

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="build/css/app.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <?php require "includes/layouts/header.php" ?>
    <?php require "includes/funciones/api.php" ?>



    <?php
    $productosAgrupados = set_api();
    $data = api();
    $id = $_GET["id"];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $appearance = $_POST["color"];
    }



    ?>

    <main class="productMain">
        <div class="productMain_container">
            <div>
                <div class="productMain_container_images" id="mensaje">
                    <div class="productMain_container_slider">
                        <div class="productMain_container_slider_slides">
                            <?php if (isset($appearance)) { ?>
                                <?php for ($i = 0; $i < count($productosAgrupados[$id][$appearance]["imageUrl"]); $i++): ?>
                                    <img src="<?php echo $productosAgrupados[$id][$appearance]["imageUrl"][$i] ?>" alt="">
                                <?php endfor ?>
                            <?php } else { ?>
                                <?php for ($i = 0; $i < count($productosAgrupados[$id][0]["imageUrl"]); $i++): ?>
                                    <img src="<?php echo $productosAgrupados[$id][0]["imageUrl"][$i] ?>" alt="">
                                <?php endfor ?>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="gallery">
                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                            <?php for ($i = 0; $i < count($productosAgrupados[$id][$appearance]["imageUrl"]); $i++): ?>
                                <img class="img_gall" src="<?php echo $productosAgrupados[$id][$appearance]["imageUrl"][$i] ?>" alt="">
                            <?php endfor ?>
                        <?php } else { ?>
                            <?php for ($i = 0; $i < count($productosAgrupados[$id][0]["imageUrl"]); $i++): ?>
                                <img class="img_gall" src="<?php echo $productosAgrupados[$id][0]["imageUrl"][$i] ?>" alt="">
                            <?php endfor ?>
                        <?php } ?>
                    </div>

                </div>
            </div>



            <div class="productMain_container_info">
                <h1><?php echo $data["items"][$id]["title"];  ?></h1>
                <p>$<?php echo $productosAgrupados[$id][0]["price"] ?> <b>MXN</b></p>
                <form action="" method="POST" id="form">

                    <?php for ($i = 0; $i < count($productosAgrupados[$id]); $i++): ?>
                        <input class="radio" type="radio" title="<?php echo $productosAgrupados[$id][$i]["colorName"] ?>" value="<?php echo $i; ?>" name="color" style="background-color: <?php echo $productosAgrupados[$id][$i]["hex"]; ?>;">
                    <?php endfor ?>

                    <select class="select" name="size" id="">
                        <?php for ($i = 0; $i < count($productosAgrupados[$id][0]["sizes"]); $i++): ?>
                            <option value=""><?php echo $productosAgrupados[$id][0]["sizes"][$i]; ?></option>
                        <?php endfor ?>
                    </select>


                </form>

                <p>Stock: <b><?php echo $data["items"][0]["variants"][0]["stock"] ?></b></p>

                <p class="descp"><?php echo $data["items"][$id]["description"] ?></p>
            </div>
        </div>

    </main>

    <script src="build/js/app.js"></script>
    </body>

</html>