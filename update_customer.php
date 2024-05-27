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

        $sql = "SELECT * FROM customer WHERE id='$user_id' ";
        $result = mysqli_query($data,$sql);

        $info=$result->fetch_assoc();

        if (isset($_POST['update'])) {
            $user_name = $_POST['name']; //name same as from name in form
            $user_email = $_POST['email'];
            $user_phone = $_POST['phone'];


            $query = "UPDATE customer SET name='$user_name', email='$user_email', phone='$user_phone' WHERE id='$user_id' ";
            $result2=mysqli_query($data,$query);

            if($result2){
                header("location:view_customer.php");
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
		<h1>Update Customer</h1>
        <h3>Customer ID <?php echo "{$info['id']}"; ?></h3>

		<div class="div_deg">

            <form action="#" method="POST">

                <div>
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo "{$info['name']}"; ?>" >
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>" >
                </div>

                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>" >
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