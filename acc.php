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
    $result = mysqli_query($conn, 'SELECT id, name, price, img FROM product where type="accessories"');

    // Loop through the result set and generate product cards

    function component($id, $Name, $Price, $productimg){
        $element = "
       
        <div class=\"col-md-3 col-sm-6 my-3 my-md-0 pboxx\">
                    <form  method=\"post\">
                        <div class=\"card shadow\">
                            <div>
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid card-img-top\">
                            </div>
                            <div class=\$productimg\"card-body\">
                                <h5 class=\"card-title\">$Name</h5>             
      
                                <h5>
                                    <span class=\"price\">$Price ৳</span>
                                </h5>
      
                                <h6>
                                  <div class=\"row qnt\">
                                    <div class=\"col\"> Quantity: </div>
                                    <div class=\"col\"> <input type=\"text\" name=\"quant\" class=\"form-control\" value=\"1\" style=\"width:50%\"></div>
                                  </div>
                                </h6>
                                <input type=\"hidden\" name=\"hidden_id\" value=\" $id \">
                                <input type=\"hidden\" name=\"hidden_name\" value=\" $Name \">
                                
                                <input type=\"hidden\" name=\"hidden_price\" value=\" $Price \">
      
                                <button type=\"submit\" class=\"btn btn-warning my-3\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
        ";
        echo $element;
      }





    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cid = $_SESSION['id'];
        $pid = (int) $_POST['hidden_id'];
        $quant = (int) $_POST['quant']; 
        $Name = $_POST['hidden_name'];
        $Price1 = (int) $_POST['hidden_price'];
        $conn = mysqli_connect($servername, $username, $password, $database);
        $sql2 = "INSERT INTO `cart` (`u_id`,`p_id`,`q`) VALUES('$cid','$pid','$quant')";
        $result2 = mysqli_query($conn, $sql2);
      
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
<div class="product-list">

    <?php
  while ($row = $result-> fetch_assoc()){
      component($row['id'], $row['name'], $row['price'], $row['img']);
  }
    ?>
</div>


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