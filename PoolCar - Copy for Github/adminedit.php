<?php

    include_once("config.php");

    if(isset($_POST['update']))
    { 
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
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
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        
        // checking empty fields
        if(empty($email) || empty($name) || empty($tel) || empty($dept) || empty($date) || empty($start_event) || empty($end_event) || empty($no_days) || empty($dest) || empty($placename) || empty($purpose) || empty($title) || empty($status))
        {
            if(empty($email)) {
                echo "<font color='red'>Email field is empty.</font><br/>";
            }

            if(empty($name)) {
                echo "<font color='red'>Age field is empty.</font><br/>";
            }

            if(empty($tel)) {
                echo "<font color='red'>Email field is empty.</font><br/>";
            }
                    
            if(empty($dept)) {
                echo "<font color='red'>Department field is empty.</font><br/>";
            }
                    
            if(empty($date)) {
                echo "<font color='red'>Date field is empty.</font><br/>";
            }
                    
            if(empty($start_event)) {
                echo "<font color='red'>Date of Usage field is empty.</font><br/>";
            }
            
            if(empty($end_event)) {
                echo "<font color='red'>Last Date of Usage field is empty.</font><br/>";
            }
            
            if(empty($no_days)) {
                echo "<font color='red'>No. of Days field is empty.</font><br/>";
            }
                    
            if(empty($dest)) {
                echo "<font color='red'>Destination field is empty.</font><br/>";
            }
                    
            if(empty($placename)) {
                echo "<font color='red'>Name of Place field is empty.</font><br/>";
            }
                    
            if(empty($purpose)) {
                echo "<font color='red'>Purpose field is empty.</font><br/>";
            }
                    
            if(empty($title)) {
                echo "<font color='red'>Cars field is empty.</font><br/>";
            }
            
            if(empty($status)) {
                echo "<font color='red'>Status field is empty.</font><br/>";
            }
        }
        else
        {
            $result = mysqli_query($conn, "UPDATE booking SET name='$name', 
            dept='$dept', 
            date='$date',
            start_event='$start_event',
            end_event='$end_event',
            no_days='$no_days',
            dest='$dest',
            placename='$placename',
            purpose='$purpose',
            email='$email',
            tel='$tel',
            title='$title', 
            status='$status' WHERE id=$id");
            
            header("Location: admin.php");
        }
    }

?>

<?php

    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM booking WHERE id=$id");

    while($res = mysqli_fetch_array($result))
    {
        $email = $res['email'];
        $name = $res['name'];
        $tel = $res['tel'];
        $dept = $res['dept'];
        $date = $res['date'];
        $start_event = $res['start_event'];
        $end_event = $res['end_event'];
        $no_days = $res['no_days'];
        $dest = $res['dest'];
        $placename = $res['placename'];
        $purpose = $res['purpose'];
        $title = $res['title'];
    }

?>
<!-- senarai kereta -->
<?php
    $hostname="localhost";
    $username="root";
    $password="";
    $databaseName="poolcar3";

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $query = "SELECT * FROM `cars` ";

    $result1 = mysqli_query($connect, $query);
?>
<!-- senarai department -->
<?php
    $hostname="localhost";
    $username="root";
    $password="";
    $databaseName="poolcar3";
 
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $query = "SELECT * FROM `department` ";

    $result2 = mysqli_query($connect, $query);
?>
<!-- senarai status -->
<?php
    $hostname="localhost";
    $username="root";
    $password="";
    $databaseName="poolcar3";
 
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $query = "SELECT * FROM `status` ";

    $result3 = mysqli_query($connect, $query);
?>

<html>
    <head>
        <title>Edit Booking Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
        <style>
            body {
                background-image: url("imgs/10.jpg");
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            .button {
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
            #calendar {
        /* 		float: right; */
                margin: 0 auto;
                padding: 10px;
                background-color: #FFFFFF;
                opacity: 0.85;
                border: 2px solid black;
                box-shadow: 0 1px 2px #C3C3C3;
                color: black;
            }
            #footer {
               bottom:0;
               width:100%;
               height:30px;   /* Height of the footer */
               background: white;
               opacity: 0.6;
            }
            .title {
                background-color: lightgrey;
            }
        </style>
        <script type="text/javascript">
        function GetDays(){
                var dropdt = new Date(document.getElementById("drop_date").value);
                var pickdt = new Date(document.getElementById("pick_date").value);
                return parseInt((dropdt - pickdt) / (24 * 3600 * 1000)+1);
        }

        function cal(){
            if(document.getElementById("drop_date")){
                document.getElementById("numdays2").value=GetDays();
            }  
        }
        </script>
        <script>
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.go(1);
            };
        </script>
    </head>
    <body>
        <img src="imgs/Untitled-1.png" width="200px" height="80px" class="center">
        <form action="adminedit.php" method="post" name="form1">
            <div class="container">
                <div id="calendar">
                    <div class="row">
                        <div class="col">
                            <input style="background: red; color: white;" type="button" value="Back" onclick="window.location.href='admin.php'" />
                        </div>
                        <div class="col">
                            <h2 align="center">BOOKING FORM</h2>       
                        </div>
                        <div class="col">
                                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <strong>Date : </strong>
                            <br>
                            <input type="date" name="date" required style="width: 100%;" value="<?php echo $date;?>">
                        </div>
                        <div class="col-8">
                            <strong>Requestor Name :</strong> 
                            <br>
                            <input type="text" name="name" style="text-transform:uppercase; width: 100%;" value="<?php echo $name;?>" required> 
                        </div>
                    </div>
                    <div class="row"><br></div>
                    <div class="row">
                        <div class="col">
                            <strong>Department : </strong> 
                            <br>
                            <select name="dept" required style="width: 100%;">
                                <?php 
                                    $sql = "SELECT dept FROM booking WHERE id=$id";
                                    $result=mysqli_query($conn, $sql);

                                    $row=mysqli_fetch_array($result);
                                    $dept_user = $row['dept']; 
                                ?>
                                <?php while($row1=mysqli_fetch_array($result2)):;?>
                                <option <?php if($row1['dept'] == $dept_user) echo "selected"; ?> >
                                    <?php echo $row1['dept']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col">
                            <strong>Email : </strong> 
                            <br>
                            <input type="email" name="email" placeholder="example@seliagroup.com" value="<?php echo $email;?>" required style="width: 100%;">
                        </div>
                        <div class="col">
                            <strong>Phone : </strong>
                            <br>
                            <input type="tel" name="tel" value="<?php echo $tel;?>" required style="width: 100%;">
                        </div>
                    </div>
                    <div class="row"><br></div>
                    <div class="row">===================================================================================================</div>
                    <div class="row">
                        <div class="col">
                            <strong>Depart Time and Date : </strong> 
                            <br>
                            <div id="pickup_date"><input type="datetime-local" class="textbox" id="pick_date" name="start_event" onchange="cal()" style="width: 100%;" value="<?php echo date('Y-m-d\TH:i', strtotime($start_event)); ?>" required></div>
                        </div>
                        <div class="col">
                            <strong>Return Date and Time : </strong>
                            <br>
                            <div id="dropoff_date"><input type="datetime-local" class="textbox" id="drop_date" name="end_event" onchange="cal()" style="width: 100%;" value="<?php echo date('Y-m-d\TH:i', strtotime($end_event)); ?>" required/></div>
                        </div>
                        <div class="col">
                            <strong>No. of Day(s) : </strong> 
                            <br>
                            <div id="numdays"><input type="text" class="textbox" id="numdays2" name="no_days" style="width: 50%;" value="<?php echo $no_days;?>"/></div>
                        </div>
                    </div>
                    <div class="row"><br></div>
                    <div class="row">
                        <div class="col">
                        <strong>Choose Car : </strong> 
                            <br>
                            <select name="title" required style="width: 100%;">
                                <?php 
                                    $sql = "SELECT title FROM booking WHERE id=$id";
                                    $result=mysqli_query($conn, $sql);

                                    $row=mysqli_fetch_array($result);
                                    $car_user = $row['title'];
                                ?>
                                
                                <?php while($row1=mysqli_fetch_array($result1)):;?>
                                <option <?php if($row1['carname'] == $car_user) echo "selected"; ?> >
                                    <?php echo $row1['carname']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col">
                            <strong>Destination : </strong> 
                            <br>
                            <input type="radio" name="dest" value="Site" required
                            <?php
                                if($dest=="Site"){
                                    echo "checked";
                                }
                            ?>
                            > Site 
                            <input type="radio" name="dest" value="Meeting" required
                            <?php
                                if($dest=="Meeting"){
                                    echo "checked";
                                }
                            ?>
                            > Meeting 
                            <input type="radio" name="dest" value="Other" required
                            <?php
                                if($dest=="Other"){
                                    echo "checked";
                                }
                            ?>
                            > Other
                        </div>
                        <div class="col">
                            <p1 style="color:red;">*</p1><strong>Status : </strong>
                            <br>
                            <select name="status" value="<?php echo $cars;?>">
                                <?php
                                    $sql = "SELECT status FROM booking WHERE id=$id";
                                    $result=mysqli_query($conn, $sql);

                                    $row=mysqli_fetch_array($result);
                                    $user_status=$row['status'];
                                ?>
                                <?php while($row1=mysqli_fetch_array($result3)):;?>
                                <option <?php if($row1['stat'] == $user_status) echo "selected"; ?> >
                                    <?php echo $row1['stat']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row"><br></div>
                    <div class="row">
                        <div class="col">
                            <strong>Name of Place : </strong>
                            <br>
                            <textarea rows="4" name="placename" style="width:100%; resize: none;" required><?php echo $placename;?></textarea>
                        </div>
                        <div class="col">
                            <strong>Purpose : </strong>  
                            <br>
                            <textarea rows="4" name="purpose" style="width:100%; resize: none;" required><?php echo $purpose;?></textarea>
                        </div>
                    </div>
                    <br>
                    <center>
                        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                        <input type="submit" name="update" value="Update">
                    </center>
                </div>
            </div>
        </form>
        <center>&copy;<?php echo date("Y");?> Selia Selenggara Engineering</center>
        <br>
        
        <div id="footer">
        <center>
            Photo by @jeshoots on <a href="https://unsplash.com/photos/pUAM5hPaCRI">Unsplash.com</a>
        </center>
        </div>
    </body>
</html>