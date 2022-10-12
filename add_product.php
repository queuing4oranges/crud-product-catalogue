<?php

require 'classes/Product.php';
require 'classes/Database.php';
require 'includes/url.php';


$product = new Product();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new Database();
    $conn = $db->getConnection();

    $product->sku = $_POST['sku'];
    $product->title = $_POST['title'];
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

?>

<h2>Add Product</h2>
<button>SAVE</button>
<form action="index.php"><button>CANCEL</button></form>

<?php require 'includes/form.php'; ?>