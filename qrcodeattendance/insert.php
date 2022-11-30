<?php
    session_start();
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'qrcodedb';

    $conn = new mysqli($server, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection Failed" .$conn->connect_error);
    }
    if(isset($_POST['text'])){
        $text = $_POST['text'];

        $sql = "INSERT INTO `student_attendance`(`student_name`,`time_in`) VALUES('$text', NOW())";

        if($conn->query($sql) ===TRUE){
            $_SESSION['success'] = $text.' added successfully';
        }else{
            $_SESSION['error'] = $conn->error; 
        }
        header("location: index.php");
    }
    $conn->close();
?>