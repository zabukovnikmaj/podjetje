<?php if (!empty($errors)): ?>
    <p>
    <ul class="errors">
        <?php foreach($errors as $field => $error): ?>
            <li><?php echo $field; ?>: <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
    </p>
<?php endif; ?>