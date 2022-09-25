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
                    <p><?= $product['price'] ?></p>
                    <p><a href="edit_product.php?id=<?= $product['id']; ?>">Edit Product</a></p>
                    <!-- <p><a href="delete_product.php?id=<?= $product['id']; ?>">Delete Product</a></p>    
                    we should be using post method - therefore instead of a link, we'll make a form! -->
                    <form method="post" action="delete_product.php?id=<?= $product['id']; ?>"><button>Delete Product</button>
                    </form>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif ?>

<?php require 'includes/footer.php'; ?>