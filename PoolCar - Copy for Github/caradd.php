<?php
	session_start();
	include_once("config.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Car</title>
        <!-- Login Form Style -->
        <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
        <style>
            body {
                background-image: url("imgs/8.jpg");
                background-size: cover;
            }
            #footer {
               position:absolute;
               bottom:0;
               width:99%;
               height:40px;   /* Height of the footer */
               background: white;
               opacity: 0.6;
            }
            .buttons {
                background-color: #f44336;  
                border: none;
                color: white;
                padding: 5px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
        </style>
        <script>
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.go(1);
            };
        </script>
    </head>
<body style="background-color:#ecf0f1">
    <!-- Login Form -->
	<div id="main-wrapper">
        <div class="imgcontainer">
		  <img src="imgs/seliagrp.jpg" class="logo">
        </div>
        <br>
        <form action="caradd.php" method="post">
		<table align="center">
			<tr> 
				<td>Car Name / Car Plate No.</td>
				<td><input type="text" name="carname" placeholder="Car / ABC 1234" required></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
            <br>
        <center>
            <input style="background: red; color: white;" type="button" value="Back" onclick="window.location.href='carslist.php'" />
        </center><br>
	</form>
        <?php
        //including the database connection file
        include_once("config.php");

            if(isset($_POST['submit'])) 
            {	
                $carname = mysqli_real_escape_string($conn, $_POST['carname']);
                //$carplate = mysqli_real_escape_string($conn, $_POST['carplate']);

                // checking empty fields
                if(empty($carname)) {

                    if(empty($carname)) {
                        echo "<font color='red'>Car Name field is empty.</font><br/>";
                    }

                    //link to the previous page
                    echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
                } else { 
                    // if all the fields are filled (not empty) 

                    //insert data to database	
                    $result = mysqli_query($conn, "INSERT INTO cars(carname) VALUES('$carname')");

                    Print '<script>alert("Car Added!");</script>';
	                Print '<script>window.location.assign("carslist.php");</script>';
                }
            }
        ?>
	</div>
    <div id="footer">
        <center>
            Photo by @Philatz on <a href="https://unsplash.com/photos/H-0afhW6p8Y">Unsplash.com</a>
        </center>
    </div>
</body>
</html>