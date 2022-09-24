<?php

require 'includes/connection.php';
require 'includes/product.php';

$conn = getConnect();


if (isset($_GET['id'])) {     //here calling the fct we made separately

    $product = getProduct($conn, $_GET['id']);

    if ($product) {

        $sku = $product['sku'];
        $title = $product['title'];
        $price = $product['price'];
    } else {
        die("Article not found.");
    }
} else {

    die("ID not valid. Product not found.");
}



?>

<?php require 'includes/header.php'; ?>

<h2>Edit Product</h2>

<?php require 'includes/form.php'; ?>
<?php require 'includes/footer.php'; ?>