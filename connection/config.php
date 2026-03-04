<?php
$conn = mysqli_connect("localhost", "root", "", "shop_management");
if(!$conn){
    die("connection failed". mysqli_connect_error());
}
?>