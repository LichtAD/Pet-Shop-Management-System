<?php
session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pet_store";

    $conn = mysqli_connect($servername, $username, $password, $database);

    function component($id, $Name, $quantity, $date, $totalPrice){
        $element = "
       
        <tr>
              <td>$date</td>
              <td>#$id</td>
              <td>$Name</td>
              <td>$quantity</td>
              <td>$totalPrice</td>
            </tr>
        ";
        echo $element;
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
    <link rel="stylesheet" href="css/userprof.css">
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
<section class="user-profile">
      <h1>Welcome, <?php echo $_SESSION['username'] ?></h1>
      <div class="user-info">
        <div class="avatar">
          <img src=<?php echo $_SESSION["img"]?> alt="Profile Picture">
        </div>
        <div class="details">
          <h2>Personal Information</h2>
          <ul>
            <?php 
            $sql7 = "SELECT username, phone, email, address FROM `user` WHERE id={$_SESSION['id']};";
            $rs = mysqli_query($conn, $sql7);
            $rs = mysqli_fetch_array($rs);
            ?>
            <li><strong>Name:</strong> <?php echo $rs["username"]; ?></li>
            <li><strong>Email:</strong> <?php echo $rs["email"]; ?></li>
            <li><strong>Phone:</strong> <?php echo $rs["phone"]; ?></li>
            <li><strong>Address:</strong> <?php echo $rs["address"]; ?></li>
          </ul>
          <a href="edit_user.php">Edit Profile</a>
        </div>
      </div>
      <hr>
      <div class="orders">
        <h2>Order History</h2>
        <table>
          <thead>
            <tr>
              <th>Order Date</th>
              <th>Order Number</th>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Order Total</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $history = mysqli_query($conn, "SELECT o_id, p_id, q, date, total FROM orders where c_id={$_SESSION['id']}");
            while ($row = $history-> fetch_assoc()){
                $check = "SELECT * FROM `product` WHERE id={$row["p_id"]}";
                $pro = mysqli_query($conn, $check);
                $pro = mysqli_fetch_assoc($pro);
                component($row['o_id'], $pro['name'], $row['q'], $row['date'],$row['total'] );
            }
              ?>
          </tbody>
        </table>
      </div>
    </section>


</div>
<div class="cart-button">
  <a href="cart.php">
    <i class="fas fa-shopping-cart"></i>
    </a>
    <span class="cart-count" id="cart-count"><?php
    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql6 = "SELECT count(*) as count FROM `cart` WHERE u_id={$_SESSION['id']};";
    $r = mysqli_query($conn, $sql6);
    $r = mysqli_fetch_array($r);
    echo $r["count"];
    ?></span>
  
</div>
<script src="js/caro.js"></script>
<script src="js/nav.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/48aa4996ff.js" crossorigin="anonymous"></script>
</body>
</html>