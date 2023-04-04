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
                <td><?php echo $employee['branchOffice']; ?></td>
                <td><?php echo $employee['name']; ?></td>
                <td><?php echo $employee['position']; ?></td>
                <td><?php echo $employee['age']; ?></td>
                <td><?php echo $employee['sex']; ?></td>
                <td><?php echo $employee['email']; ?></td>
                <td>
                    <a href="/faculty/edit?id=<?php echo $employee['uuid']; ?>">Edit</a>
                    <a href="/faculty/delete?id=<?php echo $employee['uuid']; ?>"
                       onclick="return confirm('Confirm?');"
                    >Delete</a>
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