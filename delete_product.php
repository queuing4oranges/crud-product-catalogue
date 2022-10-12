<?php
require 'classes/Database.php';
require 'classes/Product.php';
require 'includes/url.php';

$db = new Database();
$conn = $db->getConnection();


if (isset($_GET['id'])) {
    $product = Product::getProduct($conn, $_GET['id']);

    if (!$product) {

        die("Product not found.");
    }
} else {

    die("ID not valid. Product not found.");
}

//make sure post method isnt used until called:
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($errors)) {

        if ($product->deleteProduct($conn)) {
            header("location:index.php");
        }
    }
}
