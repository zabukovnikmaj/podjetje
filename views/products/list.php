<script>
    window.onload = function () {
        const currentDirectory = process.cwd();
        console.log("Current Directory:", currentDirectory);

    };
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<div class="container" style="margin-top: 50px;">
    <h1 style="margin-top: 0px">Products information</h1>
    <a href="/products/create/" class="btn btn-primary">New product</a>

    <a href="/" class="btn btn-default">Back</a>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Delivery date</th>
            <th>Product picture</th>
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
                    <td><img src="/products/images/!<?php echo $product['uuid']; ?>" alt="product picture" style="max-width: 300px; max-height: 300px"></td>

                    <td>
                        <form action="/products/delete/!<?php echo htmlspecialchars($product['uuid']); ?>" method="POST">
                            <a href="/products/edit/!<?php echo htmlspecialchars($product['uuid']); ?>"
                               class="btn btn-primary btn-sm">Edit</a>
                            <?php echo request_method('DELETE', $product); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm?');">
                                Delete
                            </button>
                        </form>
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
