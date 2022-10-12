<?php

require 'classes/Database.php';
require 'classes/Product.php';




// $conn = getConnect();
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

        <form action="../add_product.php">
            <input type="submit" value="Add Product" />
        </form>
        <form method="post" action="delete_product.php?id=<?= $product['id']; ?>"><button>MASS DELETE</button>
        </form>

        <?php foreach ($products as $product) : ?>
            <div>
                <article>
                    <input type="checkbox">

                    <p><a href="one_product.php?id=<?= $product['id']; ?>"><?= $product['sku']; ?></a></p>
                    <p><?= $product['title']; ?></p>
                    <p><?= $product['price'] ?></p>



                </article>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif ?>

<?php require 'includes/footer.php'; ?>

<!-- <form method="post" action="delete_product.php?id=<?= $product['id']; ?>">
<button>Delete Product</button>
<p><a href="edit_product.php?id=<?= $product['id']; ?>">Edit Product</a></p>
</form> -->