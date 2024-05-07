<?php
session_start();

$servername = "localhost";  // Change this if your MySQL server is on a different host
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password
$dbname = "warehouse";      // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    $input_password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, password FROM pin WHERE Password = ?");

    $stmt->bind_param("s", $input_password);
    $stmt->execute();
    $stmt->store_result();

    // Check if there is a match
    if ($stmt->num_rows > 0) {
        // Fetch user data
        $stmt->bind_result($id, $password);
        $stmt->fetch();   
      
        // Redirect to index.php
        header("Location: personal.php");
        exit();
    } else {
        // Login failed
        header("Location: 404.php");
        exit(); // อย่าลืมใส่ exit() เพื่อหยุดการทำงานทันทีหลังจาก redirect
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
