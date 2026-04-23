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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tìm số lớn hơn</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width:350px;">
        <h4 class="text-center mb-3">Tìm số lớn hơn</h4>

        <form action="" method="post">
            <div class="mb-3">
                <label for="a" class="form-label">Số thứ nhất:</label>
                <input type="number" class="form-control" id="a" name="a" value="<?php echo $_POST['a'] ?? '';?>" required>
            </div>
            <div class="mb-3">
                <label for="b" class="form-label">Số thứ hai:</label>
                <input type="number" class="form-control" id="b" name="b" value="<?php echo $_POST['b'] ?? '';?>" required>
            </div>
            <div class="mb-3">
                <label for="solonhon" class="form-label">Số lớn hơn:</label>
                <input type="text" class="form-control" id="solonhon" name="solonhon" value="<?php echo $result;?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary w-100">Tìm</button>
            
        </form>
        </div>
    </div>

</body>
</html>