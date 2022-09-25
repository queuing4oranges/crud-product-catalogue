<?php

require 'includes/connection.php';
require 'includes/product.php';

$conn = getConnect();


if (isset($_GET['id'])) {     //here calling the fct we made separately

    $product = getProduct($conn, $_GET['id']);
} else {
    $product = null;
}

?>

<?php require 'includes/header.php'; ?>


<?php if ($product === null) : ?>
    <p>Product not found.</p>

<?php else : ?>

    <article>

        <p><?= $product['sku']; ?></p>
        <p><?= $product['title']; ?></p>
        <p><?= $product['price']; ?></p>
        <form method="post" action="delete_product.php?id=<?= $product['id']; ?>"><button>Delete Product</button>
    </article>


<?php endif; ?>

<?php require 'includes/footer.php'; ?>