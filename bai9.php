<?php
$toan = $_POST['toan'] ?? '';
$ly = $_POST['ly'] ?? '';
$hoa = $_POST['hoa'] ?? '';
$diemchuan = $_POST['diemchuan'] ?? '';

$tong = '';
$ketqua = '';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(is_numeric($toan) && is_numeric($ly) && is_numeric($hoa) && is_numeric($diemchuan)){
        
        $tong = $toan + $ly + $hoa;

        if($toan == 0 || $ly == 0 || $hoa == 0){
            $ketqua = "Rớt";
        } else if($tong >= $diemchuan){
            $ketqua = "Đậu";
        } else {
            $ketqua = "Rớt";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Điểm thi đại học</title>

<style>
.container {
    width: 420px;
    margin: 80px auto;
    font-family: Arial;
    border: 1px solid #999;
}

.header {
    background: #3399cc;
    color: white;
    text-align: center;
    font-size: 22px;
    font-weight: bold;
    padding: 10px;
}

.body {
    background: #cfe2f3;
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
    <div class="header">ĐIỂM THI ĐẠI HỌC</div>

    <form method="post" action="" class="body">

        <div class="form-group">
            <div class="label">Toán:</div>
            <input class="input" type="number" step="0.1" name="toan" value="<?= $toan ?>" required>
        </div>

        <div class="form-group">
            <div class="label">Lý:</div>
            <input class="input" type="number" step="0.1" name="ly" value="<?= $ly ?>" required>
        </div>

        <div class="form-group">
            <div class="label">Hóa:</div>
            <input class="input" type="number" step="0.1" name="hoa" value="<?= $hoa ?>" required>
        </div>

        <div class="form-group">
            <div class="label">Điểm chuẩn:</div>
            <input class="input" type="number" step="0.1" name="diemchuan" value="<?= $diemchuan ?>" required>
        </div>

        <div class="form-group">
            <div class="label">Tổng điểm:</div>
            <input class="input readonly" type="text" value="<?= $tong ?>" readonly>
        </div>

        <div class="form-group">
            <div class="label">Kết quả:</div>
            <input class="input readonly" type="text" value="<?= $ketqua ?>" readonly>
        </div>

        <div class="center">
            <button class="btn">Xem kết quả</button>
        </div>

    </form>
</div>

</body>
</html>