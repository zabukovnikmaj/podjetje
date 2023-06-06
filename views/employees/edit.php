<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Enter information about the employee</h1>
    <?php
    if (!isset($err)) {
        $err = [];
    } ?>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST">
                <?php echo request_method('PUT', $filteredData ?? null); ?>

                <div class="form-group">
                    <label for="branchOffice">Branch office name</label><br>
                    <?php view('partials/branchNameRadioButtons', [
                        'branchOffices' => $branchOffices,
                        'existingBranchOffice' => $filteredData['branchOffice']
                    ]); ?>
                    <?php view('partials/errors', [
                        'err' => $err['branchOffice']
                    ]); ?>
                </div>

                <div class="form-group">
                    <label for="name">Employee name</label><br>
                    <input type="text" class="form-control" name="name"
                           value="<?php echo old('name', isset($filteredData['name']) ? $filteredData['name'] : null); ?>">
                    <?php view('partials/errors', [
                        'err' => $err['name']
                    ]); ?>
                </div>

                <div class="form-group">
                    <label for="position">Employee position</label><br>
                    <input type="text" class="form-control" name="position"
                           value="<?php echo old('position', isset($filteredData['position']) ? $filteredData['position'] : null); ?>">
                    <?php view('partials/errors', [
                        'err' => $err['position']
                    ]); ?>
                </div>

                <div class="form-group">
                    <label for="age">Employee age</label><br>
                    <input type="number" class="form-control" name="age" step="1" min="15" max="100"
                           value="<?php echo old('age', isset($filteredData['age']) ? $filteredData['age'] : null); ?>">
                    <?php view('partials/errors', [
                        'err' => $err['age']
                    ]); ?>
                </div>

                <div class="form-group">
                    <label>Employee sex:</label><br>
                    <input type="radio" name="sex" value="m" <?php if ($filteredData['sex'] === 'm') echo 'checked'; ?>>
                    <label for="male">Male</label><br>
                    <input type="radio" name="sex" value="f" <?php if ($filteredData['sex'] === 'f') echo 'checked'; ?>>
                    <label for="female">Female</label>
                    <?php view('partials/errors', [
                        'err' => $err['sex']
                    ]); ?>
                </div>


                <div class="form-group">
                    <label for="email">Employee email</label>
                    <input type="email" class="form-control"
                           name="email"
                           value="<?php echo old('email', isset($filteredData['email']) ? $filteredData['email'] : null); ?>">
                    <?php view('partials/errors', [
                        'err' => $err['email']
                    ]); ?>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/employees/list/" class="btn btn-default" style="margin-left: 10px">Back</a>
            </form>
        </div>
    </div>
</div>
</body>