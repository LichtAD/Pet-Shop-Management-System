<?php

session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='customer'){
        header("location:login.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="admin.css">



</head>
<body>

	<?php

    include "admin_sidebar.php"

    ?>


	<div class="content">

		<h1>Admin Dashboard</h1>

		<!-- <input type="text" name=""> -->


	</div>

</body>
</html>