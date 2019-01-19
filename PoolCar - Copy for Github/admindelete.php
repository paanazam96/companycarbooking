<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM booking WHERE id=$id");
$result = mysqli_query($conn, "DELETE FROM calendar WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:admin.php");
?>

