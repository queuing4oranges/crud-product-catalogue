<?php

require 'includes/connection.php';
require 'includes/product.php';
require 'includes/url.php';

$conn = getConnect();

if (isset($_GET['id'])) {
    $product = getProduct($conn, $_GET['id']);

    if ($product) {

        $id = $product['id'];
        $sku = $product['sku'];
        $title = $product['title'];
        $price = $product['price'];
    } else {
        die("Product not found.");
    }
} else {

    die("ID not valid. Product not found.");
}
//make sure post method isnt used until called:
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM products WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id); //only param that we need to bind is id

    }

    if (mysqli_stmt_execute($stmt)) {
        redirectUrl("/index.php");
    } else {
        echo_mysqli_stmt_error($stmt);
    }
}
