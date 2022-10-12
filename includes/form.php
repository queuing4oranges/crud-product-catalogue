<?php if (!empty($product->errors)) : ?>
    <ul><?php foreach ($product->errors as $error) : ?>
            <li><?php $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<select name="product" id="">
    <option value="book">BOOK</option>
    <option value="dvd">DVD</option>
    <option value="furniture">FURNITURE</option>
</select>

<form method="post">
    <div>
        <label for="sku">SKU</label>
        <input id="sku" name="sku" value="<?= ($product->sku); ?>" />
    </div>

    <div>
        <label for="title">Title</label>
        <input id="title" name="title" value="<?= ($product->title); ?>" />
    </div>

    <div>
        <label for="price">Price</label>
        <input id="price" name="price" value="<?= ($product->price); ?>" />
    </div>

    <input type="submit" value="submit" />
</form>