<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Company</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Enter information about the products</h1>

    <?php
    if (!isset($err)) {
        $err = [];
    } ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <?php echo request_method('PUT', $filteredData ?? null); ?>

        <div class="form-group">
            <label for="name">Product name</label><br>
            <input type="text" class="form-control" name="name"
                   value="<?php echo old('name', isset($filteredData['name']) ? $filteredData['name'] : null); ?>">
            <?php view('partials/errors', [
                'err' => $err['name']
            ]); ?>
        </div>

        <div class="form-group">
            <label for="description">Product description</label><br>
            <textarea class="form-control" name="description" cols="50"
                      rows="4"><?php echo old('description', isset($filteredData['description']) ? $filteredData['description'] : null); ?></textarea>
            <?php view('partials/errors', [
                'err' => $err['description']
            ]); ?>
        </div>

        <div class="form-group">
            <label for="price">Product price</label><br>
            <input type="number" class="form-control" name="price" step="0.01" min="0" max="10000"
                   value="<?php echo old('price', isset($filteredData['price']) ? $filteredData['price'] : null); ?>">
            <?php view('partials/errors', [
                'err' => $err['price']
            ]); ?>
        </div>

        <div class="form-group">
            <label for="deliveryDate">Product delivery date</label><br>
            <input type="date" class="form-control" name="deliveryDate"
                   value="<?php echo old('deliveryDate', isset($filteredData['date']) ? $filteredData['date'] : null); ?>">
            <?php view('partials/errors', [
                'err' => $err['deliveryDate']
            ]); ?>
        </div>

        <div class="form-group">
            <label for="productFile">Product picture</label><br>
            <input type="file" class="form-control-file" name="productFile" id="productFile">
            <?php view('partials/errors', [
                'err' => $err['productFile']
            ]); ?><br>

            <img src="/products/images/!<?php echo $filteredData['uuid']; ?>"
                 alt="Product picture has not been uploaded yet!" style="max-width: 300px; max-height: 300px">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="/products/list/" class="btn btn-default" style="margin-left: 10px">Back</a>
    </form>

</div>
</body>
</html>
