<?php
	session_start();
	require_once('config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="css/stylelogin.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />

        <style>
            body {
                background-image: url("imgs/5.jpg");
                background-size: cover;
            }
            #footer {
               position:absolute;
               bottom:0;
               width:99%;
               height:40px;   /* Height of the footer */
               background: white;
               opacity: 0.7;
            }
            .box {
                text-align: center;
            }
            .subtitle {
                background-color:lightblue;
                padding: 1px;
            }
            tr.spaceUnder>td {
              padding-bottom: 1em;
            }
        </style>
        <script>
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.go(1);
            };
        </script>
    </head>
<body>
	<div id="main-wrapper">
        <div class="imgcontainer">
		  <img src="imgs/Untitled-1.png" class="logo">
		</div>
        <br>
        <h1 style="font-family:arial;">Carpool Booking</h1>
        <br>
		<form action="login.php" method="post">           
			<div class="box">
                <div class="subtitle"><h2>Login</h2></div>
                <br>
                <table align="center" cellspacing="10px" style="width:70%">
                    <tr>
                        <td align="left"><label><b>Staff Email:</b></label></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td><input type="email" placeholder="example@seliagroup.com" name="email" style="width:100%;" required></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td ><button name="login"  type="submit">Submit</button></td>
                    </tr>
                    <tr>
                        <td><input type="button" value="Home" onclick="window.location.href='index.php'" /></td>
                    </tr>
                </table>
			</div>
		</form>
		 
		<?php 
			if(isset($_POST['login']))
			{
                $email=$_POST['email'];
				$staffid=$_POST['staffid'];
                
				$query = "select * from booking where email='$email' "; //AND staffid='$staffid'
				//echo $query;
				$query_run = mysqli_query($conn,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
                        $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                        
                        if($row["usertype"]=="Admin")
                        {
                            $_SESSION['email'] = $email;    
                            //$_SESSION['staffid'] = $staffid;

                            header( "Location:adminhomepage.php");
                        }
                        else
                        {
                            $_SESSION['email'] = $email;    
                            //$_SESSION['staffid'] = $staffid;

                            header( "Location: userpage.php");    
                        }

                        
					}
					else
					{
						echo '<script type="text/javascript">alert("Oops. Looks like you did not make any bookings. Start booking by clicking Book Now! at Homepage!")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
		
	</div>
    <div id="footer">
        <center>
            Photo by @chuttersnap on <a href="https://unsplash.com/photos/zHhFKYYas7o">Unsplash.com</a>
        </center>
    </div>
</body>
</html>