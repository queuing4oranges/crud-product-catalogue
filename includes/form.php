<?php if (!empty($product->errors)) : ?>
    <ul><?php foreach ($product->errors as $error) : ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<link rel="stylesheet" href="../stylesheet.css">
<script src="switcher.js" defer></script>

<form class="product__form" name="product_form" id="product_form" method="post">
    <div class="sku__cont">
        <label for="sku">SKU</label>
        <input id="sku" name="sku" value="<?= ($product->sku); ?>" />
    </div>

    <div class="name__cont">
        <label for="name">Name</label>
        <input id="name" name="name" value="<?= ($product->name); ?>" />
    </div>

    <div class="price__cont">
        <label for="price">Price</label>
        <input id="price" name="price" value="<?= ($product->price); ?>" />
    </div>

    <select name="product" id="productType" onChange="switchType(this.value);">
        <option value="">Product Type</option>
        <option value="book">BOOK</option>
        <option value="dvd">DVD</option>
        <option value="furniture">FURNITURE</option>
    </select>

    <div class="option-field size__cont" id="dvd_item">
        <label for="size">Size</label>
        <input id="size" name="size" value="<?= ($product->size); ?>" />
    </div>

    <div class="option-field weight__cont" id="book_item">
        <label for="weight">Weight</label>
        <input id="weight" name="weight" value="<?= ($product->weight); ?>" />
    </div>

    <div class="option-field dimension__cont" id="furniture_item">
        <label for="height">Height</label>
        <input id="height" name="height" value="<?= ($product->height); ?>" />
        <label for="width">Width</label>
        <input id="width" name="width" value="<?= ($product->width); ?>" />
        <label for="length">Length</label>
        <input id="length" name="length" value="<?= ($product->length); ?>" />
    </div>

    <!-- <input class="input-btn" type="submit" value="Save" /> -->
    <button type="submit" class="input-btn">Save</button>
</form>