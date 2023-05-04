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

<a href="/employees/list/">Back</a>

<form action="" method="POST">
    <label for="branchOffice">Branch name</label><br>
    <?php view('partials/branchNameRadioButtons', [
        'branchOffices' => $branchOffices,
        'existingBranchOffice' => $filteredData['branchOffice']
    ]); ?>

    <label for="name">Employee name</label><br>
    <input type="text" name="name" value="<?php echo htmlspecialchars($filteredData['name']); ?>"> <br> <br>

    <label for="position">Employee position</label><br>
    <input type="text" name="position" value="<?php echo htmlspecialchars($filteredData['position']); ?>"> <br> <br>

    <label for="age">Employee age</label><br>
    <input type="number" name="age" step="1" min="15" max="100" value="<?php echo htmlspecialchars($filteredData['age']); ?>"><br><br>

    <label>Employee sex:</label><br>
    <input type="radio" name="sex" value="m" <?php if($filteredData['sex'] === 'm') echo 'checked'; ?>>
    <label for="male">Male</label><br>
    <input type="radio" name="sex" value="f" <?php if($filteredData['sex'] === 'f') echo 'checked'; ?>>
    <label for="female">Female</label><br><br>


    <label for="email">Employee email</label><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($filteredData['email']); ?>"> <br> <br>

    <input type="submit" value="Save employee data"> <br> <br>
</form>
</body>
