<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees</title>
</head>
<body>
<h1>Enter information about an employee</h1>

<?php
if (!isset($err)) {
    $err = [];
} ?>

<a href="/employees/list/">Back</a>

<form action="" method="POST">
    <label for="branchOffice">Branch name</label><br>

    <input type="text" name="branchOffice"> <br>
    <?php view('partials/errors', [
        'err' => $err['branchOffice']
    ]); ?><br>

    <label for="name">Employee name</label><br>
    <input type="text" name="name"> <br>
    <?php view('partials/errors', [
        'err' => $err['name']
    ]); ?><br>

    <label for="position">Employee position</label><br>
    <input type="text" name="position"> <br>
    <?php view('partials/errors', [
        'err' => $err['position']
    ]); ?><br>

    <label for="age">Employee age</label><br>
    <input type="number" name="age" step="1" min="15" max="100"><br>
    <?php view('partials/errors', [
        'err' => $err['age']
    ]); ?><br>

    <label for="sex">Employee sex</label><br>
    <input type="text" name="sex"> <br>
    <?php view('partials/errors', [
        'err' => $err['sex']
    ]); ?><br>

    <label for="email">Employee email</label><br>
    <input type="email" name="email"> <br>
    <?php view('partials/errors', [
        'err' => $err['email']
    ]); ?><br>


    <?php view('partials/branchNameRadioButtons', [
            'branchOffices' => $branchOffices
    ]); ?>

    <label for="name">Employee name</label><br>
    <input type="text" name="name" value="<?php echo htmlspecialchars($formData['name']) ?? ''; ?>"> <br> <br>

    <label for="position">Employee position</label><br>
    <input type="text" name="position" value="<?php echo htmlspecialchars($formData['position']) ?? ''; ?>"> <br> <br>

    <label for="age">Employee age</label><br>
    <input type="number" name="age" step="1" min="15" max="100"><br><br>

    <label>Employee sex:</label><br>
    <input type="radio" name="sex" value="m" <?php if ($filteredData['sex'] === 'm') echo 'checked'; ?>>
    <label for="male">Male</label><br>
    <input type="radio" name="sex" value="f" <?php if ($filteredData['sex'] === 'f') echo 'checked'; ?>>
    <label for="female">Female</label><br><br>

    <label for="email">Employee email</label><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($formData['email']) ?? ''; ?>"> <br> <br>


    <input type="submit" value="Save employee data"> <br> <br>
</form>
</body>
</html>