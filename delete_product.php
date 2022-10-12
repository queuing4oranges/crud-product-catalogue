<?php
require 'classes/Database.php';
require 'classes/Product.php';
require 'includes/url.php';

$db = new Database();
$conn = $db->getConnection();


if (isset($_POST['mass-delete-btn'])) {
    $all_id = $_POST['product_delete_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($all_id as $product) {
            // echo $product;
            $my_product = Product::getProduct($conn, $product);
            $my_product->deleteProduct($conn);
        }
        header("location:index.php");
    }
}
