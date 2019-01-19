<?php
	session_start();
	include_once("config.php");

    $result = mysqli_query($conn, "SELECT * FROM cars ORDER BY id ASC"); // using mysqli_query instead
?>

<!DOCTYPE html>
<html>
    <head>
        <title>List of Cars</title>
        <!-- Login Form Style -->
        <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />

        <style>
            body {
                background-image: url("imgs/8.jpg");
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            #footer {
               bottom:0;
               width:100%;
               height:30px;   /* Height of the footer */
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
        <center>
            <div class="row">
                <div class="col">
                    <input style="background: red; color: white;" type="button" value="Back" onclick="window.location.href='adminhomepage.php'" />
                </div>
                <div class="col-6">
                    <button><a href="caradd.php">Add Car</a></button>
                </div>
                <div class="col">

                </div>
            </div>
        </center>
        <table align="center" border="1" bgcolor='white'>
        <tr style="font-weight:bold" align="center">
            <td>No.</td>
            <td>Car Name / Plate No.</td>
            <td>Action</td>
        </tr>
        <?php
            while($res = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>".$res['id']."</td>";
                echo "<td>".$res['carname']."</td>";
                echo "<td><a href=\"caredit.php?id=$res[id]\">Edit</a> | <a href=\"cardelete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
                </td>";
            }
        ?>
        </table>
        <br>
	</div>
    <br>
    <div id="footer">
        <center>
            Photo by @Philatz on <a href="https://unsplash.com/photos/H-0afhW6p8Y">Unsplash.com</a>
        </center>
    </div>
</body>
</html>