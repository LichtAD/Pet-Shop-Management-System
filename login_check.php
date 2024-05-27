<?php
error_reporting(0);
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
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name = $_POST['username'];
        $pass = $_POST['password'];

        $sql="select * from user where username='".$name."' AND password='".$pass."' "; 
        $result= mysqli_query($data,$sql);
        $row= mysqli_fetch_array($result);

        if($row["usertype"]=="customer")

        {
            $_SESSION['password']=$row["password"];
            $_SESSION['username']=$row["username"];
            $_SESSION['usertype']="customer";
            $_SESSION['id'] = $row[0];
            $_SESSION["phone"]=$row["phone"];
            $_SESSION["email"]=$row["email"];
            $_SESSION["address"]=$row["address"];
            $_SESSION['img'] = $row["img"];
            header("location:home.php");


        }
        elseif($row["usertype"]=="admin")

        {
            $_SESSION['username']=$name;
            $_SESSION['usertype']="admin";
            $_SESSION['id'] = $row[0];
            header("location:adminhome.php");


        }
        
        else
        {
         
            $massage= "username or password do not match";
            $_SESSION['loginMassage']=$massage;
            header("location:login.php");



        }

    }




?>