<?php

require 'includes/connection.php';
require 'includes/product.php';

$conn = getConnect();


if (isset($_GET['id'])) {     //here calling the fct we made separately
    //getting product from DB
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

//validating inputs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //if form is submitted, set values to the variables
    $sku = $_POST['sku'];
    $title = $_POST['title'];
    $price = $_POST['price'];

    $errors = validateProduct($sku, $title, $price);

    if (empty($errors)) {
        die("Form is valid");
    }
}



?>

<?php require 'includes/header.php'; ?>

<h2>Edit Product</h2>

<?php require 'includes/form.php'; ?>
<?php require 'includes/footer.php'; ?>