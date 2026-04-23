 <?php
    $result = '';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $gio = $_POST['gio'];
        if($gio >= 0 && $gio < 11){
            $result = "<h2>Chào buổi sáng!</h2>";
        } else if($gio >= 11 && $gio <= 13){
            $result = "<h2>Chào buổi trưa!</h2>";
        } else if($gio >= 13 && $gio < 18){
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

<body class="box">

    <!-- Css -->
     <style>

        body {
            background: #ddd;
            font-family: Arial, sans-serif;
        }

        .box{
            width:420px;
            margin: 100px auto;
            border: 1px solid #999;
        }

        .header{
            background: #6fa8dc;
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            color: blue;
            padding: 10px;
        }

        .content{
            background: #cfe2f3;
            padding: 20px;
            text-align: center;
        }

        input[type="number"]{
            padding: 5px;
            width: 100px;
            margin-left: 10px;
        }

        .result{
            margin-top:15px;
            font-size:18px;
            color: #333;
        }

        .footer{
            background: #6fa8dc;
            text-align: center;
            padding: 10px;
        }

        button {
            padding: 6px 15px;
            border: 1px solid #888;
            background: #eee;
            cursor: pointer;
        }

        button:hover {
            background: #ddd;
        }
    </style>
    <!-- chào theo giờ -->
    
     <div class="header">CHÀO THEO GIỜ</div>
    <form method="post" action="">
        <div class="content">
            <label for="gio">Nhập giờ (0-23):</label>
            <input type="number" id="gio" name="gio" value="<?php echo $_POST['gio'] ?? '';?>" required>
            <div class="result">
                <?php echo $result; ?>
            </div>
        </div>

        <div class="footer">
            <button type="submit">Chào</button>
        </div>
    </form>
   
</body>
</html>