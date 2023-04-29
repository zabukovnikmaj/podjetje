<!DOCTYPE html>
<html lang="en" class="bootstrap">
<head>
    <meta charset="UTF-8">
    <title>Branch office</title>
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
    <h1>Enter information about the branch office</h1>

    <?php
    if (!isset($err)) {
        $err = [];
    }
    view('partials/errors', ['err' => $err]);
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Branch name</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($filteredData['name']); ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="address">Branch address</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($filteredData['address']); ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="products">Products name</label>
            <textarea name="products" cols="50" rows="4" class="form-control"><?php echo htmlspecialchars(implode(', ', $filteredData['products'])); ?></textarea>
        </div>

        <input type="submit" value="Save branch office data" class="btn btn-primary">
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
