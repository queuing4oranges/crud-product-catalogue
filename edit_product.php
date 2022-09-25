<?php

require 'includes/connection.php';
require 'includes/product.php';
require 'includes/url.php';

$conn = getConnect();


if (isset($_GET['id'])) {     //here calling the fct we made separately
    //getting product from DB
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

//validating inputs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //if form is submitted, set values to the variables
    $sku = $_POST['sku'];
    $title = $_POST['title'];
    $price = $_POST['price'];

    $errors = validateProduct($sku, $title, $price);

    if (empty($errors)) {

        $sql = "UPDATE products SET sku=?, title=?, price=? WHERE id=?";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            echo mysqli_error($conn);
        } else {
            mysqli_stmt_bind_param($stmt, "ssdi", $sku, $title, $price, $id);

            if (mysqli_stmt_execute($stmt)) {

                redirectUrl("/index.php");
            } else {
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}




?>

<?php require 'includes/header.php'; ?>

<h2>Edit Product</h2>

<?php require 'includes/form.php'; ?>
<?php require 'includes/footer.php'; ?>