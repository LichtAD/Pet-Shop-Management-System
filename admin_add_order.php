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

    if(isset($_POST['add_order'])){
        $user_product = $_POST['product'];        //name same as from name in form // this is a comment
        $user_amount = $_POST['amount'];
        $user_cost = $_POST['cost'];


    $check = "SELECT * FROM order_details";
//     WHERE username = '$user_name'
    $check_user = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);

//     if($row_count>0){
//         echo "<script type='text/javascript'>
//             alert('Username Already Exists. Try another');
//             </script>";
//     }
//     else{

        $sql = "INSERT INTO order_details (product,amount,cost) VALUES ('$user_product','$user_amount','$user_cost')";

        $result = mysqli_query($data, $sql);

        if($result){
            header("location:admin_view_order.php");
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
		<h1>Add Order</h1>

		<div class="div_deg">

            <form action="#" method="POST">

                <div>
                    <label>Product</label>
                    <input type="text" name="product" >
                </div>

                <div>
                    <label>Amount</label>
                    <input type="number" name="amount" >
                </div>

                <div>
                    <label>Cost</label>
                    <input type="number" name="cost" >
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="add_order" value="Add Order" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>