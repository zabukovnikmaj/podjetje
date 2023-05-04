<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees</title>
</head>
<body>
<h1>Enter information about an employee</h1>

<?php
if(!isset($err)){
    $err = [];
}
view('partials/errors', [
    'err' => $err
]); ?>

<form action="" method="POST">
    <label for="branchOffice">Branch name</label><br>
    <input type="text" name="branchOffice" value="<?php echo htmlspecialchars($formData['branchOffice']) ?? ''; ?>"> <br> <br>

    <label for="name">Employee name</label><br>
    <input type="text" name="name" value="<?php echo htmlspecialchars($formData['name']) ?? ''; ?>"> <br> <br>

    <label for="position">Employee position</label><br>
    <input type="text" name="position" value="<?php echo htmlspecialchars($formData['position']) ?? ''; ?>"> <br> <br>

    <label for="age">Employee age<label><br>
    <input type="number" name="age" step="1" min="15" max="100" value="<?php echo htmlspecialchars($formData['age']) ?? ''; ?>"><br><br>

    <label for="sex">Employee sex</label><br>
    <input type="text" name="sex" value="<?php echo htmlspecialchars($formData['sex']) ?? ''; ?>"> <br> <br>

    <label for="email">Employee email</label><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($formData['email']) ?? ''; ?>"> <br> <br>

    <input type="submit" value="Save employee data"> <br> <br>
</form>
</body>
</html>