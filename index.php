<?php

require 'classes/Database.php';
require 'classes/Product.php';

$db = new Database();           //create new DB obj
$conn = $db->getConnection();    //call fct of ob


$products = Product::showAll($conn);


?>




<style>
    <?php include "stylesheet.css" ?>
</style>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Junior Test Katja Zenker</title>
</head>

<body>

    <header>
        <h1>Product List</h1>
        <form action="../add_product.php">
            <button class="add-btn" type="submit">ADD</button>
        </form>

    </header>

    <main>

        <?php if (empty($products)) : ?>
            <p>No products found.</p>

        <?php else : ?>

            <div class="product__list-container">

                <form action="delete_product.php" method="post">
                    <button class="delete-btn" type="submit" name="mass-delete-btn">MASS DELETE</button>

                    <hr>

                    <div class="product__list">
                        <?php foreach ($products as $product) : ?>
                            <div class="product__cont">
                                <input type="checkbox" class="delete-checkbox" name="product_delete_id[]" value="<?= $product['id']; ?>">
                                <div class="product">

                                    <p><?= $product['sku']; ?></p>
                                    <p><?= $product['name']; ?></p>
                                    <p><?= $product['price']; ?> $</p>

                                    <?php if (!empty($product['size'])) : ?>
                                        <p>Size: <?= $product['size']; ?> MB</p>
                                    <?php else : '' ?>
                                    <?php endif ?>

                                    <?php if (!empty($product['weight'])) : ?>
                                        <p>Weight: <?= $product['weight']; ?> KG</p>
                                    <?php else : '' ?>
                                    <?php endif ?>

                                    <div class="dimensions">

                                        <?php if (!empty($product['height'])) : ?>
                                            <p>Dimension: </p>
                                            <p><?= $product['height']; ?> x </p>
                                        <?php else : '' ?>
                                        <?php endif ?>

                                        <?php if (!empty($product['width'])) : ?>
                                            <p><?= $product['width']; ?> x </p>
                                        <?php else : '' ?>
                                        <?php endif ?>

                                        <?php if (!empty($product['length'])) : ?>
                                            <p><?= $product['length']; ?></p>
                                        <?php else : '' ?>
                                        <?php endif ?>

                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </form>
            </div>
        <?php endif ?>