<!DOCTYPE html>
<html lang="en" class="bootstrap">
<head>
    <meta charset="UTF-8">
    <title>Employees</title>
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
        <a href="/employees/create/" class="btn btn-primary">New employee</a>
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
                    <td><?php echo htmlspecialchars($employee['branchOffice']); ?></td>
                    <td><?php echo htmlspecialchars($employee['name']); ?></td>
                    <td><?php echo htmlspecialchars($employee['position']); ?></td>
                    <td><?php echo htmlspecialchars($employee['age']); ?></td>
                    <td><?php echo htmlspecialchars($employee['sex']); ?></td>
                    <td><?php echo htmlspecialchars($employee['email']); ?></td>
                    <td>
                        <a href="/employees/edit?id=<?php echo htmlspecialchars($employee['uuid']); ?>" class="btn btn-primary">Edit</a>
                        <a href="/employees/delete?id=<?php echo htmlspecialchars($employee['uuid']); ?>"
                           onclick="return confirm('Confirm?');"
                           class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No employees found!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>