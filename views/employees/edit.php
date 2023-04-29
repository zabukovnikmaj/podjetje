<!DOCTYPE html>
<html lang="en" class="bootstrap">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
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
    <h1>Enter information about the employee</h1>

    <?php
    if (!isset($err)) {
        $err = [];
    }
    view('partials/errors', ['err' => $err]);
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="branchOffice">Branch name</label>
            <input type="text" name="branchOffice" value="<?php echo htmlspecialchars($filteredData['branchOffice']); ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="name">Employee name</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($filteredData['name']); ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="position">Employee position</label>
            <input type="text" name="position" value="<?php echo htmlspecialchars($filteredData['position']); ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="age">Employee age</label>
            <input type="number" name="age" step="1" min="15" max="100" value="<?php echo htmlspecialchars($filteredData['age']); ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="sex">Employee sex</label>
            <input type="text" name="sex" value="<?php echo htmlspecialchars($filteredData['sex']); ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Employee email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($filteredData['email']); ?>" class="form-control">
        </div>

        <input type="submit" value="Save employee data" class="btn btn-primary">
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
