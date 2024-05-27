<?php

@include "conn.php";

if (isset($_GET['delete'])){
    $delete = $_GET['delete'];
    $qq="DELETE FROM cart WHERE p_id=$delete";
    $del = $connect->query($qq);
    if ($del){
        header('location:cart.php');
    }else{
        echo "Something went wrong";
    }
}

?>