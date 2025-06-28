<?php
include("shared/connection.php");
$id = $_GET["dit"];
$sql = "DELETE FROM users WHERE Id = '{$id}' ";
mysqli_query($conn,$sql);
header("Location: analytics.php");
mysqli_close($conn);
?>