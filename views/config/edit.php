<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Choose file type</h1>
    <?php
    if (!isset($err)) {
        $err = [];
    } ?>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST">
                <?php echo request_method('PUT', $filteredData ?? null); ?>

                <div class="form-group">
                    <label for="fileType">File type</label><br>
                    <?php view('partials/fileTypeRadioButtons', [
                        'fileTypes' => $fileTypes,
                        'existingFileType' => $existingFileType
                    ]); ?>
                    <?php view('partials/errors', [
                        'err' => $err['fileType']
                    ]); ?>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/" class="btn btn-default" style="margin-left: 10px">Back</a>
            </form>
        </div>
    </div>
</div>
</body>