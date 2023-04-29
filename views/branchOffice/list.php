<!DOCTYPE html>
<html lang="en" class="bootstrap">
<head>
    <meta charset="UTF-8">
    <title>Branch Offices</title>
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
        <a href="/branchOffices/create/" class="btn btn-primary">New branch office</a>
    </p>

    <table class="table">
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
                    <td><?php echo htmlspecialchars(implode(', ', $branchOffice['products'])); ?></td>
                    <td>
                        <a href="/branchOffice/edit?id=<?php echo htmlspecialchars($branchOffice['uuid']); ?>" class="btn btn-primary">Edit</a>
                        <a href="/branchOffice/delete?id=<?php echo htmlspecialchars($branchOffice['uuid']); ?>"
                           onclick="return confirm('Confirm?');" class="btn btn-danger"
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
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
