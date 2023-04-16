<?php
if(isset($products) && !empty($products)):
    foreach ($products as $product):
        ?>
        <label><input type="checkbox" name="products[]" value="<?php echo htmlspecialchars($product['uuid']) ?>"><?php echo htmlspecialchars($product['name']) ?></label><br>
    <?php
    endforeach;
endif;
if(!(isset($products) && !empty($products))):
?>
    <p>No products have been entered yet!</p>
<?php endif; ?>
<br>


