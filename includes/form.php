<?php if (!empty($product->errors)) : ?>
    <ul><?php foreach ($product->errors as $error) : ?>
            <li><?php $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>



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

    <select name="product" id="">
        <option value="book">BOOK</option>
        <option value="dvd">DVD</option>
        <option value="furniture">FURNITURE</option>
    </select>

    <div>
        <label for="size">Size</label>
        <input id="size" name="size" value="<?= ($product->size); ?>" />
    </div>

    <div>
        <label for="weight">Weight</label>
        <input id="weight" name="weight" value="<?= ($product->weight); ?>" />
    </div>

    <div>
        <label for="height">Height</label>
        <input id="height" name="height" value="<?= ($product->height); ?>" />
    </div>
    <div>
        <label for="width">Width</label>
        <input id="width" name="width" value="<?= ($product->width); ?>" />
    </div>
    <div>
        <label for="length">Length</label>
        <input id="length" name="length" value="<?= ($product->length); ?>" />
    </div>
</form>