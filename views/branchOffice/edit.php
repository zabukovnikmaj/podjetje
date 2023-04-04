<h1>Enter information about the branch office</h1>
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
    <label for="name">Branch name</label><br>
    <input type="text" name="name" value="<?php echo $data['name']; ?>"><br><br>

    <label for="address">Branch address</label><br>
    <input type="text" name="address" value="<?php echo $data['address']; ?>"><br><br>

    <label for="products">Products name</label><br>
    <textarea name="products" cols="50" rows="4"><?php echo implode(', ', $data['products']); ?></textarea> <br> <br>

    <input type="submit" value="Save branch office data"> <br> <br>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; ?>
</form>