<?php
@include "config.php";
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "pet_store";


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/caro.css">
    <link rel="stylesheet" href="css/pcard.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min"> -->
    <title>Home</title>
</head>
<body>
  <div class="container">
  <nav>
  <div class="logo">
    <img src="images/logo.png" alt="" srcset="">
  </div>
  <ul class="nav-links">
    <li><a href="home.php">Home</a></li>
    <li><a href="med.php">Pet Medicine</a></li>
    <li><a href="acc.php">Pet Accessories</a></li>
    <li><a href="tips.php">Pet Raising Tips</a></li>
    <li><a href="logout.php">Logout</a></li>
    <li><a href="userprofile.php"><?php echo $_SESSION['username']; ?></a></li>
  </ul>
  <div class="burger">
    <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
  </div>
</nav>


<div class="container" style="border-radius: 30px; padding: 30px;">
  <table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
            <?php
            $sql = "SELECT * FROM `cart` WHERE u_id={$_SESSION["id"]}";
            $result = mysqli_query($conn, $sql);
            $tp = 0;
            if ($result->num_rows > 0) {
              while ($row = $result-> fetch_assoc()){
                $check = "SELECT * FROM `product` WHERE id={$row["p_id"]}";
                $pro = mysqli_query($conn, $check);
                $pro = mysqli_fetch_assoc($pro);
                $tprice = (intval($row["q"])*intval($pro["price"]));
                $tp = intval($tp) + $tprice; ?>
                <tr>
                    <td><?php echo $pro["name"]; ?></td>
                    <td><?php echo $row["q"]; ?></td>
                    <td><?php echo  $pro["price"]; ?></td>
                    <td><?php echo  $tprice; ?></td>
                    <td>
                        <a href="delete_citem.php?delete=<?php echo $row['p_id'];?>" class="btn btn-primary btn-danger">Delete</a>
                    </td>
                </tr><?php }} ?>
         
    </tbody>
    
</table>



</div>

<h3 class="text-center"><b><i>To be Paid: <?php echo $tp," taka"; ?></i></b></h3>
<br><br>
<form method="post">
<h5 style="text-align:right;"><button type="submit" class="btn btn-warning my-3">Confirm Order </button>
</form>
        
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $sql3 = "SELECT * FROM `cart` where u_id={$_SESSION['id']}";
    $result = mysqli_query($conn, $sql3);
    while ($row = $result-> fetch_assoc()){
        $check = "SELECT * FROM `product` WHERE id={$row["p_id"]}";
        $pro = mysqli_query($conn, $check);
        $pro = mysqli_fetch_assoc($pro);
        $tprice = (intval($row["q"])*intval($pro["price"]));
        $p_id = $row["p_id"];
        $add= "INSERT INTO orders(c_id, p_id, q, total) VALUES ({$_SESSION['id']},{$p_id},{$row['q']},{$tprice})";
        $res=mysqli_query($conn, $add);
        $sql2 = "DELETE FROM cart WHERE u_id={$_SESSION['id']} and p_id={$p_id}";
        $result2 = mysqli_query($conn, $sql2);
        }

    }
    $conn->close();
    
    
  
  
  
  

?>


</div>
<script src="js/nav.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>