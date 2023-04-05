<?php if (isset($err) && !empty($err)): ?>
    <p>
    <ul class="errors">
        <?php foreach($err as $field => $error): ?>
            <li><?php echo $field; ?>: <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
    </p>
<?php endif; ?>