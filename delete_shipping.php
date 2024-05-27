<?php

// error_reporting(0);
session_start();


$host="localhost";

$user="root";

$password="";

$db="pet_store";


$data=mysqli_connect($host,$user,$password,$db);


if($_GET['id']){
    $user_id = $_GET['id'];

    $sql = "DELETE FROM shipping WHERE id='$user_id' ";
    $result = mysqli_query($data, $sql);

    if($result){
        $_SESSION['message'] = 'Data has been deleted';
        header("location:admin_view_shipping.php");
    }
}


?>