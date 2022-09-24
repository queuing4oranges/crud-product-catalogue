<!-- checking if there are errors,then looping and displaying them -->
<?php if (!empty($errors)) ?>
<ul><?php foreach ($errors as $error) : ?>
        <li><?php echo $error; ?></li>
    <?php endforeach; ?>
</ul>

<select name="product" id="">
    <option value="book">BOOK</option>
    <option value="dvd">DVD</option>
    <option value="furniture">FURNITURE</option>
</select>

<form method="post">
    <div>
        <label for="sku">SKU</label>
        <!-- value="-> value remains in form -->
        <input type="text" id="sku" name="sku" value="<?= $sku; ?>" />
    </div>

    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?= $title; ?>" />
    </div>

    <div>
        <label for="price">Price</label>
        <input type="text" id="price" name="price" value="<?= $price; ?>" />
    </div>

    <input type="submit" value="submit" />
</form>