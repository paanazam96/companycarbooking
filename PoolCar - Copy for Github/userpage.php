<?php
    //including the database connection file
    session_start();
    include_once("config.php");

    $result = mysqli_query($conn, "SELECT * FROM booking WHERE email='$_SESSION[email]' ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
    <head>
        <title>User Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
        <style>
            body {
                background-image: url("imgs/1.jpg");
                background-repeat: no-repeat;
                background-position: right top;
                background-attachment: fixed;
            }
            h2 {
                color: white;
                font-size: 40px;
            }
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            td {
                text-align: center;
            }
            table {
                width: 100%;
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
            tr:nth-child(odd) {background: #dddddd}
        </style>
        <script>
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.go(1);
            };
        </script>
    </head>
    
    <body>
        <img src="imgs/Untitled-1.png" width="200px" height="80px" class="center">
        <h2 align="center">My Profile</h2>
        <br>
        <div class="row">
            <div class="col">
                <input style="background: red; color: white;" type="button" value="Logout" onclick="window.location.href='logout.php'" />
            </div>
            <div class="col-8">
                <h3>Welcome, <?php echo $_SESSION['email']; ?></h3>
            </div>
            <div class="col">
                
            </div>
            <div class="col">
                
            </div>
            <div class="col">
                
            </div>
        </div>
        <table border="1">
            <tr bgcolor='#ccccff' style="font-weight:bold" >
                <td>Name</td>
                <td>Phone</td>
                <td>Department</td>
                <td>Date</td>
                <td>Depart Date and Time</td>
                <td>Return Date and Time</td>
                <td>Days</td>
                <td>Destination</td>
                <td>Place Name</td>
                <td>Purpose(s)</td>
                <td>Type of Car</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
            <?php
                while($res = mysqli_fetch_array($result))
                {
                    $tarikh=$res['date'];
                    $date=date('d/M/y', strtotime($tarikh));
                        
                    $tarikhguna=$res['start_event'];
                    $usedate=date('d/M/y h:i A', strtotime($tarikhguna));
                        
                    $tarikhakhir=$res['end_event'];
                    $lastusedate=date('d/M/y h:i A', strtotime($tarikhakhir));
                    
                    echo "<tr>";
                    echo "<td>".$res['name']."</td>";
                    echo "<td>".$res['tel']."</td>";
                    echo "<td>".$res['dept']."</td>";
                    echo "<td>".$date."</td>";
                    echo "<td>".$usedate."</td>";
                    echo "<td>".$lastusedate."</td>";
                    echo "<td>".$res['no_days']."</td>";
                    echo "<td>".$res['dest']."</td>";
                    echo "<td>".$res['placename']."</td>";
                    echo "<td>".$res['purpose']."</td>";
                    echo "<td>".$res['title']."</td>";
                    echo "<td>".$res['status']."</td>";
                    echo "<td><a href=\"useredit.php?id=$res[id]\">Edit</a> | <a href=\"userdetailsheet.php?id=$res[id]\">Print</a></td>";
                }
            ?>
        </table>
    </body>
</html>