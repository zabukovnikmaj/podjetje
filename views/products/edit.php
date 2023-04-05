<h1>Enter information about the products</h1>
<?php if (!empty($errors)): ?>
    <p>
    <ul class="errors">
        <?php foreach ($errors as $field => $error): ?>
            <li><?php echo $field; ?>: <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
    </p>
<?php endif; ?>

<form action="" method="POST">
    <label for="name">Product name</label><br>
    <input type="text" name="name" value="<?php echo $filteredData['name']; ?>"> <br> <br>

    <label for="description">Product description</label><br>
    <textarea name="description" cols="50" rows="4"><?php echo $filteredData['description']; ?></textarea> <br><br>

    <label for="price">Product price</label><br>
    <input type="number" name="price" step="0.01" min="0" max="10000" value="<?php echo $filteredData['price']; ?>"><br><br>

    <label for="deliveryDate">Product delivery date</label><br>
    <input type="date" name="deliveryDate" value="<?php echo $filteredData['date']; ?>"><br><br>

    <input type="submit" value="Save product data"> <br> <br>
</form>