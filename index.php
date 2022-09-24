<?php

require 'includes/connection.php';

$sql = "SELECT *
        FROM products
        ORDER BY id;";
$conn = getConnect();
$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
} else {
    $products = mysqli_fetch_all($results, MYSQLI_ASSOC); //doesnt need 2nd argument, but it will return an assoc array

}
?>

<?php require 'includes/header.php'; ?>

<?php if (empty($products)) : ?>
    <p>No products found.</p>

<?php else : ?>

    <div>
        <?php foreach ($products as $product) : ?>
            <div>
                <article>
                    <input type="checkbox">
                    <!-- make each product name into anchor tag so we can link to a single one dynamicalle -> id from databank, so we access it just like the other props -->
                    <p><a href="one_product.php?id=<?= $product['id']; ?>"><?= $product['sku']; ?></a></p>
                    <p><?= $product['title']; ?></p>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif ?>

<?php require 'includes/footer.php'; ?>