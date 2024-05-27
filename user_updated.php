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


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
        // Check connection

    
        // Prepare and bind the SQL query
        $stmt = $conn->prepare("UPDATE user SET username=?, email=?, phone=?, address=?, password=? WHERE id=?");
        $stmt->bind_param("sssssi", $name, $email, $phone, $address, $password, $id);
    
        // Set the variables from the form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $id = $_SESSION['id'];
    
        // Execute the query
        if ($stmt->execute()) {
            // Update the session variables with the new information
            $_SESSION['username'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['address'] = $address;
            header("Location: userprofile.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    
        // Close the statement and the connection
        $stmt->close();
    }
    

    



    
?>