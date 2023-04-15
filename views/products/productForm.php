<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product</title>
</head>
<body>
<h1>Enter information about a product</h1>

<?php
if (!isset($err)) {
    $err = [];
}
view('partials/errors', [
    'err' => $err
]); ?>

<form action="" method="POST">
    <label for="name">Product name</label><br>
    <input type="text" name="name" value="<?php echo $formData['name'] ?? ''; ?>"> <br> <br>

    <label for="description">Product description</label><br>
    <textarea name="description" cols="50" rows="4"><?php echo $formData['description'] ?? ''; ?></textarea> <br><br>

    <label for="price">Product price</label><br>
    <input type="number" name="price" step="0.01" min="0" max="10000" value="<?php echo $formData['price'] ?? ''; ?>"><br><br>

    <label for="deliveryDate">Product delivery date</label><br>
    <input type="date" name="deliveryDate" value="<?php echo $formData['deliveryDate'] ?? ''; ?>"><br><br>

    <input type="submit" value="Save product data"> <br> <br>
</form>
</body>
</html>