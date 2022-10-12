<?php

require 'classes/Database.php';
require 'classes/Product.php';
require 'includes/url.php';

$db = new Database();
$conn = $db->getConnection();


if (isset($_GET['id'])) {     //here calling the fct we made separately
    //getting product from DB
    $product = Product::getProduct($conn, $_GET['id']);

    if (!$product) {

        die("Product not found.");
    }
} else {

    die("ID not valid. Product not found.");
}

//validating inputs
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //assign values coming from the form to the properties:
    $product->sku = $_POST['sku'];
    $product->title = $_POST['title'];
    $product->price = $_POST['price'];


    if ($product->updateProduct($conn)) {
        //previous: redirect('index.php')
        header("location:index.php");
    }
}





?>

<?php require 'includes/header.php'; ?>

<h2>Edit Product</h2>

<?php require 'includes/form.php'; ?>
<?php require 'includes/footer.php'; ?>