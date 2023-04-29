<!DOCTYPE html>
<html lang="en" class="bootstrap">
<head>
    <meta charset="UTF-8">
    <title>Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 70px; /* Add top padding to accommodate the fixed navbar */
        }
    </style>
</head>
<body>
<?php view('partials/navBar', []); ?>

<div class="container">
    <h1>Enter information about a product</h1>

    <?php
    if (!isset($err)) {
        $err = [];
    }
    view('partials/errors', [
        'err' => $err
    ]);
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Product name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Product description</label>
            <textarea name="description" cols="50" rows="4" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="price">Product price</label>
            <input type="number" name="price" step="0.01" min="0" max="10000" class="form-control">
        </div>

        <div class="form-group">
            <label for="deliveryDate">Product delivery date</label>
            <input type="date" name="deliveryDate" class="form-control">
        </div>

        <input type="submit" value="Save product data" class="btn btn-primary">
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
