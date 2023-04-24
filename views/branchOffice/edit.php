<h1>Enter information about the branch office</h1>

<?php
if(!isset($err)){
    $err = [];
}
view('partials/errors', [
    'err' => $err
]); ?>

<form method="POST">
    <?php echo request_method('PUT', $filteredData ?? null); ?>

    <label for="name">Branch name</label><br>
    <input type="text" name="name" value="<?php echo old('name', isset($filteredData['name']) ? $filteredData['name'] : null); ?>"><br><br>

    <label for="address">Branch address</label><br>
    <input type="text" name="address" value="<?php echo old('address', isset($filteredData['address']) ? $filteredData['address'] : null); ?>"><br><br>

    <label for="products">Products name</label><br>
    <textarea name="products" cols="50" rows="4"><?php echo old('products', isset($filteredData['products']) ? implode(', ', $filteredData['products']) : null); ?></textarea> <br>
    <br>

    <button type="submit">Save</button>
</form>
