<h1>Enter information about the branch office</h1>
<?php
if(!isset($err)){
    $err = [];
}
?>

<a href="/branchOffice/list/">Back</a><br><br>

<form action="" method="POST">
    <label for="name">Branch name</label><br>
    <?php view('partials/branchNameRadioButtons', [
        'branchOffices' => $branchOffices,
        'existingBranchOffice' => $filteredData['name']
    ]); ?>
    <?php view('partials/errors', [
        'err' => $err['name']
    ]); ?>

    <label for="address">Branch address</label><br>
    <input type="text" name="address" value="<?php echo htmlspecialchars($filteredData['address']); ?>"><br>
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

    <input type="submit" value="Save branch office data"> <br> <br>
</form>