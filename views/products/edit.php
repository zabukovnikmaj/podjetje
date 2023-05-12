<h1>Enter information about the products</h1>

<?php
if(!isset($err)){
    $err = [];
} ?>

<a href="/products/list/">Back</a>

<form action="" method="POST">
    <?php echo request_method('PUT', $filteredData ?? null); ?>

    <label for="name">Product name</label><br>
    <input type="text" name="name" value="<?php echo old('name', isset($filteredData['name']) ? $filteredData['name'] : null); ?>"> <br>
    <?php view('partials/errors', [
        'err' => $err['name']
    ]); ?><br>

    <label for="description">Product description</label><br>
    <textarea name="description" cols="50" rows="4"><?php echo old('description', isset($filteredData['description']) ? $filteredData['description'] : null); ?></textarea> <br>
    <?php view('partials/errors', [
        'err' => $err['description']
    ]); ?><br>

    <label for="price">Product price</label><br>
    <input type="number" name="price" step="0.01" min="0" max="10000" value="<?php echo old('price', isset($filteredData['price']) ? $filteredData['price'] : null); ?>"><br>
    <?php view('partials/errors', [
        'err' => $err['price']
    ]); ?><br>

    <label for="deliveryDate">Product delivery date</label><br>
    <input type="date" name="deliveryDate" value="<?php echo old('deliveryDate', isset($filteredData['deliveryDate']) ? $filteredData['deliveryDate'] : null); ?>"><br>
    <?php view('partials/errors', [
        'err' => $err['deliveryDate']
    ]); ?><br>

    <button type="submit">Save</button> <br> <br>
</form>