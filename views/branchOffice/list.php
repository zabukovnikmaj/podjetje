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
                <td><?php echo $branchOffice['name']; ?></td>
                <td><?php echo $branchOffice['address']; ?></td>
                <td><?php echo implode(', ', $branchOffice['products']);?></td>
                <td>
                    <a href="/faculty/edit?id=<?php echo $branchOffice['uuid']; ?>">Edit</a>
                    <a href="/faculty/delete?id=<?php echo $branchOffice['uuid']; ?>"
                       onclick="return confirm('Confirm?');"
                    >Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
    <tr>
        <td colspan="4">No faculties found!</td>
    </tr>
    <?php endif; ?>
    </tbody>
</table>