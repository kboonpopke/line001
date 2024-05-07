<?php
session_start();

// เชื่อมต่อฐานข้อมูล
$con = mysqli_connect("localhost","root","","warehouse");
if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

if(isset($_POST['save_line'])){  
   
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $goods = mysqli_real_escape_string($con, $_POST['goods']);   
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $time2 = mysqli_real_escape_string($con, $_POST['time2']);
    $date2 = mysqli_real_escape_string($con, $_POST['date2']);
    $time1 = mysqli_real_escape_string($con, $_POST['time1']);
    $date1 = mysqli_real_escape_string($con, $_POST['date1']);
    $note = mysqli_real_escape_string($con, $_POST['note']);
    $internal = mysqli_real_escape_string($con, $_POST['internal']);    
    $external = mysqli_real_escape_string($con, $_POST['external']);  

    // บันทึกข้อมูลลงในฐานข้อมูล
    $query = "INSERT INTO line (name, department, goods, amount, time2, date2, time1, date1, note, internal, external) 
              VALUES ('$name', '$department', '$goods', '$amount', '$time2', '$date2', '$time1', '$date1', '$note', '$internal', '$external')";

    $query_run = mysqli_query($con, $query);

    if($query_run) {
        // ส่งข้อความผ่าน LINE Notify
        $sToken = "FWSPecZmV0VU1fG7A3nFYF7RYu2FnrCxmi7f5qPgfNI";
        $sMessage = "\n";
        $sMessage .= "🧑‍💻ชื่อผู้เบิก:: ". $name ."\n";
        $sMessage .= "🎫แผนก:: ". $department ."\n";
        $sMessage .= "📑การการเบิก:: ". $goods ."\n";
        $sMessage .= "📦➡️Internal:: ". $internal ."\n";
        $sMessage .= "⬅️🚚External:: ". $external ."\n";
        $sMessage .= "📦จำนวน:: ". $amount ."\n";
        $sMessage .= "🕓วันเวลาที่ทำรายการ:: วันที่" . $date2 . "::เวลา" . $time2 . "\n";
        $sMessage .= "⏰วันเวลาที่ต้องการ:: วันที่" . $date1 . "::เวลา " . $time1 . "\n";        
        $sMessage .= "📍หมายเหตุ:: ". $note ."\n";

        $chOne = curl_init(); 
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt($chOne, CURLOPT_POST, 1); 
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        $headers = array( 
            'Content-type: application/x-www-form-urlencoded', 
            'Authorization: Bearer '.$sToken.'',
        );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec($chOne); 

        if ($result){
            $_SESSION['success'] = "ส่งการแจ้งเตือนเรียบร้อย!☺";
            header("location: create.php");            
        } else {
            $_SESSION['error'] = "ส่งการแจ้งเตือนผิดพลาด!!!";
            header("location: create.php");  
        }
    }
    else
    {
        $_SESSION['error'] = "Stock Not Created";
        header("Location: create.php");
        exit();
    }
}
?>
