 <?php
    $result = '';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $gio = $_POST['gio'];
        if($gio >= 0 && $gio < 12){
            $result = "<h2>Chào buổi sáng!</h2>";
        } else if($gio >= 12 && $gio < 18){
            $result = "<h2>Chào buổi chiều!</h2>";
        } else if($gio >= 18 && $gio <= 23){
            $result = "<h2>Chào buổi tối!</h2>";
        } else {
            $result = "<h2>Giờ không hợp lệ. Vui lòng nhập từ 0 đến 23.</h2>";
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào theo giờ</title>
</head>
<body>
    <!-- chào theo giờ -->
    <h1>Chào theo giờ</h1>
    <form method="post" action="">
        <label for="gio" >Nhập giờ (0-23):</label>
        <input type="number" id="gio" name="gio" value="<?php echo $_POST['gio'] ?? '';?>" required>
        <h2><?php echo $result;?></h2>
        <input type="submit" value="Chào">
    </form>
   
</body>
</html>