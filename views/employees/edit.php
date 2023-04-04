<h1>Enter information about the employee</h1>
<?php if (!empty($errors)): ?>
    <p>
    <ul class="errors">
        <?php foreach ($errors as $field => $error): ?>
            <li><?php echo $field; ?>: <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
    </p>
<?php endif; ?>

<?php if (count($existingData) > 0): ?>
    <?php foreach ($existingData as $data): ?>
        <?php if ($data['uuid'] === $_GET['id']): ?>
            <form action="" method="POST">
                <label for="branchOffice">Branch name</label><br>
                <input type="text" name="branchOffice" value="<?php echo $data['branchOffice']; ?>"> <br> <br>

                <label for="name">Employee name</label><br>
                <input type="text" name="name" value="<?php echo $data['name']; ?>"> <br> <br>

                <label for="position">Employee position</label><br>
                <input type="text" name="position" value="<?php echo $data['position']; ?>"> <br> <br>

                <label for="age">Employee age<label><br>
                        <input type="number" name="age" step="1" min="15" max="100" value="<?php echo $data['age']; ?>"><br><br>

                        <label for="sex">Employee sex</label><br>
                        <input type="text" name="sex" value="<?php echo $data['sex']; ?>"> <br> <br>

                        <label for="email">Employee email</label><br>
                        <input type="email" name="email" value="<?php echo $data['email']; ?>"> <br> <br>

                        <input type="submit" value="Save employee data"> <br> <br>
            </form>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
