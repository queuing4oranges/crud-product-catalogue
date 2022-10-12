<?php

require 'classes/Product.php';
require 'classes/Database.php';
require 'includes/url.php';


// $sku = '';    //initializing variable up here, bc form is still empty
// $title = '';
// $price = ''; //instead of variables - create new article obj - form says undefined variable!!

$product = new Product();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new Database();
    $conn = $db->getConnection();

    $product->sku = $_POST['sku'];
    $product->title = $_POST['title'];
    $product->price = $_POST['price'];

    if ($product->addProduct($conn)) {

        header("location:index.php");
    }
}

?>
<?php require 'includes/header.php'; ?>
<h2>Add Product</h2>

<?php require 'includes/form.php'; ?>
<?php require 'includes/footer.php'; ?>