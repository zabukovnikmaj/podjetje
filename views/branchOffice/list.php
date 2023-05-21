<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<div class="container" style="margin-top: 50px">
    <h1 style="margin-top: 0px">Branch offices information</h1>
    <div class="row">
        <div class="col-md-12">
            <p>
                <a href="/branchOffices/create/" class="btn btn-primary">New branch office</a>
                <a href="/" class="btn btn-default">Back</a>
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
                            <td><?php echo htmlspecialchars(implode(', ', $branchOffice['products']));?></td>
                            <td>
                                <a href="/branchOffice/edit/<?php echo htmlspecialchars($branchOffice['uuid']); ?>" class="btn btn-primary">Edit</a>
                                <form action="/branchOffice/delete/<?php echo htmlspecialchars($branchOffice['uuid']); ?>" method="POST">
                                    <?php echo request_method('DELETE', $branchOffice); ?>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm?');">Delete</button>
                                </form>
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
    </div>
</div>
