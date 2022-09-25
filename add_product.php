<?php

require 'includes/connection.php';
require 'includes/product.php';
require 'includes/url.php';

$sku = '';    //initializing variable up here, bc form is still empty
$title = '';
$price = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //if form is submitted, set values to the variables
    $sku = $_POST['sku'];
    $title = $_POST['title'];
    $price = $_POST['price'];

    $errors = validateProduct($sku, $title, $price);

    if (empty($errors)) {


        // getConnect();       //calling fct from connection.php
        $conn = getConnect();   //assigning fcts returned value to a variable

        $sql = "INSERT INTO products (sku, title, price)   
            VALUES (?, ?, ?)";            // inserting placeholders, later binding them


        $stmt = mysqli_prepare($conn, $sql);    //prepare instead of query - safer

        if ($stmt === false) {
            echo mysqli_error($conn);
        } else {
            // if ($title == '') { //checking if params are empty (should only be the case for size, weight, etc.)
            //     $title == null;
            // }
            mysqli_stmt_bind_param($stmt, "ssd", $sku, $title, $price);   //binding params to the placeholder values

            if (mysqli_stmt_execute($stmt)) {                //executing the fct
                $id = mysqli_insert_id($conn);              //get id of new record
                // echo "The product is saved under the ID: . $id";

                // header("Location: index.php");    //use header fct to redirect user to list


                //instead of relative, we should be using absolute url, to have it work in older browsers. it needs to container server name and protocol:
                //first check if server is using http or https:

                redirectUrl("/index.php");      //to the same site: redirect("/add_product.php?=$id")
            } else {
                echo mysqli_stmt_error($stmt);              //if it's false, we display error
            }
        }
    }
}
?>
<?php require 'includes/header.php'; ?>
<h2>Add Product</h2>

<?php require 'includes/form.php'; ?>
<?php require 'includes/footer.php'; ?>