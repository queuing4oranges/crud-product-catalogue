<?php

require 'classes/Database.php';
require 'classes/Product.php';


// $conn = getConnect();
$db = new Database();
$conn = $db->getConnection();


if (isset($_GET['id'])) {     //here calling the fct we made separately

    $product = Product::getProduct($conn, $_GET['id']);
} else {
    $product = null;
}

?>

<?php require 'includes/header.php'; ?>


<?php if ($product) : ?>

    <article>
        <!-- accessed like array: $product['sku']-->
        <p><?= htmlspecialchars($product->sku); ?></p>
        <p><?= htmlspecialchars($product->title); ?></p>
        <p><?= htmlspecialchars($product->price); ?></p>
        <form method="post" action="delete_product.php?id=<?= $product->id; ?>"><button>Delete Product</button>
    </article>


<?php else : ?>
    <p>Product not found.</p>



<?php endif; ?>

<?php require 'includes/footer.php'; ?>