<h1>Enter information about the branch office</h1>
<?php
if(!isset($err)){
    $err = [];
}
?>

<form action="" method="POST">
    <label for="name">Branch name</label><br>
    <input type="text" name="name" value="<?php echo htmlspecialchars($filteredData['name']); ?>"><br>
    <?php view('partials/errors', [
        'err' => $err['name']
    ]); ?><br>

    <label for="address">Branch address</label><br>
    <input type="text" name="address" value="<?php echo htmlspecialchars($filteredData['address']); ?>"><br>
    <?php view('partials/errors', [
        'err' => $err['address']
    ]); ?><br>

    <label for="products">Products name</label><br>
    <textarea name="products" cols="50" rows="4"><?php echo htmlspecialchars(implode(', ', $filteredData['products'])); ?></textarea> <br>
    <?php view('partials/errors', [
        'err' => $err['products']
    ]); ?><br>

    <input type="submit" value="Save branch office data"> <br> <br>
</form>