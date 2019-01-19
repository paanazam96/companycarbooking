<?php
    //session_start();
    include_once("config.php");
?>

<?php
    $hostname="localhost";
    $username="root";
    $password="";
    $databaseName="poolcar3";
 
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $query = "SELECT * FROM `cars` ";

    $result1 = mysqli_query($connect, $query);
?>

<?php
    $hostname="localhost";
    $username="root";
    $password="";
    $databaseName="poolcar3";
 
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $query = "SELECT * FROM `department` ";

    $result2 = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Booking Form</title>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
        
        <style>
            body {
                background-image: url("imgs/9.jpg");
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            input:focus {
                border: 3px solid #60992D;
            }
            .title {
                background-color: lightgrey;
            }
            #footer {
               bottom:0;
               width:100%;
               height:30px;   /* Height of the footer */
               background: white;
               opacity: 0.6;
            }
            #calendar {
        /* 		float: right; */
                margin: 0 auto;
                padding: 10px;
                background-color: #FFFFFF;
                opacity: 0.95;
                border: 2px solid black;
                box-shadow: 0 1px 2px #C3C3C3;
                color: black;
            }
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                opacity: 0.9;
                overflow: hidden;
                background-color: #ebf1ef;
                border: 2px solid black;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            li {
                float: left;
            }

            li a {
                display: block;
                color: black;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-weight: bold;
            }

            li a:hover:not(.active) {
                background-color: #9af395;
            }

            .active {
                background-color: #b9d0ca;
            }
        </style>
        <!-- Number of days -->
        <script type="text/javascript">
            function GetDays(){
                    var dropdt = new Date(document.getElementById("drop_date").value);
                    var pickdt = new Date(document.getElementById("pick_date").value);
                    return parseInt((dropdt - pickdt) / (24 * 3600 * 1000)+1);
            }

            function cal(){
                document.getElementById("numdays2").value=GetDays();
            }
        </script>
        <!-- disable back button -->
        <script>
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.go(1);
            };
        </script>
        <!-- date and time -->
        <script type="text/javascript" src="date_time.js"></script>
    </head>
    <body>
        <div class="container">
            <center>
                <div class="row">
                    <div class="col">
                       <img src="imgs/Untitled-1.png" style="width:200px; height:150x;">
                    </div>
                    <div class="col-6">
                        <h1 style="font-family:verdana;"><i>Carpool Booking System</i></h1>
                    </div>
                    <div class="col">
                        <span id="date_time"></span>
                        <script type="text/javascript">window.onload = date_time('date_time');</script>
                    </div>
                </div>
            </center>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="bookingform.php">Book Now!</a></li>
                <li style="float:right" class="active"><a href="login.php">Login</a></li>
            </ul>
        </div>
        <!-- FORM -->
        <div class="container">
            <div id="calendar">
                <div class="title"><h2 align="center">BOOKING FORM</h2></div>
                <form action="bookingform.php" method="post" name="form1">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <strong>Date : </strong>
                                    <br>
                                    <input type="date" name="date" required style="width: 100%;" value="<?php echo date("Y-m-d");?>">
                                </div>
                                <div class="col-8">
                                    <strong>Requestor Name :</strong> 
                                    <br>
                                    <input type="text" name="name" style="text-transform:uppercase; width: 100%;"  required>
                                </div>
                            </div>
                            <div class="row"><br></div>
                            <div class="row">
                                <div class="col">
                                    <strong>Department :</strong> 
                                    <br>
                                    <select name="dept" required style="width: 100%;">
                                        <option>Choose..</option>
                                        <?php while($row1=mysqli_fetch_array($result2)):;?>
                                        <option><?php echo $row1[1]; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <strong>Email :</strong> 
                                    <br>
                                    <input type="email" name="email" placeholder="example@seliagroup.com" required style="width: 100%;">
                                </div>
                                <div class="col">
                                    <strong>Phone : </strong>
                                    <br>
                                    <input type="tel" name="tel" required style="width: 100%;">
                                </div>
                            </div>
                            <div class="row"><br></div>
                            <div class="row">===================================================================================================</div>
                            <div class="row">
                                <div class="col">
                                    <strong>Depart Time and Date :</strong> 
                                    <br>
                                    <input type="datetime-local" class="textbox" id="pick_date" name="start_event" onchange="cal()" style="width: 100%;" required>
                                </div>
                                <div class="col">
                                    <strong>Return Date and Time : </strong>
                                    <br>
                                    <input type="datetime-local" class="textbox" id="drop_date" name="end_event" required onchange="cal()" style="width: 100%;"/>
                                </div>
                                <div class="col">
                                    <strong>No. of Day(s) :</strong> 
                                    <br>
                                    <input type="text" class="textbox" id="numdays2" name="no_days" style="width: 50%;"/>
                                </div>
                            </div>
                            <div class="row"><br></div>
                            <div class="row">
                                <div class="col">
                                    <strong>Choose Car :</strong> 
                                    <br>
                                    <select name="title" required style="width: 100%;">
                                        <option>Choose..</option>
                                        <?php while($row1=mysqli_fetch_array($result1)):;?>
                                        <option><?php echo $row1[1]; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <strong>Destination : </strong> 
                                    <br>
                                    <input type="radio" name="dest" value="Site" required> Site &nbsp;
                                    <input type="radio" name="dest" value="Meeting" required> Meeting &nbsp;
                                    <input type="radio" name="dest" value="Other" required> Other    
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                            <div class="row"><br></div>
                            <div class="row">
                                <div class="col">
                                    <strong>Name of Place : </strong>
                                    <br>
                                    <textarea rows="4" name="placename" style="width:100%; height:100%; resize: none;" required></textarea>
                                </div>
                                <div class="col">
                                    <strong>Purpose :</strong>  
                                    <br>
                                    <textarea rows="4" name="purpose" style="width:100%; height:100%; resize: none;" required></textarea>
                                </div>
                            </div>
                        </div>
                    <br>
                    <br>
                    <center>
                        <button name="submit" type="submit">Submit</button>
                    </center>
                </form>
            </div>
        </div>
        <!-- FORM -->
        <br>
        <center>&copy;<?php echo date("Y");?> Selia Selenggara Engineering</center>
        <br>
        
        <div id="footer">
        <center>
            Photo by @rawpixel on <a href="https://unsplash.com/photos/CQB5J0hZC5U">Unsplash.com</a>
        </center>
        </div>
        
        <?php
                    //$name = strtoupper($_POST['name']);
            if(isset($_POST['submit'])) 
            {	 
                $staffid = mysqli_real_escape_string($conn, $_POST['staffid']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $name = strtoupper($_POST['name']);
                $tel = mysqli_real_escape_string($conn, $_POST['tel']);
                $dept = mysqli_real_escape_string($conn, $_POST['dept']);
                $date = mysqli_real_escape_string($conn, $_POST['date']);
                $start_event = mysqli_real_escape_string($conn, $_POST['start_event']);
                $end_event = mysqli_real_escape_string($conn, $_POST['end_event']);
                $no_days = mysqli_real_escape_string($conn, $_POST['no_days']);
                $dest = mysqli_real_escape_string($conn, $_POST['dest']);
                $placename = mysqli_real_escape_string($conn, $_POST['placename']);
                $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);
                $title = mysqli_real_escape_string($conn, $_POST['title']);
                
                //process to check duplicate booking
                $check_duplicate_booking = "SELECT start_event, title FROM booking WHERE start_event='$start_event' AND title='$title' ";
                
                $res = mysqli_query($conn, $check_duplicate_booking);
                
                $count = mysqli_num_rows($res);

                // duplicate booking
                if($count > 0) {
                    
                    echo "<center><h3>ALERT! Car has already been booked by other staff! Please refer to <a href=\"index.php\">List of Booking</a> to check other staff booking details.</h3></center>";
                    
                    return false;

                } else { 
                    // if not duplicate, data is stored in database

                    //insert data to database	
                    $result = mysqli_query($conn, "INSERT booking (name, email, dept, date, start_event, end_event, no_days, dest, placename, purpose, tel, title, usertype, status)
                    VALUES ('$name','$email','$dept','$date','$start_event','$end_event','$no_days','$dest','$placename','$purpose','$tel','$title','User','PENDING')");
                    
                    //$result = mysqli_query($conn, "INSERT INTO allbookingdata (name, email, dept, date, start_event, end_event, no_days, dest, placename, purpose, tel, title, usertype, status)
                    //VALUES ('$name','$email','$dept','$date','$start_event','$end_event','$no_days','$dest','$placename','$purpose','$tel','$title','User','PENDING')");

                    //display success message
                    Print '<script>alert("Booking Successful!");</script>';
	                Print '<script>window.location.assign("index.php");</script>';
                }
            }
        ?> 
        
    </body>
</html>