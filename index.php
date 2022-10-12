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
                <div>

                    <input type="checkbox" name="product_delete_id[]" value="<?= $product['id']; ?>">


                    <p><?= $product['title']; ?></p>
                    <p><?= $product['price']; ?></p>

                </div>
            <?php endforeach; ?>
        </form>
    </div>
<?php endif ?>