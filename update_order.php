<!-- admin -->

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

    if($_GET['id']){
        $user_id = $_GET['id'];

        $sql = "SELECT * FROM order_details WHERE id='$user_id' ";
        $result = mysqli_query($data,$sql);

        $info=$result->fetch_assoc();

        if (isset($_POST['update'])) {
            $user_product = $_POST['product']; //name same as from name in form
            $user_amount = $_POST['amount'];
            $user_cost = $_POST['cost'];


            $query = "UPDATE order_details SET product='$user_product', amount='$user_amount', cost='$user_cost' WHERE id='$user_id' ";
            $result2=mysqli_query($data,$query);

            if($result2){
                header("location:admin_view_order.php");
            }

        }
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
		<h1>Update Order</h1>
        <h3>Order ID <?php echo "{$info['id']}"; ?></h3>

		<div class="div_deg">

            <form action="#" method="POST">

                <div>
                    <label>Product</label>
                    <input type="text" name="product" value="<?php echo "{$info['product']}"; ?>" >
                </div>

                <div>
                    <label>Amount</label>
                    <input type="number" name="amount" value="<?php echo "{$info['amount']}"; ?>" >
                </div>

                <div>
                    <label>Cost</label>
                    <input type="number" name="cost" value="<?php echo "{$info['cost']}"; ?>" >
                </div>



                <div>
                    <input type="submit" class="btn btn-success" name="update" value="Update" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>