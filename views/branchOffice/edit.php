<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Office</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Enter information about the branch office</h1>
    <?php
    if(!isset($err)){
        $err = [];
    }
    ?>
    <form method="POST">
        <?php echo request_method('PUT', $filteredData ?? null); ?>

        <div class="form-group">
            <label for="name">Branch name</label>
            <input type="text" class="form-control <?php echo isset($err['name']) ? 'is-invalid' : ''; ?>" name="name" value="<?php echo old('name', isset($filteredData['name']) ? $filteredData['name'] : null); ?>">
            <?php view('partials/errors', [
                'err' => $err['name']
            ]); ?>
        </div>

        <div class="form-group">
            <label for="address">Branch address</label>
            <input type="text" class="form-control <?php echo isset($err['address']) ? 'is-invalid' : ''; ?>" name="address" value="<?php echo old('address', isset($filteredData['address']) ? $filteredData['address'] : null); ?>">
            <?php view('partials/errors', [
                'err' => $err['address']
            ]); ?>
        </div>

        <div class="form-group">
            <label for="products">Products name</label>
            <?php view('partials/productsCheckbox', [
                'products' => $products,
                'productsData' => $filteredData['products']
            ]); ?>
            <?php view('partials/errors', [
                'err' => $err['products']
            ]); ?>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="/branchOffice/list/" class="btn btn-default" style="margin-left: 10px">Back</a>
    </form>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js" integrity="sha512-TgSK8d+l4iDeSQeqvuhyHw+9BzvbV4JF6kjcEjwA7pnbYAvv6x3S8Wif4Osmg9VgHwCf+7SWHYf3HjRg+rsQyA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
