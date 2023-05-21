<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<div class="container" style="margin-top: 50px;">
    <h1 style="margin-top: 0px">Employees information</h1>
    <div class="row">
        <div class="col-md-12">
            <p>
                <a href="/employees/create/" class="btn btn-primary">New employee</a>
                <a href="/" class="btn btn-default">Back</a>
            </p>
            <table class="table">
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
                            <td><?php echo $employee['branchOffice'] == null ?  'This branch office does not exist!': htmlspecialchars($employee['branchOffice']); ?></td>
                            <td><?php echo htmlspecialchars($employee['name']); ?></td>
                            <td><?php echo htmlspecialchars($employee['position']); ?></td>
                            <td><?php echo htmlspecialchars($employee['age']); ?></td>
                            <td><?php echo htmlspecialchars($employee['sex']); ?></td>
                            <td><?php echo htmlspecialchars($employee['email']); ?></td>
                            <td>
                                <a href="/employees/edit/<?php echo htmlspecialchars($employee['uuid']); ?>" class="btn btn-primary">Edit</a>
                                <form action="/employees/delete/<?php echo htmlspecialchars($employee['uuid']); ?>" method="POST">
                                    <?php echo request_method('DELETE', $employee); ?>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm?');">Delete</button>
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
        </div>
    </div>
</div>
