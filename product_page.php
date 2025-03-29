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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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


                <div class="container cont">

                    <div class="card  p-4">
                        <div>
                            <h1 class="mb-4" style="text-align: start;"> <?php echo $data["items"][$id]["title"];  ?></h1>
                            <!-- Calificación -->
                            <div class="reviews">⭐⭐⭐⭐⭐ 4.8/5 (128 opiniones)</div>

                            <p class="text-muted price"><strong>$<?php echo $productosAgrupados[$id][0]["price"] ?></strong></p>


                            <div class="">

                                <!-- Botón para mostrar/ocultar el contenido -->
                                <button type="button" data-bs-toggle="collapse" data-bs-target="#contenido" class="collapse_button">
                                    Click to View Product Details <i class="fa-solid fa-arrow-down"></i>
                                </button>

                                <!-- Contenido colapsable -->
                                <div class="collapse mt-4" id="contenido">
                                    <div class="card card-body">
                                        <p class="descp"><?php echo $data["items"][$id]["description"] ?></p>
                                    </div>
                                </div>
                            </div>

                          
                               <p class="color"><strong>Color: <?php echo $productosAgrupados[$id][0]["colorName"] ?></strong></p>
                           


                               <p class="sizeName" style="font-size: 18px;"><strong>Selected Size: <?php echo $productosAgrupados[$id][0]["sizes"][0] ?></strong></p>



                            <p class="stock">Stock: <b>
                                    <?php

                                    if ($productosAgrupados[$id][0]["sku"][0] > 0) {
                                    ?>
                                    <style>
                                        .stock{
                                            color: green;
                                        }
                                    </style>
                                    <?php
                                        echo queryStock($productosAgrupados[$id][0]["sku"][0]);
                                    } else{ ?>
                                <style>
                                        .stock{
                                            color: red;
                                        }
                                    </style>
                                    <?php
                                        echo "no";
                                    }
                                    ?> available</b>
                            </p>




                            <form action="" method="POST" id="form">

                                <?php for ($i = 0; $i < count($productosAgrupados[$id]); $i++): ?>
                                    <input class="radio" type="radio" title="<?php echo $productosAgrupados[$id][$i]["colorName"] ?>" value="<?php echo $i; ?>" name="color" style="background-color: <?php echo $productosAgrupados[$id][$i]["hex"]; ?>;">
                                <?php endfor ?>

                                <p class="mt-3 talla"><strong>Selecciona tu talla:</strong></p>
                                <div class="d-flex gap-10" style="flex-wrap: wrap;">
                                    <?php for ($i = 0; $i < count($productosAgrupados[$id][1]["sizes"]); $i++): ?>
                                        <label>
                                            <input type="radio" class="radioS " name="opcion" value="<?php echo $i ?>">
                                            <span class="size-btn "><?php echo $productosAgrupados[$id][0]["sizes"][$i] ?></span>
                                        </label>
                                    <?php endfor ?>

                                </div>

                                <input type="hidden" name="id_producto" value="123">
                                <input type="hidden" name="nombre" value="Cuadro Decorativo">
                                <input type="hidden" name="precio" value="250.00">


                                <label for="cantidad" class="" style="text-align: start;">Cantidad:</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control mb-3  " style="width: 100px; text-align: start;" value="1" min="1" required>

                                <button type="submit" class="btn btn-primary " style="background-color: #5a3b99; padding: 15px; border-radius: 20px;"> Agregar al Carrito</button>


                            </form>


                        </div>
                    </div>


                </div>
            </div>

    </main>

    <?php
    $sizingInfo = getSizeChart($data["items"][$id]["variants"][0]["productTypeId"]);
    ?>
    <section class="sizing_table">
        <h2 class="text-center">Sizing Information:</h2>
        <img src="<?php echo  $sizingInfo->sizeImageUrl ?>" alt="Sizing photo">

    </section>


    <!-- Agregar Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="build/js/app.js"></script>
    </body>

</html>