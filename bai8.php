<?php
$hk1 = $_POST['hk1'] ?? '';
$hk2 = $_POST['hk2'] ?? '';
$dtb = '';
$ketqua = '';
$xeploai = '';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(is_numeric($hk1) && is_numeric($hk2)){
        $dtb = ($hk1 + $hk2 * 2) / 3;

        $ketqua = ($dtb >= 5) ? "Được lên lớp" : "Ở lại lớp";

        if($dtb >= 8) $xeploai = "Giỏi";
        else if($dtb >= 6.5) $xeploai = "Khá";
        else if($dtb >= 5) $xeploai = "Trung bình";
        else $xeploai = "Yếu";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Kết quả học tập</title>

<style>
/* Layout chung */
.container {
    width: 420px;
    margin: 80px auto;
    font-family: Arial;
    border: 1px solid #999;
}

/* Header */
.header {
    background: #cc3366;
    color: white;
    text-align: center;
    font-size: 22px;
    font-weight: bold;
    padding: 10px;
}

/* Body */
.body {
    background: #d99ab3;
    padding: 20px;
}

/* Row */
.form-group {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

/* Label */
.label {
    width: 150px;
}

/* Input */
.input {
    flex: 1;
    padding: 5px;
}

/* Readonly */
.readonly {
    background: #ffffcc;
}

/* Button */
.btn {
    margin-top: 10px;
    padding: 6px 15px;
    border: 1px solid #666;
    background: #eee;
    cursor: pointer;
}

.btn:hover {
    background: #ddd;
}

/* Center */
.center {
    text-align: center;
}
</style>

</head>
<body>

<div class="container">
    <div class="header">KẾT QUẢ HỌC TẬP</div>

    <form method="post" class="body">

        <div class="form-group">
            <div class="label">Điểm HK1:</div>
            <input class="input" type="number" name="hk1" step="0.1" value="<?= $hk1 ?>" required>
        </div>

        <div class="form-group">
            <div class="label">Điểm HK2:</div>
            <input class="input" type="number" name="hk2" step="0.1" value="<?= $hk2 ?>" required>
        </div>

        <div class="form-group">
            <div class="label">Điểm trung bình:</div>
            <input class="input readonly" type="text" value="<?= $dtb ?>" readonly>
        </div>

        <div class="form-group">
            <div class="label">Kết quả:</div>
            <input class="input readonly" type="text" value="<?= $ketqua ?>" readonly>
        </div>

        <div class="form-group">
            <div class="label">Xếp loại học lực:</div>
            <input class="input readonly" type="text" value="<?= $xeploai ?>" readonly>
        </div>

        <div class="center">
            <button class="btn">Xem kết quả</button>
        </div>

    </form>
</div>

</body>
</html>