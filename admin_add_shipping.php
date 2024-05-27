<?php

session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='customer'){
        header("location:login.php");
    }

    $host="localhost";

    $user="root";

    $password="";

    $db="pet_store";

    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_shipping'])){
        $user_address = $_POST['address'];        //name same as from name in form // this is a comment
        $user_phone = $_POST['phone'];
        $user_cost = $_POST['cost'];


    $check = "SELECT * FROM shipping";
//     WHERE username = '$user_name'
    $check_user = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);

//     if($row_count>0){
//         echo "<script type='text/javascript'>
//             alert('Username Already Exists. Try another');
//             </script>";
//     }
//     else{

        $sql = "INSERT INTO shipping (address,phone,cost) VALUES ('$user_address','$user_phone','$user_cost')";

        $result = mysqli_query($data, $sql);

        if($result){
            header("location:admin_view_shipping.php");
            // echo "<script type='text/javascript'>
            // alert('Data Uploaded Successfully');
            // </script>";
        }
        else{
            echo "Upload Failed";
        }
//     }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="admin.css">

    <style type="text/css">

        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }

    </style>


</head>
<body>

	<?php

    include "admin_sidebar.php"

    ?>


	<div class="content">
        <center>
		<h1>Add Customer</h1>

		<div class="div_deg">

            <form action="#" method="POST">

                <div>
                    <label>Address</label>
                    <input type="text" name="address" >
                </div>

                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" >
                </div>

                <div>
                    <label>Cost</label>
                    <input type="number" name="cost" >
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="add_shipping" value="Add Shipping" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>