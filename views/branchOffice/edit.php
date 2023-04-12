<h1>Enter information about the branch office</h1>
<?php
if(!isset($err)){
    $err = [];
}
view('partials/errors', [
    'err' => $err
]); ?>

<form action="" method="POST">
    <label for="name">Branch name</label><br>
    <input type="text" name="name" value="<?php echo $filteredData['name']; ?>"><br><br>

    <label for="address">Branch address</label><br>
    <input type="text" name="address" value="<?php echo $filteredData['address']; ?>"><br><br>

    <label for="products">Products name</label><br>
    <textarea name="products" cols="50" rows="4"><?php echo implode(', ', $filteredData['products']); ?></textarea> <br>
    <br>

    <input type="submit" value="Save branch office data"> <br> <br>
</form>