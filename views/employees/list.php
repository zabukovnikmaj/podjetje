<p>
    <a href="/employees/create/">New employee</a>
</p>

<table>
    <thead>
    <tr>
        <th>Branch office</th>
        <th>Name</th>
        <th>Position</th>
        <th>Age</th>
        <th>Sex</th>
        <th>Email</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php if (count($employees) > 0): ?>
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?php echo htmlspecialchars($employee['branchOffice']); ?></td>
                <td><?php echo htmlspecialchars($employee['name']); ?></td>
                <td><?php echo htmlspecialchars($employee['position']); ?></td>
                <td><?php echo htmlspecialchars($employee['age']); ?></td>
                <td><?php echo htmlspecialchars($employee['sex']); ?></td>
                <td><?php echo htmlspecialchars($employee['email']); ?></td>
                <td>
                    <a href="/employees/edit?id=<?php echo htmlspecialchars($employee['uuid']); ?>">Edit</a>

                    <form action="/employees/delete?id=<?php echo htmlspecialchars($employee['uuid']); ?>" method="POST">
                        <?php echo request_method('DELETE', $employee); ?>
                        <button type="submit" onclick="return confirm('Confirm?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">No employees found!</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>