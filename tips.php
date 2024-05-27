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

<div class="pet-tips">
  <h2>Pet Raising Tips</h2>
  <ul>
    <li>Research your pet: Before getting a pet, research the breed or species to make sure it's a good fit for your lifestyle and living situation. Different pets have different needs and personalities, so it's important to choose the right one for you.</li>
    <li>Provide a safe environment: Make sure your pet has a safe and comfortable living environment that is appropriate for their size and species. This may include a secure enclosure or a designated area in your home.</li>
    <li>Feed a balanced diet: Provide your pet with a well-balanced and appropriate diet for their age and species. Avoid feeding your pet human food or anything that may be harmful to them.</li>
    <li>Regular exercise: Regular exercise is important for pets to maintain a healthy weight and stay mentally stimulated. Provide your pet with opportunities to play and exercise regularly.</li>
    <li>Socialization: Socialization is important for pets to learn appropriate behavior and become well-adjusted members of your family. This may include exposure to other pets, people, and different environments.</li>
    <li>Grooming: Regular grooming is important for maintaining your pet's health and appearance. This may include bathing, brushing, trimming nails, and cleaning ears.</li>
    <li>Veterinary care: Regular visits to the veterinarian are important to maintain your pet's health and catch any potential health problems early on. Make sure your pet is up-to-date on vaccinations and preventative care.</li>
    <li>Training: Proper training is important for your pet's safety and well-being, as well as for your own. Positive reinforcement training methods are effective and humane ways to train your pet.</li>
    <li>Be patient: Raising a pet takes time, patience, and effort. Be prepared to make a long-term commitment to your pet's well-being.</li>
    <li>Love and affection: Finally, show your pet love and affection. Pets are social creatures and thrive on attention and affection from their human companions. Regular bonding and interaction with your pet will strengthen your relationship and make for a happier and healthier pet.</li>
  </ul>
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