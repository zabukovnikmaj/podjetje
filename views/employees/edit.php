<h1>Enter information about the employee</h1>
<?php if (!empty($errors)): ?>
    <p>
    <ul class="errors">
        <?php foreach($errors as $field => $error): ?>
            <li><?php echo $field; ?>: <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
    </p>
<?php endif; ?>

<form action="" method="POST">
    <label for="branchOffice">Branch name</label><br>
    <input type="text" name="branchOffice"> <br> <br>

    <label for="name">Employee name</label><br>
    <input type="text" name="name"> <br> <br>

    <label for="position">Employee position</label><br>
    <input type="text" name="position"> <br> <br>

    <label for="age">Employee age<label><br>
            <input type="number" name="age" step="1" min="15" max="100"><br><br>

            <label for="sex">Employee sex</label><br>
            <input type="text" name="sex"> <br> <br>

            <label for="email">Employee email</label><br>
            <input type="email" name="email"> <br> <br>

            <input type="submit" value="Save employee data"> <br> <br>
</form>
