<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="pet_store";
$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("connection error");
}
if(isset($_POST['apply']))
{
    $data_name=$_POST['name'];
    $data_email=$_POST['email'];
    $data_phone=$_POST['phone'];
//     $data_type=$_POST['customer'];
    $data_password=$_POST['password'];
    $sql="INSERT INTO user(username,email,phone,usertype,password) VALUES('$data_name','$data_email','$data_phone','customer','$data_password')";
    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']="Thank you for joining us";
        header("location:index.php");
    }
    
    else
    {
        echo "Apply Failed";
    }


}
?>