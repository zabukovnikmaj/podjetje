<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
</head>
<body>
<?php view('partials/navBar' , []); ?>
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
    <label for="branchOffice">Branch name</label><br>
    <input type="text" name="branchOffice" value="<?php echo htmlspecialchars($filteredData['branchOffice']); ?>"> <br> <br>

    <label for="name">Employee name</label><br>
    <input type="text" name="name" value="<?php echo htmlspecialchars($filteredData['name']); ?>"> <br> <br>

    <label for="position">Employee position</label><br>
    <input type="text" name="position" value="<?php echo htmlspecialchars($filteredData['position']); ?>"> <br> <br>

    <label for="age">Employee age</label><br>
    <input type="number" name="age" step="1" min="15" max="100" value="<?php echo htmlspecialchars($filteredData['age']); ?>"><br><br>

    <label for="sex">Employee sex</label><br>
    <input type="text" name="sex" value="<?php echo htmlspecialchars($filteredData['sex']); ?>"> <br> <br>

    <label for="email">Employee email</label><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($filteredData['email']); ?>"> <br> <br>

    <input type="submit" value="Save employee data"> <br> <br>
</form>
</body>
