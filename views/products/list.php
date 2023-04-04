<p>
    <a href="/products/create/">New product</a>
</p>

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
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['date']; ?></td>
                <td>
                    <a href="/faculty/edit?id=<?php echo $product['uuid']; ?>">Edit</a>
                    <a href="/faculty/delete?id=<?php echo $product['uuid']; ?>"
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