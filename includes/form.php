<?php if (!empty($product->errors)) : ?>
    <ul><?php foreach ($product->errors as $error) : ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<link rel="stylesheet" href="../stylesheet.css">
<script src="switcher.js" defer></script>

<form id="product_form" method="post">
    <div>
        <label for="sku">SKU</label>
        <input id="sku" name="sku" value="<?= ($product->sku); ?>" />
    </div>

    <div>
        <label for="name">Title</label>
        <input id="name" name="title" value="<?= ($product->title); ?>" />
    </div>

    <div>
        <label for="price">Price</label>
        <input id="price" name="price" value="<?= ($product->price); ?>" />
    </div>

    <select name="product" id="productType" onChange="switchType(this.value);">
        <option value="">Product Type</option>
        <option value="book">BOOK</option>
        <option value="dvd">DVD</option>
        <option value="furniture">FURNITURE</option>
    </select>

    <div class="option-field" id="dvd_item">
        <label for="size">Size</label>
        <input id="size" name="size" value="<?= ($product->size); ?>" />
    </div>

    <div class="option-field" id="book_item">
        <label for="weight">Weight</label>
        <input id="weight" name="weight" value="<?= ($product->weight); ?>" />
    </div>

    <div class="option-field" id="furniture_item">
        <label for="height">Height</label>
        <input id="height" name="height" value="<?= ($product->height); ?>" />
        <label for="width">Width</label>
        <input id="width" name="width" value="<?= ($product->width); ?>" />
        <label for="length">Length</label>
        <input id="length" name="length" value="<?= ($product->length); ?>" />
    </div>

    <input type="submit" value="Save" />
</form>