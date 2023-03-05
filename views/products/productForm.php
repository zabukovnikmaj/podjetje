<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Product</title>
    </head>
    <body>
        <h1>Enter information about a product</h1>
        <form action="" method="POST">
            <label for="name">Product name</label>
            <input type="text" name="name">

            <label for="description">Product description</label>
            <textarea name="description" cols="50" rows="4"></textarea>

            <label for="price">Product price</label>
            <input type="number" name="price" step="0.01" min="0" max="10000">

            <label for="deliveryDate">Product delivery date</label>
            <input type="date" name="deliveryDate">

            <input type="submit" value="Save product data">
        </form>
    </body>
</html>