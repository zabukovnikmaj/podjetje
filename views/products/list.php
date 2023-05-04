<p>
    <a href="/products/create/">New product</a>
</p>

<a href="/">Back</a>

<table>
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
                    <a href="/products/edit?id=<?php echo htmlspecialchars($product['uuid']); ?>">Edit</a>
                    <a href="/products/delete?id=<?php echo htmlspecialchars($product['uuid']); ?>"
                       onclick="return confirm('Confirm?');"
                    >Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">No products found!</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>