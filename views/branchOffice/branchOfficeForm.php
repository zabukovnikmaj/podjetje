<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Branch office</title>
</head>
<body>
    <h1>Enter information about the branch office</h1>
    <form action="" method="POST">
        <label for="name">Branch name</label><br>
        <input type="text" name="name"><br><br>

        <label for="address">Branch address</label><br>
        <input type="text" name="address"><br><br>

        <label for="products">Products name</label><br>
        <textarea name="products" cols="50" rows="4"></textarea> <br> <br>

        <input type="submit" value="Save branch office data"> <br> <br>

        <?php foreach($err as $error){
            if(strpos($error, "!")){
                echo '<li>' . $error . '</li>';
            }
        }?>
    </form>
</body>
</html>

