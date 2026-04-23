<?php
$result = '';
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $a = $_POST['a'];
    $b = $_POST['b'];
    // $solonhon = $_POST['solonhon'];

    if($a > $b){
        $result = $a;
    } else if($b > $a){
        $result = $b;
    } else {
        $result = "Cả hai số bằng nhau.";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm số lớn hơn</title>
</head>
<body>
    <!-- Form tìm số lớn hơn -->
    <h1>Tìm số lớn hơn</h1>
    <form method="post" action="">
        <label for="a">Số thứ nhất:</label>
        <input type="number" id="a" name="a" value="<?php echo $_POST['a'] ?? '';?>" required>
        <label for="b">Số thứ hai:</label>
        <input type="number" id="b" name="b" value="<?php echo $_POST['b'] ?? '';?>" required>
        <label for="solonhon">Số lớn hơn:</label>
        <h2>Số lớn hơn: <?php echo '' . $result ?? '';?></h2>
        <input type="submit" value="Tìm số lớn hơn">
    </form>

</body>
</html>