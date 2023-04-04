<h1>Enter information about the products</h1>
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
                <label for="name">Product name</label><br>
                <input type="text" name="name" value="<?php echo $data['name']; ?>"> <br> <br>

                <label for="description">Product description</label><br>
                <textarea name="description" cols="50" rows="4"><?php echo $data['description']; ?></textarea> <br><br>

                <label for="price">Product price</label><br>
                <input type="number" name="price" step="0.01" min="0" max="10000" value="<?php echo $data['price']; ?>"><br><br>

                <label for="deliveryDate">Product delivery date</label><br>
                <input type="date" name="deliveryDate" value="<?php echo $data['date']; ?>"><br><br>

                <input type="submit" value="Save product data"> <br> <br>
            </form>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>