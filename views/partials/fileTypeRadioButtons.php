<?php
if (isset($fileTypes) && !empty($fileTypes)):
    foreach ($fileTypes as $fileType):
        ?>
        <label>
            <input type="radio" name="fileType" value="<?php echo htmlspecialchars($fileType) ?>"
                <?php echo ($existingFileType === $fileType) ? 'checked' : ''; ?>>
            <?php echo htmlspecialchars($fileType) ?>
        </label> <br>

    <?php
    endforeach;
endif; ?>
<br>
