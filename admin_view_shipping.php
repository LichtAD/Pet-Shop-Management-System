<?php

error_reporting(0);
session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='customer'){
        header("location:login.php");
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "pet_store";

    $data= mysqli_connect($host,$user,$password,$db);

    $sql = "SELECT * FROM shipping";
    $result = mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="admin.css">



<style type = "text/css">

    .table_th 
    {
        padding: 20px;
        font-size: 20px;
    }
    .table_td 
    {
        padding: 20px;
        background-color: skyblue;

    }
</style>


</head>
<body>

	<?php

    include "admin_sidebar.php"

    ?>




	<div class="content">

        <center>

		<h1>Shipping Data </h1>

        <?php
            if($_SESSION['message']){
                echo $_SESSION['message'];
            }

        unset($_SESSION['message']);

        ?>

    <br><br>
        <table border="1px">
            <tr>
            <th class = "table_th">ID</th>
                <th class = "table_th">Address</th>
                <th class = "table_th">Phone</th>
                <th class = "table_th">Cost</th>
                <th class = "table_th">Delete</th>
                <th class = "table_th">Update</th>
            </tr>

            <?php
            while($info =$result->fetch_assoc())

            {


            ?>

            <tr>
                <td class = "table_td"> 
                    <?php echo"{$info['id']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['address']}"; ?>
                </td>
                
                <td class = "table_td"> 

                    <?php echo"{$info['phone']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['cost']}"; ?>
                </td>


                <td class = "table_td"> 
                    <?php echo "<a class='btn btn-danger' onClick=\" javascript:return confirm('delete this data'); \" href='delete_shipping.php?id={$info['id']}'>Delete</a>"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo "<a class='btn btn-primary' href='update_shipping.php?id={$info['id']}'>Update</a>"; ?>
                </td>

            </tr>

            <?php
            }
            ?>
        </table>
        </center>



	</div>

</body>
</html>