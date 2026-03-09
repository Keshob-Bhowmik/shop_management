<?php
session_start();
include "connection/config.php";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo "hheeeee";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * from admins WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id,$db_username, $db_password);
    $stmt->fetch();
    if($stmt->num_rows > 0){
        echo "okay1";
        if($password==$db_password){
            $_SESSION['username'] = $username;
            $_SESSION['message'] = 'log in successfull';
            header('location: index.php');
            exit();
        } else{
            $_SESSION['message']= 'wrong username/password';
            header("location: login.php");
            exit();
        }
    }
}
?>