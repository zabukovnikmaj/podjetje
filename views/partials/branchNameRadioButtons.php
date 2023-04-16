<?php
if(isset($branchOffices) && !empty($branchOffices)):
    foreach ($branchOffices as $branchOffice):
        ?>
        <label><input type="radio" name="branchOffice" value="<?php echo $branchOffice['uuid'] ?>"><?php echo $branchOffice['name'] ?></label><br>
    <?php
    endforeach;
endif;
if(!(isset($branchOffices) && !empty($branchOffices))):
    ?>
    <p>No branch offices have been entered yet!</p>
<?php endif; ?>
<br>
