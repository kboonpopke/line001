<?php
// เชื่อมต่อกับฐานข้อมูล MySQL
require 'dbcon.php';

// ตรวจสอบว่ามีการส่งค่า status มาหรือไม่
if(isset($_POST['status'])) {
    // รับค่า status จากแบบฟอร์มและทำการเก็บในตัวแปร
    $status = $_POST['status'];
    
    // รับค่า ID ที่ต้องการแก้ไข
    $line_id = $_POST['id'];

    // เขียนคำสั่ง SQL เพื่อปรับปรุงข้อมูลในฐานข้อมูล
    $sql = "UPDATE line SET status ='$status' WHERE id='$line_id'";

    // ส่งคำสั่ง SQL ไปยังฐานข้อมูล
    if(mysqli_query($con, $sql)) {
        header("Location: personal.php");
        exit(); // ออกจากสคริปต์หลังจากใช้ header ในการเปลี่ยนเส้นทาง
    } else {
        echo "เกิดข้อผิดพลาดในการยืม-คืน: " . mysqli_error($con);
    }
}
?>
