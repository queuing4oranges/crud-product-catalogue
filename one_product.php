<?php

require 'includes/connection.php';

$sql = "SELECT *
        FROM products
        WHERE id = " . $_GET['id'];      //getting the id from the querystring ($_GET vardumps the string in the url as assoc. array) - by typing ?id=2 after the url, we get product w/ id 2


$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
} else {
    $product = mysqli_fetch_assoc($results); //instead of fetching all, we're doing one article only here
}
?>

<?php require 'includes/header.php'; ?>


<?php if ($product === null) : ?>
    <p>Product not found.</p>

<?php else : ?>

    <div>
        <h2>One Product</h2>
        <article>
            <input type="checkbox">
            <p><?= $product['sku']; ?></p>
            <p><?= $product['title']; ?></p>
        </article>
    </div>

<?php endif ?>

<?php require 'includes/footer.php'; ?>