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

<?php require 'includes/header.php'; ?>

<?php if (empty($products)) : ?>
    <p>No products found.</p>

<?php else : ?>

    <div>
        <form action="delete_product.php" method="post">
            <button type="submit" name="mass-delete-btn">MASS DELETE</button>


            <?php foreach ($products as $product) : ?>
                <div class="product">

                    <input type="checkbox" name="product_delete_id[]" value="<?= $product['id']; ?>">

                    <p>SKU: <?= $product['sku']; ?></p>
                    <p>Title: <?= $product['title']; ?></p>
                    <p>Price: <?= $product['price']; ?></p>

                    <?php if (!empty($product['size'])) : ?>
                        <p>Size:<?= $product['size']; ?></p>
                    <?php else : '' ?>
                    <?php endif ?>

                    <?php if (!empty($product['weight'])) : ?>
                        <p>Weight:<?= $product['weight']; ?></p>
                    <?php else : '' ?>
                    <?php endif ?>

                    <div class="dimensions">
                        <?php if (!empty($product['height'])) : ?>
                            <p>Height:<?= $product['height']; ?></p>
                        <?php else : '' ?>
                        <?php endif ?>

                        <?php if (!empty($product['width'])) : ?>
                            <p>Width:<?= $product['width']; ?></p>
                        <?php else : '' ?>
                        <?php endif ?>

                        <?php if (!empty($product['length'])) : ?>
                            <p>Length:<?= $product['length']; ?></p>
                        <?php else : '' ?>
                        <?php endif ?>

                    </div>

                </div>
            <?php endforeach; ?>
        </form>
    </div>
<?php endif ?>