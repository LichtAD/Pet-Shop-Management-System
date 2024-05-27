<?php

error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message'])
{
    $message=$_SESSION['message'];

    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
}

?>



<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <title>Pet Shop Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <label class="logo">Hello Pets</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">About us</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>  
    </nav>

    <div class="section1">

        <img class="main_img" src="headpic.png">
    </div>

    <div class="container">

        <div class="row">

            <div class="col-md-4">

                <img class="welcome_img" src="logo.jpg">

            </div>
            <div class="col-md-8">
                <h1>Welcome to Hello Pets</h1>

                <p>Welcome to our pet shop! We are a one-stop destination for all your pet needs, providing you with a wide range of products and services to keep your furry friends happy and healthy. Our shop offers a diverse selection of high-quality pet food, toys, accessories, and more to cater to every pet's individual needs. We pride ourselves on our knowledgeable and friendly staff, who are always on hand to offer expert advice and recommendations. Whether you're a new pet owner or a seasoned enthusiast, we are committed to providing you with the best possible shopping experience. Thank you for choosing our pet shop as your go-to destination for all things pet-related!</p>
            </div>

        </div>

    </div>

    <center class="corr">
        <h2>Avaiable Services</h2>
    </center>

    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <img class="pic" src="donation.jpg">
                <p>Please, donate and let them feel loved</p>
            </div>

            <div class="col-md-4">
                 <img class="pic" src="training.jpg">
                 <p>Learn to taking care of pets with specialists</p>

            </div>

            <div class="col-md-4">
                <img class="pic" src="shelter.jpg">
                <p>Trynig to find new home for homeless animals</p>

            </div>

        </div>

    </div>


    <center class="corr">
        <h2>Avaiable Purchase Items</h2>
    </center>

    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <img class="pic" src="pet food.jpg">
                <h4>Buy Foods</h4>

            </div>

            <div class="col-md-4">
                 <img class="pic" src="pet toys.jpg">
                 <h4>Buy Toys</h4>

            </div>

            <div class="col-md-4">
                <img class="pic" src="pet grooming.jpg">
                <h4>Book Pet Grooming Slot</h4>

            </div>

            <div class="col-md-4">
                <img class="pic" src="pet daycare.jpg">
                <h4>Day/Nightcare Facilities</h4>
            </div>

            <div class="col-md-4">
                 <img class="pic" src="vet consultation.webp">
                 <h4>Book vet consultation</h4>

            </div>

            <div class="col-md-4">
                <img class="pic" src="pet library.jpg">
                <h4>Pet Library</h4>

            </div>

        </div>

    </div>

    <center>
        <h1 class="add">Sign up</h1>
    </center>

    <div align="center" class="sign_up">

        <form action="data_check.php" method="POST">

            <div class="sgn_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>

            <div class="sgn_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>

            <div class="sgn_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="number" name="phone">
            </div>

            <div class="sgn_int">
                <label class="label_text">Password</label>
                <input class="input_deg" type="text" name="password">
            </div>

            <div class="sgn_int">
                <input class="btn btn-primary" id="submit" type="submit" value="Sign-up" name="apply">

            </div>

        </form>

    </div>



</body>
</html>  


