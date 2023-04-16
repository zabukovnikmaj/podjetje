<?php
if(!isset($productsData)){
    $productsData = [];
}
if(isset($products) && !empty($products)):
    foreach ($products as $product):
        ?>
        <label>
            <input type="checkbox" name="products[]" value="<?php echo htmlspecialchars($product['uuid']) ?>"
                <?php echo (in_array($product['uuid'], $productsData) ? 'checked' : ''); ?>>
                <?php echo htmlspecialchars($product['name'])  ?>
        </label><br>

    <?php
    endforeach;
endif;
if(!(isset($products) && !empty($products))):
?>
    <p>No products have been entered yet!</p>
<?php endif; ?>
<br>