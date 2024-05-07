<?php
require('dbcon.php');

// ตรวจสอบว่ามีการส่งค่า data ผ่านเมธอด POST หรือไม่
if(isset($_POST["data"])) {
    $data = mysqli_real_escape_string($con, $_POST["data"]); // ใช้ mysqli_real_escape_string() เพื่อป้องกัน SQL Injection

    $sql = "SELECT * FROM line WHERE name LIKE '%$data%' OR department LIKE '%$data%'OR date2 LIKE '%$data%'OR date1 LIKE '%$data%'OR internal LIKE '%$data%'OR external LIKE '%$data%' ORDER BY name ASC";
    $result = mysqli_query($con, $sql); // รันคำสั่ง SQL

    if(mysqli_num_rows($result) > 0) {
        $order = 1; // เริ่มต้นนับลำดับที่ 1

        // แสดงผลลัพธ์การค้นหา
        while($row = mysqli_fetch_assoc($result)) {       
            

            $order++; // เพิ่มลำดับทีละ 1
        }
    } else {
        echo "No results found."; // ถ้าไม่พบผลลัพธ์ในการค้นหา
    }
} else {
    echo "No data received."; // ถ้าไม่มีการรับค่า data ผ่านเมธอด POST
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=ilne-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>รายชื่อพนักงานทั้งหมด</title>
</head>

<body>
    <?php
require('dbcon.php');

// ตรวจสอบว่ามีการส่งค่า data ผ่านเมธอด POST หรือไม่
if(isset($_POST["data"])) {
    $data = mysqli_real_escape_string($con, $_POST["data"]); // ใช้ mysqli_real_escape_string() เพื่อป้องกัน SQL Injection

    $sql = "SELECT * FROM line WHERE name LIKE '%$data%' OR department LIKE '%$data%'OR date2 LIKE '%$data%'OR date1 LIKE '%$data%'OR internal LIKE '%$data%'OR external LIKE '%$data%' ORDER BY name ASC"; 
    $result = mysqli_query($con, $sql); // รันคำสั่ง SQL

    $count = mysqli_num_rows($result); // นับจำนวนแถวที่ค้นพบ

    if($count > 0) { // ตรวจสอบว่ามีข้อมูลที่ค้นหาพบหรือไม่
        ?>
    <div class="container">
        <h1 class="text-center mt-3">ข้อมูลที่ค้นหา</h1>
        <form action="search.php" class="form-group my-3" method="POST">
            <div class="row">
                <div class="col-6">
                    <input type="text" placeholder="กรอกข้อมูลที่ต้องการค้นหา" class="form-control" name="data"
                        required>
                </div>
                <div class="col-6">
                    <input type="submit" value="ค้นหาข้อมูล" class="btn btn-info">
                </div>
            </div>
        </form>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Goods</th>
                    <th>Amount</th>
                    <th>Requested time</th>
                    <th>Required time</th>
                    <th>Internal,External</th>
                    <th>Status</th>
                    <th>leaf_status</th>
                    <th>Note</th>

                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['department']; ?></td>
                    <td><?php echo $row['goods']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['time2']; ?></td>
                    <td><?php echo $row['time1']; ?></td>
                    <td><?php echo $row['internal'] . ':: ' . $row['external']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['leaf_status']; ?></td>
                    <td><?php echo $row['note']; ?></td>
                    <td>


                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-success">กลับหน้าแรก</a>
    </div>
    <?php } else { ?>
    <div class="container">
        <div class="alert alert-danger">
            <b>ไม่พบข้อมูล!!!</b>
        </div>
        <a href="index.php" class="btn btn-success">กลับหน้าแรก</a>
    </div>
    <?php }
} else {
    echo "No data received."; // ถ้าไม่มีการรับค่า data ผ่านเมธอด POST
}
?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/Sxw