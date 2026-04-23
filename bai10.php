<?php
$a = $_POST['a'] ?? '';
$b = $_POST['b'] ?? '';
$nghiem = '';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(is_numeric($a) && is_numeric($b)){

        if($a == 0){
            if($b == 0){
                $nghiem = "Phương trình có vô số nghiệm";
            } else {
                $nghiem = "Phương trình vô nghiệm";
            }
        } else {
            $x = -$b / $a;
            $nghiem = "x = " . round($x, 2);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Giải phương trình</title>

<style>
.container {
    width: 420px;
    margin: 80px auto;
    font-family: Arial;
    border: 1px solid #999;
}

.header {
    background: #4CAF50;
    color: white;
    text-align: center;
    font-size: 22px;
    font-weight: bold;
    padding: 10px;
}

.body {
    background: #d9f2d9;
    padding: 20px;
}

.form-group {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.label {
    width: 140px;
}

.input {
    flex: 1;
    padding: 5px;
}

.readonly {
    background: #ffffcc;
}

.center {
    text-align: center;
}

.btn {
    padding: 6px 15px;
    border: 1px solid #666;
    background: #eee;
    cursor: pointer;
}

.btn:hover {
    background: #ddd;
}
</style>

</head>
<body>

<div class="container">
    <div class="header">GIẢI PHƯƠNG TRÌNH BẬC NHẤT</div>

    <form method="post" action="" class="body">

        <div class="form-group">
            <div class="label">Hệ số a:</div>
            <input class="input" type="number" step="0.1" name="a" value="<?= $a ?>" required>
        </div>

        <div class="form-group">
            <div class="label">Hệ số b:</div>
            <input class="input" type="number" step="0.1" name="b" value="<?= $b ?>" required>
        </div>

        <div class="form-group">
            <div class="label">Nghiệm:</div>
            <input class="input readonly" type="text" value="<?= $nghiem ?>" readonly>
        </div>

        <div class="center">
            <button class="btn">Giải phương trình</button>
        </div>

    </form>
</div>

</body>
</html>