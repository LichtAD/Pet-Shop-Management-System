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
    <link rel="stylesheet" href="css/userupdate.css">
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
		<h1>Edit Profile</h1>
		<form method="POST" action="user_updated.php">
			<div class="user-info">
				<div class="avatar">
					<img src="https://www.pet.com.bd/petvault/uploads/2018/12/cattt.jpg" alt="Profile Picture">
				</div>
				<div class="details">
					<h2>Personal Information</h2>
					<ul>
						<li>
							<label for="name">Name:</label>
							<input type="text" id="name" name="name" value="<?php echo $_SESSION['username']; ?>">
						</li>
						<li>
							<label for="email">Email:</label>
							<input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
						</li>
						<li>
							<label for="phone">Phone:</label>
							<input type="tel" id="phone" name="phone" value="<?php echo $_SESSION['phone']; ?>">
						</li>
						<li>
							<label for="address">Address:</label>
							<textarea id="address" name="address"><?php echo $_SESSION['address']; ?></textarea>
						</li>
						<li>
							<label for="password">New Password:</label>
							<input type="password" id="password" name="password" value="<?php echo $_SESSION['password']; ?>">
						</li>
					</ul>
				</div>
			</div>
			<button type="submit">Save Changes</button>
		</form>
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