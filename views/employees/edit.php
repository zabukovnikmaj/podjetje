<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
</head>
<body>
<h1>Enter information about the employee</h1>
<?php
if (!isset($err)) {
    $err = [];
}
view('partials/errors', [
    'err' => $err
]);
?>

<form action="" method="POST">
    <?php echo request_method('PUT', $filteredData ?? null); ?>

    <label for="branchOffice">Branch name</label><br>
    <input type="text" name="branchOffice" value="<?php echo old('branchOffice', isset($filteredData['branchOffice']) ? $filteredData['branchOffice'] : null); ?>"> <br> <br>

    <label for="name">Employee name</label><br>
    <input type="text" name="name" value="<?php echo old('name', isset($filteredData['name']) ? $filteredData['name'] : null); ?>"> <br> <br>

    <label for="position">Employee position</label><br>
    <input type="text" name="position" value="<?php echo old('position', isset($filteredData['position']) ? $filteredData['position'] : null); ?>"> <br> <br>

    <label for="age">Employee age</label><br>
    <input type="number" name="age" step="1" min="15" max="100" value="<?php echo old('age', isset($filteredData['age']) ? $filteredData['age'] : null); ?>"><br><br>

    <label for="sex">Employee sex</label><br>
    <input type="text" name="sex" value="<?php echo old('sex', isset($filteredData['sex']) ? $filteredData['sex'] : null); ?>"> <br> <br>

    <label for="email">Employee email</label><br>
    <input type="email" name="email" value="<?php echo old('email', isset($filteredData['email']) ? $filteredData['email'] : null); ?>"> <br> <br>

    <input type="submit" value="Save employee data"> <br> <br>
</form>
</body>
