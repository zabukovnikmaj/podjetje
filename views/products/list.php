<!DOCTYPE html>
<html lang="en" class="bootstrap">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
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
    <p>
        <a href="/products/create/" class="btn btn-primary">New product</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Delivery date</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($products) > 0): ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo htmlspecialchars($product['description']); ?></td>
                    <td><?php echo htmlspecialchars($product['price']); ?></td>
                    <td><?php echo htmlspecialchars($product['date']); ?></td>
                    <td>
                        <a href="/products/edit?id=<?php echo htmlspecialchars($product['uuid']); ?>" class="btn btn-primary">Edit</a>
                        <a href="/products/delete?id=<?php echo htmlspecialchars($product['uuid']); ?>"
                           onclick="return confirm('Confirm?');"
                           class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No products found!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
