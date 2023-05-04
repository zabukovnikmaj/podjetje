<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Branch office</title>
</head>
<body>
<h1>Enter information about the branch office</h1>

<?php
if(!isset($err)){
    $err = [];
} ?>

<a href="/branchOffice/list/">Back</a>

<form action="" method="POST">
    <label for="name">Branch name</label><br>

    <input type="text" name="name"><br>
    <?php view('partials/errors', [
    'err' => $err['name']
    ]); ?><br>

    <label for="address">Branch address</label><br>
    <input type="text" name="address"><br>
    <?php view('partials/errors', [
        'err' => $err['address']
    ]); ?><br>

    <label for="products">Products name</label><br>
    <textarea name="products" cols="50" rows="4"></textarea> <br>
    <?php view('partials/errors', [
        'err' => $err['products']
    ]); ?><br>

    <input type="text" name="name" value="<?php echo htmlspecialchars($formData['name']) ?? ''; ?>"><br><br>

    <label for="address">Branch address</label><br>
    <input type="text" name="address" value="<?php echo htmlspecialchars($formData['address']) ?? ''; ?>"><br><br>

    <label for="products">Products name</label><br>
    
    <?php view('partials/productsCheckbox', [
            'products' => $products
]); ?>


    <input type="submit" value="Save branch office data"> <br> <br>
</form>
</body>
</html>

