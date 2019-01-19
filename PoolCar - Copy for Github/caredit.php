<?php
	session_start();
	include_once("config.php");

    if(isset($_POST['update']))
    {	

        $id = mysqli_real_escape_string($conn, $_POST['id']);

        $carname = mysqli_real_escape_string($conn, $_POST['carname']);

        // checking empty fields
        if(empty($carname)) 
        {	

            if(empty($carname)) {
                echo "<font color='red'>Car Name field is empty.</font><br/>";
            }
        } 
        else 
        {	
            //updating the table
            $result = mysqli_query($conn, "UPDATE cars SET carname='$carname' WHERE id=$id");

            //redirectig to the display page. In our case, it is index.php
            header("Location: carslist.php");
        }
    }
?>

<?php
    //getting id from url
    $id = $_GET['id'];

    //selecting data associated with this particular id
    $result = mysqli_query($conn, "SELECT * FROM cars WHERE id=$id");

    while($res = mysqli_fetch_array($result))
    {
        $carname = $res['carname'];
    }
?>

<html>
    <head>
        <title>Carpool Booking Form</title>
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
        <form action="caredit.php" method="post">
		<table align="center">
			<tr> 
				<td>Car Name / Car Plate No. : </td>
				<td><input type="text" name="carname" value="<?php echo $carname;?>" ></td>
			</tr>
		</table>
            <br>
            <center>
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" >
                <input type="submit" name="update" value="Update">
            </center>
            <br>
            <center>
                <input style="background: red; color: white;" type="button" value="Back" onclick="window.location.href='carslist.php'" />
            </center>
	    </form>
    </div>
    <div id="footer">
        <center>
            Photo by @Philatz on <a href="https://unsplash.com/photos/H-0afhW6p8Y">Unsplash.com</a>
        </center>
    </div>
</body>
</html>