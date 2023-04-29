<?php view('partials/navBar' , []); ?>
<h1>Enter information about the products</h1>

<?php
if(!isset($err)){
    $err = [];
}
view('partials/errors', [
    'err' => $err
]); ?>

<form action="" method="POST">
    <label for="name">Product name</label><br>
    <input type="text" name="name" value="<?php echo htmlspecialchars($filteredData['name']); ?>"> <br> <br>

    <label for="description">Product description</label><br>
    <textarea name="description" cols="50" rows="4"><?php echo htmlspecialchars($filteredData['description']); ?></textarea> <br><br>

    <label for="price">Product price</label><br>
    <input type="number" name="price" step="0.01" min="0" max="10000" value="<?php echo htmlspecialchars($filteredData['price']); ?>"><br><br>

    <label for="deliveryDate">Product delivery date</label><br>
    <input type="date" name="deliveryDate" value="<?php echo htmlspecialchars($filteredData['date']); ?>"><br><br>

    <input type="submit" value="Save product data"> <br> <br>
</form>