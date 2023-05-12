<h1>Enter information about the branch office</h1>
<?php
if(!isset($err)){
    $err = [];
}
?>

<a href="/branchOffice/list/">Back</a><br><br>

<form method="POST">
    <?php echo request_method('PUT', $filteredData ?? null); ?>

    <label for="name">Branch name</label><br>
    <input type="text" name="name" value="<?php echo old('name', isset($filteredData['name']) ? $filteredData['name'] : null); ?>"><br><br>
    <?php view('partials/errors', [
        'err' => $err['name']
    ]); ?>

    <label for="address">Branch address</label><br>
    <input type="text" name="address" value="<?php echo old('address', isset($filteredData['address']) ? $filteredData['address'] : null); ?>"><br>
    <?php view('partials/errors', [
        'err' => $err['address']
    ]); ?><br>

    <label for="products">Products name</label><br>
    <?php view('partials/productsCheckbox', [
        'products' => $products,
        'productsData' => $filteredData['products']
    ]); ?>
    <?php view('partials/errors', [
        'err' => $err['products']
    ]); ?>

    <button type="submit">Save</button> <br> <br>
</form>