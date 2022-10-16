<?php

require 'classes/Product.php';
require 'classes/Database.php';
require 'includes/url.php';

$product = new Product();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new Database();
    $conn = $db->getConnection();

    $product->sku = $_POST['sku'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE sku= ?");
    $stmt->execute([$product->sku]);
    $result = $stmt->rowCount();
    if ($result > 0) {
        echo ("Item with this SKU already exists.");
    } else {

        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->weight = $_POST['weight'];
        $product->size = $_POST['size'];
        $product->height = $_POST['height'];
        $product->width = $_POST['width'];
        $product->length = $_POST['length'];

        if ($product->addProduct($conn)) {

            header("location:index.php");
        }
    }
}

?>
<div class="product__add-container">
    <div class="product__add">
        <h2 class="add__title">Add Product</h2>
        <form class="cancel__btn_form" action="index.php"><button class="cancel-btn">Cancel</button></form>
        <?php require 'includes/form.php'; ?>
    </div>
</div>