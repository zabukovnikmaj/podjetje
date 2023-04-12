<p>
    <a href="/branchOffices/create/">New branch office</a>
</p>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Products</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php if (count($branchOffices) > 0): ?>
        <?php foreach ($branchOffices as $branchOffice): ?>
            <tr>
                <td><?php echo htmlspecialchars($branchOffice['name']); ?></td>
                <td><?php echo htmlspecialchars($branchOffice['address']); ?></td>
                <td><?php echo htmlspecialchars(implode(', ', $branchOffice['products']));?></td>
                <td>
                    <a href="/branchOffice/edit?id=<?php echo htmlspecialchars($branchOffice['uuid']); ?>">Edit</a>
                    <a href="/branchOffice/delete?id=<?php echo htmlspecialchars($branchOffice['uuid']); ?>"
                       onclick="return confirm('Confirm?');"
                    >Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
    <tr>
        <td colspan="4">No branch offices found!</td>
    </tr>
    <?php endif; ?>
    </tbody>
</table>