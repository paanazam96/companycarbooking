<?php
    //including the database connection file
    session_start();
    include_once("config.php");

    $result = mysqli_query($conn, "SELECT * FROM booking WHERE `id` != 1 ORDER BY start_event DESC"); // using mysqli_query instead
?>

<?php
    // Ascending Order
    if(isset($_POST['ASC']))
    {
        $asc_query = "SELECT * FROM booking WHERE `id` != 1 ORDER BY date DESC";
        $result = executeQuery($asc_query);
    }

    // Descending Order
    elseif (isset ($_POST['DESC'])) 
        {
              $desc_query = "SELECT * FROM booking WHERE `id` != 1 ORDER BY start_event DESC";
              $result = executeQuery($desc_query);
        }

        // Default Order
     else {
            $default_query = "SELECT * FROM booking WHERE `id` != 1";
            $result = executeQuery($default_query);
    }


    function executeQuery($query)
    {
        $connect = mysqli_connect("localhost", "root", "", "poolcar3");
        $result = mysqli_query($connect, $query);
        return $result;
    }
?>

<html>
    <head>
        <title>Admin</title>
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
        <form action="admin.php" method="post">
            <img src="imgs/Untitled-1.png" width="200px" height="80px" class="center">
            <h2 align="center">List of Borrowers</h2>
            <br>
            <div class="row" >
                <div class="col">
                    <input style="background: red; color: white;" type="button" value="Back" onclick="window.location.href='adminhomepage.php'" />
                </div>
                <div class="col-8">
                    <h3>Welcome, <?php echo $_SESSION['email']; ?></h3>
                </div>
                <div class="col-3">
                    <input type="submit" value="Reset">
                    <input type="submit" name="ASC" value="Booking Date">
                    <input type="submit" name="DESC" value="Depart">
                </div>
            </div>
            <br>

            <table border="1">
                <tr bgcolor='#ccccff' style="font-weight:bold" >
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Department</td>
                    <td>Booking Date</td>
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
                        $date=date('d/M/y', strtotime($res['date']));

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
                        echo "<td><a href=\"adminedit.php?id=$res[id]\">Edit</a> | <a href=\"admindelete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> | <a href=\"admindetailsheet.php?id=$res[id]\">Print</a></td>";
                    }
                ?>
            </table>
        </form>
    </body>
</html>